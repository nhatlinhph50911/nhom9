<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    public function listQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/QuanTri/listQuanTri.php';
    }
    public function formAddQuanTri()
    {
        require_once './views/QuanTri/AddQuanTri.php';
    }
    public function PostAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $chuc_vu_id = 1;
                $password = password_hash('24092005', PASSWORD_BCRYPT);
                $result = $this->modelTaiKhoan->insertQuanTri($ho_ten, $email, $password, $chuc_vu_id);

                if ($result) {
                    header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                    exit();
                } else {
                    echo "Lỗi: Dữ liệu không được thêm vào cơ sở dữ liệu.";
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
            }
        }
    }
    public function formEditQuanTri()
    {
        $id = $_GET['id_quan_tri'];
        $TkQuanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        // var_dump($TkQuanTri);
        // die;
        require_once './views/QuanTri/EditQuanTri.php';
        deleteSessionError();
    }
    public function PostEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_quan_tri'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'số điện thoại không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $result = $this->modelTaiKhoan->updateQuanTri($ho_ten, $email, $so_dien_thoai, $password, $trang_thai, $id);

                if ($result) {
                    header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                    exit();
                } else {
                    echo "Lỗi: Dữ liệu không được thêm vào cơ sở dữ liệu.";
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $id);
            }
        }
    }
    public function listKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/KhachHang/listKhachHang.php';
    }
    public function formEditKhachHang()
    {
        $id = $_GET['id_quan_tri'];
        $TkKhachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        require_once './views/KhachHang/EditKhachHang.php';
        deleteSessionError();
    }
    public function PostEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_quan_tri'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'số điện thoại không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $result = $this->modelTaiKhoan->updateKhachHang($ho_ten, $email, $so_dien_thoai, $password, $trang_thai, $id);

                if ($result) {
                    header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                    exit();
                } else {
                    echo "Lỗi: Dữ liệu không được thêm vào cơ sở dữ liệu.";
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_quan_tri=' . $id);
            }
        }
    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $_SESSION['error'] = '';
            // var_dump($password);
            // die;

            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($user);
            // var_dump($email);
            // var_dump($password);
            // die;
            if ($user == $email) {
                // lưu thông tin vào session
                $_SESSION['user_admin'] = $user;
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);
                // die;
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function resetPassword()
    {
        $id = $_GET['id_quan_tri'];
        // var_dump($id);
        // die();
        // $TkKhachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        $password = password_hash('24092005', PASSWORD_BCRYPT);
        // var_dump($password);
        // die;
        $this->modelTaiKhoan->resetPassword($id, $password);
        header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
    }
    public function inforCaNhan()
    {
        if (isset($_SESSION['user_admin'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanEmail($_SESSION['user_admin']);
            // var_dump($user);
            // die;
            require_once './views/QuanTri/taiKhoanCaNhan.php';
        } else {
            header("location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }
    public function formEditCaNhan()
    {
        $id = $_GET['id_ca_nhan'];
        $user = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        // var_dump($user);
        // die;
        require_once './views/QuanTri/formEditCaNhan.php';
    }
    public function logoutAdmin()
    {
        if (isset($_SESSION['user_admin'])) {
            session_destroy();

            // var_dump($_SESSION['user_client']);
            // var_dump("null");
            // die;
            header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
        }
    }
    public function postEditCaNhan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_ca_nhan'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $email = $_POST['email'] ?? '';
            $passwords = $_POST['password'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $userOld = $this->modelTaiKhoan->getDetailTaiKhoan($id);
            $old_file = $userOld['anh_dai_dien'];
            // var_dump($userOld);
            // die;
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'ngày sinh không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'giới tính không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'địa chỉ không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'số điện thoại không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (isset($anh_dai_dien) && $anh_dai_dien['error'] == UPLOAD_ERR_OK) {
                //upload ảnh mới lên
                $new_file = uploadFile($anh_dai_dien, './uploads/');

                if (!empty($old_file)) { //nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($errors)) {
                $password = password_hash($passwords, PASSWORD_BCRYPT);
                // die;
                $result = $this->modelTaiKhoan->updateCaNhan($ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $email, $so_dien_thoai, $password, $trang_thai, $id, $new_file);

                if ($result) {
                    header("location: " . BASE_URL_ADMIN . '?act=tai-khoan-ca-nhan');
                    exit();
                } else {
                    echo "Lỗi: Dữ liệu không được thêm vào cơ sở dữ liệu.";
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-ca-nhan&id_ca_nhan=' . $id);
            }
        }
    }
}
