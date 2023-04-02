<?php
require_once('../app/models/Product.php');
require_once('../app/models/Category.php');

class ProductController
{

    function index()
    {
        require_once('../app/views/admin/admin.php');
    }

    function addProduct()
    {
        require_once('../app/views/admin/product/create-product.php');
    }

    function showProduct()
    {
        $productlist = Product::getAll();
        require_once('../app/views/admin/product/show-product.php');
    }

    function createProduct()
    {
        $productname = $_POST['productname'];
        $productdes = $_POST['productdes'];
        $productsize = $_POST['productsize'];
        $productprice = $_POST['productprice'];
        $productdiscount = $_POST['productdiscount'];
        $productnumber = $_POST['productnumber'];
        $isUploaded = $this->uploadImageFile();
        if ($isUploaded == 1) {
            $productimage = htmlspecialchars(basename($_FILES["productimage"]["name"]));
        }
        $isSuccess = Product::create($productname, $productdes, $productsize, $productprice, $productdiscount, $productnumber, $productimage);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=product');
        else
            header('Location: ?route=failure');
        exit;
    }

    function editProduct()
    {
        $productlist = Product::getAll();
        require_once('../app/views/admin/product/edit-product.php');
    }

    function updateProduct()
    {
        $productid = $_REQUEST['productid'];
        $productname = $_REQUEST['productname'];
        $productdes = $_REQUEST['productdes'];
        $productsize = $_REQUEST['productsize'];
        $productprice = $_REQUEST['productprice'];
        $productdiscount = $_REQUEST['productdiscount'];
        $productnumber = $_REQUEST['productnumber'];
        $isUploaded = $this->uploadImageFile();
        if ($isUploaded == 1) {
            $productimage = htmlspecialchars(basename($_FILES["productimage"]["name"]));
        }
        $isSuccess = Product::update($productid, $productname, $productdes, $productsize, $productprice, $productdiscount, $productnumber, $productimage);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=product');
        else
            header('Location: ?route=failure');
        exit;
    }

    public function deleteProduct()
    {
        $productid = $_GET['productid'];
        if (isset($productid)) {
            Product::delete($productid);
            header('Location: ?route=product');
            exit;
        } else {
            header('Location: ?route=failure');
            exit;
        }
    }

    function uploadImageFile()
    {
        $target_dir = "../app/images/";
        $target_file = $target_dir . basename($_FILES["productimage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["productimage"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["productimage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file)) {
                // echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
                return 1;
            } else {
                // echo "Sorry, there was an error uploading your file.";
                return 0;
            }
        }
    }

    function addCart()
    {
        session_start();
        if (isset($_GET['productid'])) {
            $productid = $_GET['productid'];
            $productlist = Product::find($productid);
            //Nếu giỏ hàng đã tồn tại
            if (!empty($_SESSION['cart'])) {
                //lấy mã số phiếu này trong giỏ hàng
                $acol = array_column($_SESSION['cart'], 'productid');
                //kiểm tra mã số phiếu trong giỏ hàng có tồn tại hay không?
                if (in_array($productid, $acol)) {
                    //nếu tồn tại
                    $_SESSION['cart'][$productid]['soluong'] += 1;
                } else {
                    //nếu mã số phiếu chưa tồn tại
                    $item = [
                        'productid' => $_GET['productid'],
                        'soluong' => 1,
                        'hinhanh' => $productlist['ProductImage'],
                        'ten' => $productlist['ProductName'],
                        'size' => $productlist['ProductSize'],
                        'price' => $productlist['ProductDiscount'],
                        'tongtien' => $productlist['ProductDiscount'] * 1
                    ];
                    //thêm vào session cart
                    $_SESSION['cart'][$productid] = $item;
                }

            } else {
                //Nếu chưa tồn tại trong shopping cart
                $item = [
                    'productid' => $_GET['productid'],
                    'soluong' => 1,
                    'hinhanh' => $productlist['ProductImage'],
                    'ten' => $productlist['ProductName'],
                    'size' => $productlist['ProductSize'],
                    'price' => $productlist['ProductDiscount'],
                    'tongtien' => $productlist['ProductDiscount'] * 1
                ];
                //thêm vào session cart
                $_SESSION['cart'][$productid] = $item;
            }
            header("Location: ?route=view-cart");
            exit;
        } else {
            header("Location: ?route=error");
            exit;
        }
    }

    function viewCart()
    {
        require_once('../app/views/cart.php');
    }

    function emptyCart()
    {
        session_start(); // start the session
        // unset the cart session variable
        unset($_SESSION['cart']);
        // redirect back to the shopping cart page
        header("Location: ?route=view-cart");
        exit();
    }

    function deleteCartItem()
    {
        session_start();
        $productid = $_GET['productid'];
        if (isset($productid)) {
            unset($_SESSION['cart'][$productid]);
            header('Location: ?route=view-cart');
            exit;
        } else {
            header('Location: ?route=error');
            exit;
        }
    }
    function updateCart()
    {
        session_start();
        $productid = $_POST['productid'];
        $soluong = $_POST['soluong'];
        if (isset($productid)) {
            $_SESSION['cart'][$productid]['soluong'] = $soluong;
            $_SESSION['cart'][$productid]['tongtien'] = $_SESSION['cart'][$productid]['price'] * $soluong;
            header('Location: ?route=view-cart');
            exit;
        } else {
            header('Location: ?route=error');
            exit;
        }
    }

    // function search() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $query = $_POST['query'];
    //         $results = Product::search($query);
    //         require_once('../app/views/search-product.php');
    //         exit;
    //     } else {
    //         header('Location: ?route=error');
    //         exit;
    //     }
    // }
    
// function createProduct(){
//     session_start();
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//         $productname = $_POST['productname'];
//         $productdes = $_POST['productdes'];
//         $productsize = $_POST['productsize'];
//         $productprice = $_POST['productprice'];
//         $productdiscount = $_POST['productdiscount'];
//         $productnumber = $_POST['productnumber'];
//         $productimage = $_POST['productimage'];
//         $isSuccess = Product::create($productname, $productdes, $productsize, $productprice, $productdiscount, $productnumber, $productimage);
//         echo json_encode(['success' => $isSuccess]);
//     }
// }

// function editProduct(){
//     if ($_SERVER['REQUEST_METHOD'] == "POST") {
//         //upload file
//         $isUploaded = $this->uploadImageFile();
//         if($isUploaded == 1){
//             $avatar = htmlspecialchars(basename($_FILES["avatar"]["name"]));
//             session_start();
//             $userId = $_SESSION['UserId'];
//             $isSuccess = User::editAvatar($userId, $avatar);
//             if($isSuccess){
//                 $_SESSION['Avatar'] = $avatar;
//                 header('Location: ?');
//             } else{
//                 die("Server's Error while update User's Avatar!, it's shutting down!");
//             }
//         } else {
//             die("Server's Error, it's shutting down!");
//         }
//     }

//     require_once('../app/views/edit-avatar.php');
// }

// function deleteProduct(){
//     if ($_SERVER['REQUEST_METHOD'] == "POST") {
//         $productid = $_POST['ProductId'];
//         $isSuccess = Product::delete($productid);
//         echo json_encode((['success' => $isSuccess]));
//     }
// }

}