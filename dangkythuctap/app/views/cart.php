<?php
include_once('../app/views/shares/header.php');
  ?>
<main id="main" class="main">
    <h1 class="text-info">Trang shopping cart</h1>
    <table class="table my-3">
        <a href="?route=empty-cart" class="btn-sm btn-danger mt-2"> Xoá Giỏ Hàng </a>
        <thead>
            <tr class="text-center">
                <th>Mã Số Phiếu</th>
                <th>Họ Tên</th>
                <th>Số Lượng</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if(isset($_SESSION['cart'])):
    foreach ($_SESSION['cart']as $cart): ?>
            <tr class="text-center">
                <td>
                    <?= $cart['masophieu'] ?>
                </td>
                <td>
                    <?= $cart['ten'] ?>
                <td>
                    <!-- update so luong -->
                    <form action="?route=cart-update" method="post">
                        <input type="number" value="<?=$cart['soluong'];?>" name="soluong" min="1">
                        <input type="hidden" name="masophieu" value="<?=$cart['masophieu'];?>">
                        <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
                    </form>
                </td>
                <td>
                    <!-- xoa 1 san pham trong cart-->
                    <a class="btn btn-sm btn-danger"
                        href="?route=delete-cart-item&masophieu=<?=$cart['masophieu'];?>">Remove</a>
                </td>

            </tr>
            <?php endforeach ;
            endif;
            ?>
        </tbody>
    </table>
</main>
<?php
include_once('../app/views/shares/footer.php');
?>