<?php
class Product {

  public static function getAll() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM product');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function find($productid) {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM product WHERE ProductId = :productid');
    $stmt->bindParam(':productid', $productid);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  public static function create($productname, $productdes, $productsize, $productprice, $productdiscount, $productnumber, $productimage) {
    global $pdo;
    
    $sql = "INSERT INTO product (ProductName, ProductDes, ProductSize, ProductPrice, ProductDiscount, ProductNumber, ProductImage) VALUES (:productname, :productdes, :productsize, :productprice, :productdiscount, :productnumber, :productimage)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':productname', $productname);
    $stmt->bindParam(':productdes', $productdes);
    $stmt->bindParam(':productsize', $productsize);
    $stmt->bindParam(':productprice', $productprice);
    $stmt->bindParam(':productdiscount', $productdiscount);
    $stmt->bindParam(':productnumber', $productnumber);
    $stmt->bindParam(':productimage', $productimage);

    return $stmt->execute();
  }
  
  public static function delete($productid) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM product WHERE ProductId = :productid');
    $stmt->bindParam(':productid', $productid, PDO::PARAM_STR);
    return $stmt->execute();
    
  }

  public static function update($productid, $productname, $productdes, $productsize, $productprice, $productdiscount, $productnumber, $productimage) {
    global $pdo;
    
    $sql = "UPDATE product SET ProductName = :productname, ProductDes = :productdes, ProductPrice = :productprice, ProductDiscount = :productdiscount, ProductNumber = :productnumber, ProductImage = :productimage WHERE ProductId = :productid";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':productid', $productid);
    $stmt->bindParam(':productname', $productname);
    $stmt->bindParam(':productdes', $productdes);
    $stmt->bindParam(':productsize', $productsize);
    $stmt->bindParam(':productprice', $productprice);
    $stmt->bindParam(':productdiscount', $productdiscount);
    $stmt->bindParam(':productnumber', $productnumber);
    $stmt->bindParam(':productimage', $productimage);


    return $stmt->execute();
  }

  public function search($query) {
    global $pdo;

    $sql = "SELECT * FROM product WHERE name LIKE :query OR description LIKE :query";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(['query' => "%$query%"]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
