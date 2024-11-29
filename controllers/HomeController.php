<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $danhMucs = $this->modelSanPham->getAllDanhMuc();
        $_SESSION['danh_muc'] = $danhMucs;
        // var_dump($_SESSION['danh_muc']);
        // die;
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
        if (isset($_SESSION['user_client'])) {
            // $SanPham['luot_xem'] += 1;
            $new_view = $SanPham['luot_xem'] + 1;
            // var_dump($SanPham['luot_xem']);
            $this->modelSanPham->updateView($new_view, $SanPham['id']);
        }
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
                $userClient = $this->modelTaiKhoan->getTaiKhoanEmail($user);
                $_SESSION['user_client'] = $userClient;
                // var_dump($_SESSION['user_client']);
                // die;
                header("location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);
                // die;
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
        if (isset($_SESSION['user_client'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $mail = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
                // var_dump($mail['id']);
                // die;
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    // var_dump($gioHang);
                    // die;
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
            }
        } else {
            echo "<script>
                alert('bạn chưa đăng nhập');
                window.location.href = '" . BASE_URL . "?act=login-client';
              </script>";
        }
    }
    public function gioHang()
    {
        if ($_SESSION['user_client']) {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
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
                // var_dump($chiTietGioHang);
                // die;
                require_once './views/gioHang.php';
            } else {
                var_dump('loi');
                die;
            }
        } else {
            echo "<script>
                alert('bạn chưa đăng nhập');
                window.location.href = '" . BASE_URL . "?act=login-client';
              </script>";
        }
    }
    public function thanhToan()
    {
        if ($_SESSION['user_client']) {
            if (isset($_SESSION['user_client'])) {
                $user = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
                // var_dump($user['id']);
                // die;
                $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                // var_dump($user);
                // die;

                require_once './views/thanhToan.php';
            } else {
                var_dump('loi');
                die;
            }
        } else {
            echo "<script>
                alert('bạn chưa đăng nhập');
                window.location.href = '" . BASE_URL . "?act=login-client';
              </script>";
        }
    }
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            // die;
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = Date("Y-m-d");
            // var_dump($ngay_dat);
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = 'DH' . rand(1000, 9999);
            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_id,
                $ma_don_hang
            );
            // lấy thông tin giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

            // luu san pham vao chi tiet don hang
            if ($donHang) {
                // lay ra toan bo san pham trong gio hang
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                //them tung san pham tu gio hang vao chi tiet don hang
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, // id don hang vua tao
                        $item['san_pham_id'], //id san pham
                        $donGia, //don gia 
                        $item['so_luong'], // so luong
                        $donGia * $item['so_luong'] // thanh tien
                    );
                }
                // sau khi them tien hanh xoa san pham trong gio hang
                // xoa toan bo san pham trong chi tiet gio hang
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                // xoa thong tin gio hang nguoi dung
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                // chuyen huong ve trang lich su mua hang
                header("location: " . BASE_URL . '?act=lich-su-mua-hang');
            } else {
                var_dump("loi dat hang");
                die;
            }
        }
    }
    public function logoutClient()
    {
        if (isset($_SESSION['user_client'])) {
            session_destroy();

            // var_dump($_SESSION['user_client']);
            // var_dump("null");
            // die;
            header("location: " . BASE_URL . '?act=/');
        }
    }
    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];


            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            // var_dump($donHangs);
            // die;
            require_once './views/lichSuMuaHang.php';
        } else {
            header("location: " . BASE_URL . '?act=login-client');
        }
    }
    public function registers()
    {
        require_once './views/auth/register.php';
        deleteSessionError();
    }
    public function postRegisters()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $password_repeat = $_POST['password_repeat'] ?? '';

            $error = [];

            // if (empty($ho_ten)) {
            //     $error['ho_ten'] = "bạn chưa nhập họ tên";
            // }
            // if (empty($email)) {
            //     $error['email'] = "bạn chưa nhập email";
            // }
            // if (empty($password)) {
            //     $error['$password'] = "bạn chưa nhập mật khẩu";
            // }
            // if (empty($password_repeat)) {
            //     $error['password_repeat'] = "bạn chưa nhập lại mật khẩu";
            // }
            // $_SESSION['error'] = $error;
            if ($password == $password_repeat) {
                $mat_khau = password_hash($password, PASSWORD_BCRYPT);
                // var_dump($password);
                // var_dump($mat_khau);
                // die;
                $this->modelTaiKhoan->addUser($ho_ten, $email, $mat_khau, 2);
                header("location: " . '?act=login-client');
            } else {
                $error['check_password'] = "mật khẩu bạn nhập không trùng khớp";
                $_SESSION['error'] = $error;
                // var_dump($_SESSION['error']);
                // die;
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL . '?act=register');
            }
        }
    }
    public function postBinhLuan()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $san_pham_id = $_POST['id_san_pham'];
                $noi_dung_cmt = $_POST['comment'];
                $user = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
                $tai_khoan_id = $user['id'];
                $ngay_dang = date("Y-m-d");
                // var_dump($ngay_dang);
                // die;
                $this->modelTaiKhoan->addCmt($san_pham_id, $tai_khoan_id, $noi_dung_cmt, $ngay_dang);
                header("location: " . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            } else {
                header("location: " . BASE_URL . '?act=login-client');
            }
        }
    }
    public function inforClient()
    {
        // var_dump($_SESSION['user_client']);
        // die;
        if (isset($_SESSION['user_client'])) {
            // var_dump($_SESSION['user_client']['gioi_tinh']);
            // die;
            require_once './views/inforClient.php';
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL . "?act=login-client';
          </script>";
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
            // var_dump($user);
            // die;
            $tai_khoan_id = $user['id'];
            $don_hang_id = $_GET['id'];

            $donHang = $this->modelDonHang->getDonHangById($don_hang_id);
            // var_dump($donHang);
            // var_dump($donHang['trang_thai_id']);
            // die;
            if ($donHang['trang_thai_id'] != 1) {
                echo "<script>
                alert('chỉ đơn hàng chưa xác nhận mới có thể hủy');
                window.location.href = '" . BASE_URL . "?act=lich-su-mua-hang';
              </script>";
                exit;
            }
            $result = $this->modelDonHang->updateTrangThaiDonHang($don_hang_id, 6);
            if ($result) {
                echo "<script>
                alert('Hủy thành công');
                window.location.href = '" . BASE_URL . "?act=lich-su-mua-hang';
              </script>";
            } else {
                echo "<script>
                alert('Lỗi');
                window.location.href = '" . BASE_URL . "?act=lich-su-mua-hang';
              </script>";
            }
        } else {
            echo "<script>
                alert('bạn chưa đăng nhập');
                window.location.href = '" . BASE_URL . "?act=login-client';
              </script>";
        }
    }
    public function chiTietDonHang()
    {
        if ($_SESSION['user_client']) {
            $tai_khoan_id = $_SESSION['user_client']['id'];
            $don_hang_id = $_GET['id'];

            $donHang = $this->modelDonHang->getDetailDonHangById($don_hang_id);
            // var_dump($donHang);
            // die;
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangId($don_hang_id);
            // var_dump($chiTietDonHang);
            // die;
            require_once './views/chiTietMuaHang.php';
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL . "?act=login-client';
          </script>";
        }
    }
    public function postEditClient()
    {
        if (isset($_SESSION['user_client'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_SESSION['user_client']['id'];
                $ho_ten = $_POST['ho_ten'] ?? '';
                $ngay_sinh = $_POST['ngay_sinh'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $dia_chi = $_POST['dia_chi'] ?? '';
                $email = $_POST['email'] ?? '';
                // $passwords = $_POST['password'] ?? '';
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
                $userOld = $this->modelTaiKhoan->getDetailTaiKhoan($id);
                $old_file = $userOld['anh_dai_dien'];

                $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
                // var_dump($ho_ten);
                // var_dump($ngay_sinh);
                // var_dump($gioi_tinh);
                // var_dump($dia_chi);
                // var_dump($email);
                // var_dump($so_dien_thoai);
                // // var_dump($anh_dai_dien);
                // die;
                $errors = [];

                if (isset($anh_dai_dien) && $anh_dai_dien['error'] == UPLOAD_ERR_OK) {
                    //upload ảnh mới lên
                    $new_file = uploadFile($anh_dai_dien, './uploads/');

                    if (!empty($old_file)) { //nếu có ảnh cũ thì xóa đi
                        deleteFile($old_file);
                    }
                } else {
                    $new_file = $old_file;
                }

                // var_dump($new_file);
                // die;
                if (empty($errors)) {
                    // $password = password_hash($passwords, PASSWORD_BCRYPT);
                    // die;
                    // var_dump($ho_ten);
                    // var_dump($ngay_sinh);
                    // var_dump($gioi_tinh);
                    // var_dump($dia_chi);
                    // var_dump($email);
                    // var_dump($so_dien_thoai);
                    // var_dump($new_file);
                    // var_dump($id);
                    // die;
                    $result = $this->modelTaiKhoan->updateCaNhanClient($ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $email, $so_dien_thoai, $id, $new_file, 1, 2);

                    if ($result) {
                        $_SESSION['user_client'] = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_client']['email']);
                        // var_dump($_SESSION['user_client']);
                        // die;
                        echo "<script>
                        alert('thay đổi thành công');
                        window.location.href = '" . BASE_URL . "?act=tai-khoan-client';
                        </script>";
                        exit();
                    } else {
                        echo "Lỗi: Dữ liệu không được thêm vào cơ sở dữ liệu.";
                        exit();
                    }
                } else {

                    $_SESSION['flash'] = true;
                    echo "<script>
                    alert('sửa thất bại');
                    window.location.href = '" . BASE_URL . "?act=tai-khoan-client';
                    </script>";
                }
            }
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL . "?act=login-client';
          </script>";
        }
    }
    public function deleteGioHang()
    {
        if (isset($_SESSION['user_client'])) {
            // var_dump($_SESSION['user_client']['id']);
            // die;
            $detailDH = $this->modelGioHang->getGioHangFromUser($_SESSION['user_client']['id']);
            $id = $_GET['san_pham_id'];
            // var_dump($id);
            // var_dump($detailDH);
            // die;
            $result = $this->modelGioHang->clearDetailGioHangBySpId($id, $detailDH['id']);
            if ($result) {
                echo "<script>
                alert('xóa giỏ hàng thành công');
                window.location.href = '" . BASE_URL . "?act=gio-hang';
                </script>";
            } else {
                echo "<script>
                alert('xóa giỏ hàng không thành công');
                window.location.href = '" . BASE_URL . "?act=gio-hang';
                </script>";
            }
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL . "?act=login-client';
          </script>";
        }
    }
}
