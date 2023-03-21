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
                <button class="btn btn-primary edit-phieu" data-id="<?= $phieu['MaSoPhieu'] ?>" data-toggle="modal" data-target="#editModal">Edit</button>
                
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Ma So Phieu</th>
            <th scope="col">Ho Ten</th>
            <th scope="col">Ma Sinh Vien</th>
            <th scope="col">Chuyen Nganh</th>
            <th scope="col">Cong Ty</th>
            <th scope="col">Sua</th>
            <th scope="col">Xoa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($danhSachPhieuDK as $phieu) : ?>
            <tr>
                <td><?= $phieu['MaSoPhieu'] ?></td>
                <td><?= $phieu['HoTen'] ?></td>
                <td><?= $phieu['MaSinhVien'] ?></td>
                <td><?= $phieu['ChuyenNganh'] ?></td>
                <td><?= $phieu['CongTy'] ?></td>
                <td><a href="?route=edit&masophieu=<?= $phieu['MaSoPhieu'] ?>">Sua</a></td>
                <td><a href="?route=delete&masophieu=<?= $phieu['MaSoPhieu'] ?>">Xoa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
include_once('../app/views/shares/footer.php')
  ?>