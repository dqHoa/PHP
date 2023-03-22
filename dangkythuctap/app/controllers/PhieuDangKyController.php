<?php
require_once('../app/models/PhieuDangKy.php');
class PhieuDangKyController
{
    // hien thi phieu dang ky
    public function index()
    {
        require_once('../app/views/dangKy.php');
    }
    // hien thi danh sach da dang ky 
    public function showPhieuDangKy()
    {
        $danhSachPhieuDK = PhieuDangKy::getAll();
        require_once('../app/views/danhsach.php');
    }

    function createPhieuDangKy()
    {

        $hoten = $_POST['hoten'];
        $masinhvien = $_POST['mssv'];
        $chuyennganh = $_POST['chuyennganh'];
        $congty = $_POST['congty'];

        $isSuccess = PhieuDangKy::create($hoten, $masinhvien, $chuyennganh, $congty);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=danh-sach');
        else
            header('Location: ?route=failure');
        exit;

    }
    public function deletePhieuDangKy()
    {
        $maphieu = $_GET['masophieu'];
        if (isset($maphieu)) {
            PhieuDangKy::delete($maphieu);
            header('Location: ?route=danh-sach');
            exit;
        } else {
            header('Location: ?route=failure');
            exit;
        }
    }
    function editPhieuDangKy()
    {
        $phieudangky = PhieuDangKy::getAll();
        require_once('../app/views/edit.php');

    }

    function updatePhieuDangKy()
    {
        $hoten = $_REQUEST['HoTen'];
        $masinhvien = $_REQUEST['MaSinhVien'];
        $chuyennganh = $_REQUEST['ChuyenNganh'];
        $congty = $_REQUEST['CongTy'];
        $maphieu = $_REQUEST['MaSoPhieu'];
        $isSuccess = PhieuDangKy::update($hoten, $masinhvien, $chuyennganh, $congty, $maphieu);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=danh-sach');
        else
            header('Location: ?route=failure');
        exit;
    }


    function addCart()
    {
        session_start();
        if (isset($_GET['masophieu'])) {
            $maSoPhieu = $_GET['masophieu'];
            $phieuDangKy = PhieuDangKy::find($maSoPhieu);
            //Nếu giỏ hàng đã tồn tại
            if (!empty($_SESSION['cart'])) {
                //lấy mã số phiếu này trong giỏ hàng
                $acol = array_column($_SESSION['cart'], 'masophieu');
                //kiểm tra mã số phiếu trong giỏ hàng có tồn tại hay không?
                if (in_array($maSoPhieu, $acol)) {
                    //nếu tồn tại
                    $_SESSION['cart'][$maSoPhieu]['soluong'] += 1;
                } else {
                    //nếu mã số phiếu chưa tồn tại
                    $item = [
                        'masophieu' => $_GET['masophieu'],
                        'soluong' => 1,
                        'ten' => $phieuDangKy['HoTen']
                    ];
                    //thêm vào session cart
                    $_SESSION['cart'][$maSoPhieu] = $item;
                }

            } else {
                //Nếu chưa tồn tại trong shopping cart
                $item = [
                    'masophieu' => $_GET['masophieu'],
                    'soluong' => 1,
                    'ten' => $phieuDangKy['HoTen']
                ];
                //thêm vào session cart
                $_SESSION['cart'][$maSoPhieu] = $item;
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
        $maphieu = $_GET['masophieu'];
        if (isset($maphieu)) {
            unset($_SESSION['cart'][$maphieu]);
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
        $maphieu = $_POST['masophieu'];
        $soluong = $_POST['soluong'];
        if (isset($maphieu)) {
            $_SESSION['cart'][$maphieu]['soluong'] = $soluong;
            header('Location: ?route=view-cart');
            exit;
        } else {
            header('Location: ?route=error');
            exit;
        }
    }
    function deleteAjax()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $maSoPhieu = $_POST['id'];
            $isSuccess = PhieuDangKy::delete($maSoPhieu);
            echo json_encode(['success' => $isSuccess]);
        }
    }
    function editAjax()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $maSoPhieu = $_POST['id'];
        $phieu = PhieuDangKy::getById($maSoPhieu);
        if ($phieu) {
            echo json_encode([
              'success' => true,
              'hoTen' => $phieu->hoTen,
              'maSinhVien' => $phieu->maSinhVien,
              'chuyenNganh' => $phieu->chuyenNganh,
              'congTy' => $phieu->congTy
            ]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
}
}