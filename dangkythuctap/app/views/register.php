<?php
include_once('../app/views/shares/header.php');
?>
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center"> DANG KY TAI KHOAN</h3>
        <p class="text-danger">
          <?php
            if(isset($_SESSION['Error'])){
              echo "Loi: <br/>" . $_SESSION['Error'];
            }
          ?>
        </p>
      </div>
      <div class="card-body">
        <form action="?route=register" method="post">
          <div class="form-group">
            <label for="FullName">FullName: </label>
            <input type="text" class="form-control" id="FullName" name="FullName" required>
          </div>
          <div class="form-group">
            <label for="UserName">UserName: </label>
            <input type="text" class="form-control" id="UserName" name="UserName" required>
          </div>
          <div class="form-group">
            <label for="Pass">Pass: </label>
            <input type="password" class="form-control" id="Pass" name="Pass" required>
          </div>
          <div class="form-group">
            <label for="ConfirmPass">Confirm Pass:</label>
            <input type="password" class="form-control" id="ConfirmPass" name="ConfirmPass" required>
          </div>
          <br />
          <button type="submit" class="btn btn-primary w-100">Dang ky Tai Khoan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include_once('../app/views/shares/footer.php');
?>