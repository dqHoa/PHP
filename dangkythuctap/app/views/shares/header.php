<!DOCTYPE html>
<html>

<head>
  <title>Header Example</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../app/css/style.css">
</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <!-- Logo -->
        <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo"></a>
      </div>
      <ul class="nav navbar-nav">
        <!-- Homepage -->
        <li class="active"><a href="?">Home</a></li>
        <!-- Menu -->
        <li><a href="?route=danh-sach">Menu</a></li>
        <!-- About Us -->
        <li><a href="#">About Us</a></li>
        <!-- Cart -->
        <li><a href="?route=view-cart">Cart</a></li>
      </ul>
      <!-- Search Bar -->
      <form action="?route=search" class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <!-- Login/Signup Buttons -->
        <li>
          <?php
          session_start();
          if (isset($_SESSION['UserId'])) {
            $avatar = $_SESSION['Avatar'] ?? "avatar.png";

            echo "<li><a href='#'>Welcome, " . $_SESSION['FullName'] . "</a></li>";
            echo "<li><a href='?route=edit-avatar'><img src='../app/images/" . $avatar . "' class='img-circle' width='25' height='25'></a></li>";
            echo "<li><a class=glyphicon glyphicon-log-out' href='?route=logout'>Logout</a></li>";

          } else {
            echo "<li><a href='?route=register'><span class='glyphicon glyphicon-user' ></span>Signup</a></li>";
            echo "<li><a href='?route=login'><span class='glyphicon glyphicon-log-in'></span>Login</a></li>";

          }
          ?>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">

</body>

</html>