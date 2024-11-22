<?php

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/home.php';
    }

    public function danhSachSanpham()
    {
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);
        // die();
        require_once './views/listProduct.php';
    }
}
