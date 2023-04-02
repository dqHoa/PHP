<?php
include_once('../app/views/shares/header.php');
?>
<main id="main" class="main">
    <h1 class="text-info">Trang shopping cart</h1>
    <table class="table" id="cartTable">
        <a href="?route=empty-cart" class="btn-sm btn-danger mt-2"> Xoá Giỏ Hàng </a>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Size</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if (isset($_SESSION['cart'])):
                foreach ($_SESSION['cart'] as $cart): ?>
                    <tr>
                        <td>
                            <?= $cart['productid'] ?>
                        </td>
                        <td>
                            <img style="width: 100px" src="../app/images/<?= $cart['hinhanh'] ?>">
                        </td>
                        <td>
                            <?= $cart['ten'] ?>
                        </td>
                        <td>
                            <?= $cart['size'] ?>
                        </td>
                        <td>
                            <?= $cart['price'] ?><sup>đ</sup>
                        </td>
                        <td>
                            <!-- update so luong -->
                            <form action="?route=cart-update" method="post">
                                <input type="number" value="<?= $cart['soluong']; ?>" name="soluong" min="1">
                                <input type="hidden" name="productid" value="<?= $cart['productid']; ?>">
                                <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
                            </form>
                        </td>
                        <td>
                            <?= $cart['tongtien'] ?><sup>đ</sup>
                        </td>
                        <td>
                            <!-- xoa 1 san pham trong cart-->
                            <a class="btn btn-sm btn-danger"
                                href="?route=delete-cart-item&productid=<?= $cart['productid']; ?>">Remove</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
                <?php
                function getTotalCartPrice()
                {
                    $totalPrice = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            $totalPrice += $item['tongtien'];
                        }
                    }
                    return $totalPrice;
                }
                ?>
                <tr>
                    <?php $totalPrice = getTotalCartPrice(); ?>
                    <td colspan="6" style="text-align: right;"><strong>Thành tiền:</strong></td>
                    <td>
                        <?= $totalPrice ?><sup>đ</sup>
                    </td>
                    <td></td>
                </tr>

            <?php endif;
            ?>
        </tbody>
        <h2>Thành tiền: </h2>
    </table>
</main>

<?php
include_once('../app/views/shares/footer.php');
?>