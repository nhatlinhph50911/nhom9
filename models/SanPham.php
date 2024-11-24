<?php
class SanPham
{
    public $conn; // khai báo phương thức

    public function __construct()
    {
        $this->conn = connectDB();
    }
    // viết hàm lấy toàn bộ sản phẩm
    public function getAllProduct()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
             WHERE san_phams.id = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getListCmtSp($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten,tai_khoans.anh_dai_dien FROM binh_luans INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id WHERE binh_luans.san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getSizeById($id)
    {
        try {
            $sql = "SELECT kich_cos.size
                FROM kich_co_san_phams
                INNER JOIN kich_cos ON kich_co_san_phams.kich_co_id = kich_cos.id
                WHERE kich_co_san_phams.san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id' => $id]);
            return $stmt->fetchAll(); // Lấy tất cả các dòng kết quả
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
