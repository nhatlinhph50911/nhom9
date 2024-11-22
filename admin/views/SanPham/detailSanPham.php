<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh sách sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img style="width: 400px; height: 400px;" src="<?php echo BASE_URL . $SanPham['hinh_anh']; ?>" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                                <div class="product-image-thumb <?php echo $anhSP[$key] == 0 ? 'active' : ''; ?>"><img src="<?php echo BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm: <?php echo $SanPham['ten_san_pham']; ?></h3>
                        <hr>
                        <h4 class="mt-3">Giá tiền: <small><?php echo $SanPham['gia_san_pham']; ?></small></h4>
                        <h4 class="mt-3">Giá khuyến mãi: <small><?php echo $SanPham['gia_khuyen_mai']; ?></small></h4>
                        <h4 class="mt-3">Số lượng: <small><?php echo $SanPham['so_luong']; ?></small></h4>
                        <h4 class="mt-3">Lượt xem: <small><?php echo $SanPham['luot_xem']; ?></small></h4>
                        <h4 class="mt-3">Ngày nhập: <small><?php echo $SanPham['ngay_nhap']; ?></small></h4>
                        <h4 class="mt-3">Danh mục: <small><?php echo $SanPham['ten_danh_muc']; ?></small></h4>
                        <h4 class="mt-3">Trạng thái: <small><?php echo $SanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán'; ?></small></h4>
                        <h4 class="mt-3">Mô tả: <small><?php echo $SanPham['mo_ta']; ?></small></h4>

                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="xtrue">Bình luận của sản phẩm</button>

                        </li>

                    </ul>
                    <div class="card-body col-12">
                        <table id="example1" class="table table-bordered table-striped col-12">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>tên người dùng</th>
                                    <th>nội dung</th>
                                    <th>ngày đăng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listCmt as $key => $Cmt) : ?>
                                    <tr>
                                        <td> <?php echo $key + 1; ?> </td>
                                        <td> <?php echo $Cmt['ho_ten']; ?> </td>
                                        <td> <?php echo $Cmt['noi_dung']; ?> </td>
                                        <td> <?php echo $Cmt['ngay_dang']; ?> </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo BASE_URL_ADMIN . '?act=xoa-comment&id_comment=' . $binh_luans['id']; ?>" onclick="return confirm('Bạn có đồng ý xóa hay không?')">
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
    $(function() {
        $(" #example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

</html>