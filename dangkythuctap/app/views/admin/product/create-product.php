<?php
include_once('../app/views/shares/admin-header.php');
?>
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center">Tạo Sản Phẩm</h3>
      </div>
      <div class="card-body">
        <form action="?route=create-product" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="productname">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="productname" name="productname" required>
          </div>
          <div class="form-group">
            <label for="productdes">Mô Tả Sản Phẩm</label>
            <input type="text" class="form-control" id="productdes" name="productdes" required>
          </div>
          <div class="form-group">
            <label for="productsize">Size Sản Phẩm</label>
            <input type="text" class="form-control" id="productsize" name="productsize" required>
          </div>
          <div class="form-group">
            <label for="productprice">Giá Sản Phẩm</label>
            <input type="text" class="form-control" id="productprice" name="productprice" required>
          </div>
          <div class="form-group">
            <label for="productdiscount">Giảm Giá</label>
            <input type="text" class="form-control" id="productdiscount" name="productdiscount" required>
          </div>
          <div class="form-group">
            <label for="productnumber">Số Lượng</label>
            <input type="text" class="form-control" id="productnumber" name="productnumber" required>
          </div>
          <div class="form-group">
            <label for="productimage">Hình Ảnh</label>
            <input type="file" class="form-control" id="productimage" name="productimage" required>
          </div>
          <br />
          <button type="submit" class="btn btn-primary w-100">Tạo Sản Phẩm</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include_once('../app/views/shares/admin-footer.php');
?>