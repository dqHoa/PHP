<?php

$host = 'localhost';
$dbname = 'dangkythuctap';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    
    $db = new PDO($dsn, $username, $password);

    $sql = "INSERT INTO phieudangkythuctap (HoTen, MaSinhVien, ChuyenNganh, CongTy) VALUES (:hoten, :masinhvien, :chuyennganh, :congty)";
    $stmt = $db->prepare($sql);

    $hoten = $_POST['hoten'];
    $masinhvien = $_POST['mssv'];
    $chuyennganh = $_POST['chuyennganh'];
    $congty = $_POST['congty'];

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);

    $stmt->execute();
    echo "Dang ky thanh cong";
} catch (\Throwable $th) {
   echo "Dang ky loi!!!";
   exit ();
}





?>