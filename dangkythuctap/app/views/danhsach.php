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
                <a href="?route=add-cart&masophieu=<?= $phieu['MaSoPhieu'] ?>" class="btn btn-primary">Add To Card</a>
                <!-- delete Ajax -->
                <button class="btn btn-danger delete-phieu" data-id="<?= $phieu['MaSoPhieu'] ?>">Delete</button>
                <!-- edit Ajax -->
                <button class="btn btn-primary edit-phieu" data-id="<?= $phieu['MaSoPhieu'] ?>" data-toggle="modal" data-target="#editModal">Edit</button>
                
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>

<?php
include_once('../app/views/shares/footer.php')
  ?>