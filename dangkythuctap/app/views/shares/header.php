<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang web dang ky thuc tap</title>
  <link rel="stylesheet" href="../app/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="?">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?route=dang-ky">Đăng Ký</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?route=danh-sach">Danh Sách</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?route=view-cart">Giỏ hàng</a>
            </li>
            <li class="nav-item">
              <!-- Chua Dang Nhap -->
              <!-- Da Dang Nhap -->
              <?php
              session_start();
              if (isset($_SESSION['UserId'])) {
                $avatar = $_SESSION['Avatar'] ?? "avatar.png";

                echo "<li> <a href='?route=edit-avatar'> <img width='45px' src='../app/images/".$avatar."'/></a></li>";
                echo "<li><a class='btn btn-danger nav-link' href='?route=logout'>Dang Xuat</a></li>";
                echo "<li><a class='text-danger nav-link' href='?route=logout'>Xin chao: ".$_SESSION['FullName']."</a></li>";
                
              } else {
                echo "<li><a class='btn btn-info nav-link' href='?route=register'>Dang Ky Tai Khoan</a></li>";
                echo "<li><a class='btn btn-info nav-link' href='?route=login'>Dang Nhap</a></li>";

              }
              ?>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>