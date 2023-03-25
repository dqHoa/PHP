<?php
include_once('../app/views/shares/header.php')
  ?>
<div class="row" id="phieu-container">
    <?php foreach ($danhSachPhieuDK as $phieu): ?>
    <div class="col-6" id="<?= $phieu['MaSoPhieu'] ?>">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $phieu['MaSoPhieu'] ?></h5>
                <p class="card-text"><?= $phieu['HoTen'] ?> - <?= $phieu['MaSinhVien'] ?> - <?= $phieu['ChuyenNganh'] ?>
                </p>
                <a href="?route=add-cart&masophieu=<?= $phieu['MaSoPhieu'] ?>" class="btn btn-primary">Add To Cart</a>
                <!-- delete Ajax -->
                <button class="btn btn-danger delete-phieu" data-id="<?= $phieu['MaSoPhieu'] ?>">Delete</button>
                <!-- edit Ajax -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal-<?= $phieu['MaSoPhieu'] ?>">
                    Edit
                </button>
                <div class="modal fade" id="exampleModal-<?= $phieu['MaSoPhieu'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="?route=update" method="post">

                                    <input type="hidden" id="MaSoPhieu" name="MaSoPhieu"
                                        value="<?= $phieu['MaSoPhieu']; ?>" required>

                                    <div class="form-group">

                                        <label for="hoten">Ho Ten</label>
                                        <input type="text" class="form-control" id="hoten" name="HoTen"
                                            value="<?= $phieu['HoTen']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mssv">Ma sinh vien</label>
                                        <input type="text" class="form-control" id="mssv" name="MaSinhVien"
                                            value="<?= $phieu['MaSinhVien']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="chuyennganh">Chuyen nganh</label>
                                        <input type="text" class="form-control" id="chuyennganh" name="ChuyenNganh"
                                            value="<?= $phieu['ChuyenNganh']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="congty">Cong ty</label>
                                        <input type="text" class="form-control" id="congty" name="CongTy"
                                            value="<?= $phieu['CongTy']; ?>" required>
                                    </div>
                                    <br />
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
<script>
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
})
</script>
<?php
include_once('../app/views/shares/footer.php')
  ?>