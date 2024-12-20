<?php
class AdminDanhMucController
{
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new adminDanhMuc();
    }
    public function DanhSachDanhMuc()
    {
        if (isset($_SESSION['user_admin'])) {
            $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
            require_once './views/DanhMuc/listDanhMuc.php';
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL_ADMIN . "?act=login-admin';
          </script>";
        }
    }

    public function FormAddDanhMuc()
    {
        if (isset($_SESSION['user_admin'])) {
            require_once './views/DanhMuc/addDanhMuc.php';
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL_ADMIN . "?act=login-admin';
          </script>";
        }
    }
    public function PostAddDanhMuc()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'tên danh mục không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                unset($_SESSION['error']);
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                require_once './views/DanhMuc/addDanhMuc.php';
            }
        }
    }
    public function FormEditDanhMuc()
    {
        if (isset($_SESSION['user_admin'])) {
            $id = $_GET['id_danh_muc'];
            $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
            if ($danhMuc) {
                require_once './views/DanhMuc/editDanhMuc.php';
            } else {
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL_ADMIN . "?act=login-admin';
          </script>";
        }
    }
    public function PostEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $id = $_POST['id'];

            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'tên danh mục không được để trống';
            }
            if (empty($errors)) {
                unset($_SESSION['error']);

                $this->modelDanhMuc->updateDanhMuc($ten_danh_muc, $mo_ta, $id);
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/DanhMuc/editDanhMuc.php';
            }
        }
    }
    public function deleteDanhMuc()
    {
        if (isset($_SESSION['user_admin'])) {
            $id = $_GET['id_danh_muc'];
            $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
            if ($danhMuc) {
                $this->modelDanhMuc->destroyDanhMuc($id);
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
            } else {
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }
        } else {
            echo "<script>
            alert('bạn chưa đăng nhập');
            window.location.href = '" . BASE_URL_ADMIN . "?act=login-admin';
          </script>";
        }
    }
}
