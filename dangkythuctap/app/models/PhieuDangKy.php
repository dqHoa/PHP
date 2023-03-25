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
  public static function create($hoten, $masinhvien, $chuyennganh, $congty, $sotien) {
    global $pdo;
    
    $sql = "INSERT INTO phieudangkythuctap (HoTen, MaSinhVien, ChuyenNganh, CongTy, SoTien) VALUES (:hoten, :masinhvien, :chuyennganh, :congty, :sotien)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);
    $stmt->bindParam(':sotien', $sotien);

    return $stmt->execute();
  }
  public static function delete($masophieu) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM phieudangkythuctap WHERE MaSoPhieu = :masophieu');
    $stmt->bindParam(':masophieu', $masophieu, PDO::PARAM_STR);
    return $stmt->execute();
    
  }
  public static function update($hoten, $masinhvien, $chuyennganh, $congty, $maphieu, $sotien) {
    global $pdo;
    
    $sql = "UPDATE phieudangkythuctap SET HoTen =:hoten, MaSinhVien =:masinhvien, ChuyenNganh =:chuyennganh, CongTy=:congty, SoTien=:sotien WHERE MaSoPhieu= :maphieu";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);
    $stmt->bindParam(':maphieu', $maphieu);
    $stmt->bindParam(':sotien', $sotien);

    return $stmt->execute();
  }
}
