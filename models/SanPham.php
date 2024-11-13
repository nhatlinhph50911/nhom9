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
            $sql = 'SELECT*FROM san_phams';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
}
