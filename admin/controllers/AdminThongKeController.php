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
        if (isset($_SESSION['user_admin'])) {
            // Lấy dữ liệu từ các model
            $listDonHang = $this->modelDonHang->getAllDonHang();
            $listCmt = $this->modelSanPham->getAllCmt();
            $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan(2);
            $listSP = $this->modelSanPham->getAllSanPhamConBan(1);
            $listDetailDH = $this->modelDonHang->getAllDetailDH();
            // $listBlazer = $this->modelDonHang->getDonHangId(2);
            // var_dump($listBlazer);
            // die;

            // Kiểm tra nếu $listDetailDH có dữ liệu
            if (!$listDetailDH) {
                echo "Không có dữ liệu chi tiết đơn hàng.";
                return;
            }

            // Tạo mảng nhóm sản phẩm theo san_pham_id
            $grouped_products = [];

            foreach ($listDetailDH as $item) {

                if ($item['trang_thai_id'] > 2 && $item['trang_thai_id'] != 6 && $item['trang_thai_id'] != 7) {
                    $san_pham_id = $item["san_pham_id"];
                    if (!isset($grouped_products[$san_pham_id])) {
                        // var_dump($item['trang_thai_id']);
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
                // Cộng dồn số lượng cho từng sản phẩm

            }
            // var_dump($grouped_products);
            // die;
            // Kiểm tra nếu không có sản phẩm hợp lệ
            if (empty($grouped_products)) {
                echo "Không có sản phẩm nào thỏa mãn điều kiện.";
                return;
            }

            // Sắp xếp theo tong_so_luong giảm dần
            uasort($grouped_products, function ($a, $b) {
                return $b["tong_so_luong"] - $a["tong_so_luong"];
            });

            // Lấy top 5 sản phẩm
            $top_5_products = array_slice($grouped_products, 0, 5);

            // Truyền dữ liệu vào view
            require_once "./views/home.php";
        } else {
            echo "<script>
        alert('Bạn chưa đăng nhập');
        window.location.href = '" . BASE_URL_ADMIN . "?act=login-admin';
        </script>";
        }
    }
}
