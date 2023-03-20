<?php
require_once('../app/models/DanhSach.php');
class DanhSachController {
    function createPhieuDangKy(){

        $hoten = $_POST['hoten'];
        $masinhvien = $_POST['mssv'];
        $chuyennganh = $_POST['chuyennganh'];
        $congty = $_POST['congty'];

        $isSuccess = PhieuDangKy::create($hoten, $masinhvien, $chuyennganh, $congty);
        if($isSuccess)        
            // Redirect to homepage
            header('Location: ?route=danh-sach');
        else 
            header('Location: ?route=failure');
        exit;

    }

}