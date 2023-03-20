<?php
class PhieuDangKy {
  public static function getAll() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM phieudangkythuctap');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function find($masophieu) {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM phieudangkythuctap WHERE MaSoPhieu = :masophieu');
    $stmt->bindParam(':masophieu', $masophieu);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  //tao phieu dang ky
  public static function create($hoten, $masinhvien, $chuyennganh, $congty) {
    global $pdo;
    
    $sql = "INSERT INTO phieudangkythuctap (HoTen, MaSinhVien, ChuyenNganh, CongTy) VALUES (:hoten, :masinhvien, :chuyennganh, :congty)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);

    return $stmt->execute();
  }
  public static function delete($masophieu) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM phieudangkythuctap WHERE MaSoPhieu = :masophieu');
    $stmt->bindParam(':masophieu', $masophieu, PDO::PARAM_STR);
    return $stmt->execute();
    
  }
  public static function update($masophieu, $hoten, $masinhvien, $chuyennganh, $congty) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE phieudangkythuctap SET HoTen = :hoten, MaSinhVien = :masinhvien, ChuyenNganh = :chuyennganh, CongTy = :congty WHERE MaSoPhieu = :masophieu');
    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);
    $stmt->bindParam(':mapsohieu', $masophieu);
    return $stmt->execute();
  }
}
