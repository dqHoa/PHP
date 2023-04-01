<?php
$routes = [
  '/' => [
    'controller' => 'HomeController',
    'action' => 'index'
  ],
  'dang-ky' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'index'
  ],
  'danh-sach' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'showPhieuDangKy'
  ]
  ,
  'add' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'createPhieuDangKy'
  ],

  'xoa' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'deletePhieuDangKy'
  ],
  'edit' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'editPhieuDangKy'
  ],

  'update' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'updatePhieuDangKy'
  ],

  'register' => [
    'controller' => 'AccountController',
    'action' => 'register'
  ],
  'login' => [
    'controller' => 'AccountController',
    'action' => 'login'
  ],
  'logout' => [
    'controller' => 'AccountController',
    'action' => 'logout'
  ],
  'edit-avatar' => [
    'controller' => 'AccountController',
    'action' => 'editAvatar'
  ],
  'add-cart' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'addCart'
  ],
  'view-cart' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'viewCart'
  ],
  'empty-cart' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'emptyCart'
  ],
  'delete-cart-item' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'deleteCartItem'
  ],
  'cart-update' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'updateCart'
  ],
  'delete-ajax' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'deleteAjax'
  ],
  'edit-ajax' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'editAjax'
  ],

  //admin
  'admin' => [
    'controller' => 'ProductController',
    'action' => 'index'
  ],

  'category' => [
    'controller' => 'CategoryController',
    'action' => 'showCategory'
  ],

  'product' => [
    'controller' => 'ProductController',
    'action' => 'showProduct'
  ],

  'create-category' => [
    'controller' => 'CategoryController',
    'action' => 'createCategory'
  ],

  'edit-category' => [
    'controller' => 'CategoryController',
    'action' => 'editCategory'
  ],

  'update-category' => [
    'controller' => 'CategoryController',
    'action' => 'updateCategory'
  ],

  'delete-category' => [
    'controller' => 'CategoryController',
    'action' => 'deleteCategory'
  ],
];
