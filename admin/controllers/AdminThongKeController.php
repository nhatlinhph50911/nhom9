<?php
class AdminThongKeController
{
    public $modelTaiKhoan;
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelDonHang = new AdminDonHang();
    }
    public function dashboard()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        $listCmt = $this->modelSanPham->getAllCmt();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan(2);
        $listSP = $this->modelSanPham->getAllSanPhamConBan(1);
        $listDetailDH = $this->modelDonHang->getAllDetailDH();
        // var_dump($listDetailDH);
        // die;
        $grouped_products = [];

        foreach ($listDetailDH as $item) {
            $san_pham_id = $item["san_pham_id"];
            if (!isset($grouped_products[$san_pham_id])) {
                $grouped_products[$san_pham_id] = [
                    "san_pham_id" => $san_pham_id,
                    "tong_so_luong" => 0,
                    "ten_san_pham" => $item["ten_san_pham"],
                    "hinh_anh" => $item["hinh_anh"],
                    "gia_san_pham" => $item["gia_san_pham"],
                ];
            }
            $grouped_products[$san_pham_id]["tong_so_luong"] += $item["so_luong"];
        }

        // Sắp xếp theo tong_so_luong giảm dần
        usort($grouped_products, function ($a, $b) {
            return $b["tong_so_luong"] - $a["tong_so_luong"];
        });

        // Lấy top 5 sản phẩm
        $top_5_products = array_slice($grouped_products, 0, 5);

        // Kết quả
        // echo "Top 5 sản phẩm bán chạy nhất:\n";
        // print_r($top_5_products);
        // die;
        // var_dump($listDetailDH);
        // var_dump($listDonHang['san_pham_id']);
        // die;
        require_once "./views/home.php";
    }
}
