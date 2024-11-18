<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // danh muc
    'danh-muc' => (new AdminDanhMucController())->DanhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->FormAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->PostAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->FormEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->PostEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // san pham
    'san-pham' => (new AdminSanPhamController())->DanhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->FormAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->PostAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->FormEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->PostEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
};
