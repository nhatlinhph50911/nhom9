<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/home.php';
    }

    public function danhSachSanpham()
    {
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);
        // die();
        require_once './views/listProduct.php';
    }
    public function detailProduct()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getDetailSanPham($id);
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listAnhSP = $this->modelSanPham->getListAnhSanPham($id);
        $listCmt = $this->modelSanPham->getListCmtSp($id);
        $sizes = $this->modelSanPham->getSizeById($id);
        // var_dump($SanPham);
        // var_dump($sizes);
        // var_dump($listAnhSP);
        // var_dump($listCmt);
        // die;
        require_once './views/productDetail.php';
    }
    public function formLogin()
    {
        // $_SESSION['error'] = '';
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            // var_dump($password);
            // die;

            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($user);
            // var_dump($email);
            // var_dump($password);
            // die;
            if ($user == $email) {
                // lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header("location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                // var_dump($user);
                // var_dump($_SESSION['error']);
                // die;
                header("location: " . BASE_URL . '?act=login-client');
                exit();
            }
        }
    }
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']);
                // var_dump($mail['id']);
                // die;
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                $checkSanPham = false;
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGH($gioHang['id'], $san_pham_id, $so_luong);
                }
                header("location: " . BASE_URL . '?act=gio-hang');
            } else {
                var_dump('loi');
                die;
            }
        }
    }
    public function gioHang()
    {
        if ($_SESSION['user_client']) {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']);
                // var_dump($mail['id']);
                // die;
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                require_once './views/gioHang.php';
            } else {
                var_dump('loi');
                die;
            }
        }
    }
}
