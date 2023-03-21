<?php
include_once('../app/views/shares/header.php');
?>
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center">PHIEU SUA THUC TAP</h3>
      </div>
      <div class="card-body">
        <?php foreach ($phieudangky as $phieu):
          if ($phieu['MaSoPhieu'] == $_GET['masophieu']) { ?>
            <form action="?route=update" method="post">

              <input type="hidden" id="MaSoPhieu" name="MaSoPhieu" value="<?= $phieu['MaSoPhieu']; ?>" required>

              <div class="form-group">

                <label for="hoten">Ho Ten</label>
                <input type="text" class="form-control" id="hoten" name="HoTen" value="<?= $phieu['HoTen']; ?>" required>
              </div>
              <div class="form-group">
                <label for="mssv">Ma sinh vien</label>
                <input type="text" class="form-control" id="mssv" name="MaSinhVien" value="<?= $phieu['MaSinhVien']; ?>"
                  required>
              </div>
              <div class="form-group">
                <label for="chuyennganh">Chuyen nganh</label>
                <input type="text" class="form-control" id="chuyennganh" name="ChuyenNganh"
                  value="<?= $phieu['ChuyenNganh']; ?>" required>
              </div>
              <div class="form-group">
                <label for="congty">Cong ty</label>
                <input type="text" class="form-control" id="congty" name="CongTy" value="<?= $phieu['CongTy']; ?>"
                  required>
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
include_once('../app/views/shares/footer.php');
?>