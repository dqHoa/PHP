<?php
include_once('../app/views/shares/admin-header.php');
?>
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center">Sửa Sản Phẩm</h3>
      </div>
      <div class="card-body">
        <?php foreach ($productlist as $product):
          if ($product['ProductId'] == $_GET['productid']) { ?>
            <form action="?route=update-product" method="post" enctype="multipart/form-data">

              <input type="hidden" id="productid" name="productid" value="<?= $product['ProductId']; ?>" required>

              <div class="form-group">
                <label for="productname">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="productname" name="productname"
                  value="<?= $product['ProductName']; ?>" required>
              </div>
              <div class="form-group">
                <label for="productdes">Mô Tả Sản Phẩm</label>
                <input type="text" class="form-control" id="productdes" name="productdes"
                  value="<?= $product['ProductDes']; ?>" required>
              </div>
              <div class="form-group">
                <label for="productsize">Size Sản Phẩm</label>
                <input type="text" class="form-control" id="productsize" name="productsize"
                  value="<?= $product['ProductSize']; ?>" required>
              </div>
              <div class="form-group">
                <label for="productprice">Giá Sản Phẩm</label>
                <input type="text" class="form-control" id="productprice" name="productprice"
                  value="<?= $product['ProductPrice']; ?>" required>
              </div>
              <div class="form-group">
                <label for="productdiscount">Giảm Giá</label>
                <input type="text" class="form-control" id="productdiscount" name="productdiscount"
                  value="<?= $product['ProductDiscount']; ?>" required>
              </div>
              <div class="form-group">
                <label for="productnumber">Số Lượng Sản Phẩm</label>
                <input type="text" class="form-control" id="productnumber" name="productnumber"
                  value="<?= $product['ProductNumber']; ?>" required>
              </div>
              <div class="form-group">
                <label for="productprice">Hình Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="productimage" name="productimage" value="<?= $product['ProductImage']; ?>" required>
              </div>
              <br />
              <button type="submit" class="btn btn-primary w-100">Xac Nhan</button>
            </form>
          <?php }endforeach ?>
      </div>
    </div>
  </div>
</div>
<?php
include_once('../app/views/shares/admin-footer.php');
?>