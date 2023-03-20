<?php
class User
{
  public static function create($fullName, $userName, $hashPass)
  {
    global $pdo;

    $sql = "INSERT INTO user (UserName, Pass, FullName) VALUES (:userName, :hashPass, :fullName)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':hashPass', $hashPass);
    $stmt->bindParam(':fullName', $fullName);

    return $stmt->execute();
  }

  public static function find($userName)
  {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM user WHERE UserName = :userName');
    $stmt->bindParam(':userName', $userName);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function editAvatar($userId, $avatar)
  {
    global $pdo;

    $sql = "UPDATE user SET Avatar=:a where Id=:i";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':a', $avatar);
    $stmt->bindParam(':i', $userId);

    return $stmt->execute();
  }
}

?>