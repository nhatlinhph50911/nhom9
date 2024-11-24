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
}
