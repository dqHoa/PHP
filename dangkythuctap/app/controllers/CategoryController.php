<?php
require_once('../app/models/Category.php');

class CategoryController
{
    function showCategory()
    {
        $categorylist = Category::getAll();
        require_once('../app/views/admin/category/show-category.php');
    }

    function createCategory()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $categoryname = $_POST['categoryname'];
            $isSuccess = Category::create($categoryname);
            echo json_encode(['success' => $isSuccess]);
        }

    }

    function editCategory()
    {
        $category = Category::getAll();
        require_once('../app/views/admin/category/show-category.php');
    }

    function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $categoryid = $_POST['CategoryId'];
            $categoryname = $_POST['CategoryName'];
            $isSuccess = Category::update($categoryid, $categoryname);
            echo json_encode(['success' => $isSuccess]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    function deleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $categoryid = $_POST['CategoryId'];
            $isSuccess = Category::delete($categoryid);
            echo json_encode((['success' => $isSuccess]));
        }
    }
}