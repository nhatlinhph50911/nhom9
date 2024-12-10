<!-- header -->
<?php require_once 'layout/header.php'; ?>
<!-- end header -->
<!-- menu -->
<?php require_once 'layout/navbar.php'; ?>
<!-- end menu -->

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">my-account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">

                                        <a href="#account-info" class="active" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                            Details</a>
                                        <a href="<?= BASE_URL . '?act=logout-client' ?>"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Account Details</h5>
                                                <div class="account-details-form">
                                                    <form action="<?= BASE_URL . '?act=edit-client' ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="ho_ten" class="required">Họ tên</label>
                                                                    <input type="text" id="ho_ten" placeholder="First Name" value="<?= $_SESSION['user_client']['ho_ten'] ?>" name="ho_ten" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="anh_dai_dien" class="required">ảnh đại diện</label>
                                                                    <input type="file" class="form-control" name="anh_dai_dien" value="<?php echo $_SESSION['user_client']['anh_dai_dien']; ?>" placeholder="nhap hình ảnh đại diện">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="ngay_sinh" class="required">ngày sinh</label>
                                                                    <input type="date" id="ngay_sinh" placeholder="First Name" value="<?= $_SESSION['user_client']['ngay_sinh'] ?>" name="ngay_sinh" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="dia_chi" class="required">địa chỉ</label>
                                                                    <input type="text" id="dia_chi" placeholder="Last Name" value="<?= $_SESSION['user_client']['dia_chi'] ?>" name="dia_chi" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="so_dien_thoai" class="required">số điện thoại</label>
                                                                    <input type="text" id="so_dien_thoai" placeholder="First Name" value="<?= $_SESSION['user_client']['so_dien_thoai'] ?>" name="so_dien_thoai" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="gioi_tinh" class="required">giới tính</label>
                                                                    <select id="gioi_tinh" name="gioi_tinh" class="form-control custom-select">
                                                                        <option <?php echo $_SESSION['user_client']['gioi_tinh'] == 1 ? 'selected' : ''; ?> value="1">Nam</option>
                                                                        <option <?php echo $_SESSION['user_client']['gioi_tinh'] == 2 ? 'selected' : ''; ?> value="2">Nữ</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">email</label>
                                                                <input type="email" id="email" placeholder="Last Name" value="<?= $_SESSION['user_client']['email'] ?>" name="email" required />
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button type="submit" class="btn btn-sqr">Thay Đổi</button>
                                                        </div>
                                                    </form>

                                                    <form action="<?= BASE_URL . '?act=update-password' ?>" method="POST" enctype="multipart/form-data">
                                                        <fieldset>
                                                            <legend>Thay đổi mật khẩu</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pass" class="required">mật khẩu hiện tại</label>
                                                                <input type="password" name="current-pass" id="current-pass" placeholder="nhập mật khẩu hiện tại" />
                                                                <?php if (isset($_SESSION['error_verify'])) { ?>
                                                                    <p class="text-danger login-box-msg"><?= $_SESSION['error_verify'] ?></p>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pass" class="required">mật khẩu mới</label>
                                                                        <input type="password" name="new-pass" id="new-pass" placeholder="nhập mật khẩu mới" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pass" class="required">xác nhận mật khẩu mới</label>
                                                                        <input type="password" name="confirm-pass" id="confirm-pass" placeholder="nhập lại mật khẩu mới" />
                                                                    </div>
                                                                </div>
                                                                <?php if (isset($_SESSION['error_confirm'])) { ?>
                                                                    <p class="text-danger login-box-msg"><?= $_SESSION['error_confirm'] ?></p>
                                                                <?php } ?>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="btn btn-sqr">Thay Đổi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
</main>

<?php require_once 'layout/footer.php'; ?>