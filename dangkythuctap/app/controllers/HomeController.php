<?php
require_once('../app/models/User.php');
require_once('../app/models/Product.php');

class HomeController {
  public function index() {
    // $users = User::getAll();
    $productlist = Product::getAll();
    require_once('../app/views/trang-chu.php');
  }
}
