<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController())->detailProduct(),

    // gio hang
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),

    //thanh toan
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-li-thanh-toan' => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-don-hang' => (new HomeController())->chiTietDonHang(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),

    // auth
    'login-client' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout-client' => (new HomeController())->logoutClient(),
    'register' => (new HomeController())->registers(),
    'check-register' => (new HomeController())->postRegisters(),
    'tai-khoan-client' => (new HomeController())->inforClient(),
    'edit-client' => (new HomeController())->postEditClient(),

    //binh luan
    'binh-luan' => (new HomeController())->postBinhLuan(),
};
