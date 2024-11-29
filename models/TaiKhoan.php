<?php
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTaiKhoan($chuc_vu_id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id= :chuc_vu_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function checkLogin($email, $password)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "tài khoản bị cấm";
                    }
                } else {
                    return "tài khoản không có quyền đăng nhập";
                }
            } else {
                return "tài khoản hoặc mật khẩu sai";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getTaiKhoanEmail($email)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function addUser($ho_ten, $email, $mat_khau, $chuc_vu_id)
    {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function addCmt($san_pham_id, $tai_khoan_id, $noi_dung_cmt, $ngay_dang)
    {
        try {
            $sql = "INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang) VALUES (:san_pham_id, :tai_khoan_id, :noi_dung_cmt, :ngay_dang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':noi_dung_cmt' => $noi_dung_cmt,
                ':ngay_dang' => $ngay_dang
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateCaNhanClient($ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $email, $so_dien_thoai, $id, $new_file, $trang_thai, $chuc_vu_id)
    {
        try {
            $sql = "UPDATE tai_khoans SET
                ho_ten = :ho_ten,
                ngay_sinh = :ngay_sinh,
                gioi_tinh = :gioi_tinh,
                dia_chi = :dia_chi,
                email = :email,
                so_dien_thoai = :so_dien_thoai,
                anh_dai_dien = :anh_dai_dien,
                trang_thai = :trang_thai,
                chuc_vu_id = :chuc_vu_id
                WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':ngay_sinh' => $ngay_sinh,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':anh_dai_dien' => $new_file,
                ':trang_thai' => $trang_thai,
                ':chuc_vu_id' => $chuc_vu_id,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
