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
  
  public static function create($productname, $productdes, $productnumber, $productsize, $productprice, $productdiscount, $categoryid) {
    global $pdo;
    
    $sql = "INSERT INTO product (ProductName, ProductDes, ProductNumber, ProductSize, ProductPrice, ProductDiscount, CategoryId) VALUES (:productname, :productdes, :productnumber, :productsize, :productprice, :productdiscount, :categoryid)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':productname', $productname);
    $stmt->bindParam(':productdes', $productdes);
    $stmt->bindParam(':productnumber', $productnumber);
    $stmt->bindParam(':productsize', $productsize);
    $stmt->bindParam(':productprice', $productprice);
    $stmt->bindParam(':productdiscount', $productdiscount);
    $stmt->bindParam(':categoryid', $categoryid);

    return $stmt->execute();
  }
  
  public static function delete($productid) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM product WHERE ProductId = :masophieu');
    $stmt->bindParam(':productid', $productid, PDO::PARAM_STR);
    return $stmt->execute();
    
  }

  public static function update($productname, $productdes, $productnumber, $productsize, $productprice, $productdiscount, $categoryid) {
    global $pdo;
    
    $sql = "UPDATE product SET ProductName = :productname, ProductDes = :productdes, ProductNumber = :productnumber, ProductPrice = :productprice, ProductDiscount = :productdiscount, CategoryId = :categoryid WHERE ProductId = :productid";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':productname', $productname);
    $stmt->bindParam(':productdes', $productdes);
    $stmt->bindParam(':productnumber', $productnumber);
    $stmt->bindParam(':productsize', $productsize);
    $stmt->bindParam(':productprice', $productprice);
    $stmt->bindParam(':productdiscount', $productdiscount);
    $stmt->bindParam(':categoryid', $categoryid);

    return $stmt->execute();
  }
}
