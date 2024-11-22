<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

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
    'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),

    // don hang
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    // 'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

    // thong ke
    '/' => (new AdminThongKeController())->home(),

    // quan ly tai khoan quan tri

    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->listQuanTri(),
    'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),

    //quan ly tai khoan khach hang
    'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->listKhachHang(),

    // route auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
};
