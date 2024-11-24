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
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
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
            // var_dump($user);/
            require_once './views/QuanTri/taiKhoanCaNhan.php';
        } else {
            var_dump("chua dang nhap");
        }
    }
    public function formEditCaNhan()
    {
        $id = $_GET['id_quan_tri'];
        $user = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        // var_dump($user);
        // die;
        require_once './views/QuanTri/formEditCaNhan.php';
    }
}
