<?php
require_once('../app/models/Product.php');

class ProductController {
    function index(){
        require_once('../app/views/admin/admin.php');
    }

    function showProduct(){

        require_once('../app/views/admin/product/show-product.php');
    }

    function createProduct(){

    }

    function editProduct(){
        
    }
}