<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <h1>Quản lý tài khoản - <?= $account['full_name'] ?></h1>
                <hr>
                <div class="container">
                    <div class="account-detail">
                        <p><strong>ID Tài khoản:</strong> <?= $account['id_account'] ?></p>
                        <p><strong>Tên đăng nhập:</strong> <?= $account['username'] ?></p>
                        <p><strong>Email:</strong> <?= $account['email'] ?></p>
                        <p><strong>Ngày sinh:</strong> <?= $account['birth_date'] ?></p>
                        <p><strong>Giới tính:</strong> <?= $account['gender'] ?></p>
                        <p><strong>Địa chỉ:</strong> <?= $account['address'] ?></p>
                        <p><strong>Trạng thái:</strong> <?= $account['status'] == '1' ? 'Hoạt động' : 'Khóa' ?></p>
                        
                        <figure>
                            <img src="<?= BASE_URL . $account['thumbnail'] ?>"
                                 style="width: 150px; height: 150px; border-radius: 50%;"
                                 alt="<?= $account['username'] ?? 'Ảnh đại diện' ?>"
                                 onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'">
                        </figure>

                        <h4>Vai trò:</h4>
                        <?php if (!empty($account['role_names'])): ?>
                            <?php
                                // Split the role names if there are multiple roles
                                $roles = explode(',', $account['role_names']);
                                foreach ($roles as $role):
                            ?>
                                <span class="badge badge-info"><?= $role ?></span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span>Không có vai trò</span>
                        <?php endif; ?>

                        
                    </div>
                    <a href="<?= BASE_URL_ADMIN . '?act=quanTriTaiKhoan'; ?>" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>BEEFILMHUB</h4>
                        <p>Cổng thông tin giải trí phim và trải nghiệm điện ảnh tốt nhất.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>&copy; 2024 BEEFILMHUB</p>
                        <p>Thiết kế bởi <a href="https://yourwebsite.com">Nhóm 11 - BFH</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /#right-panel -->
</body>
</html>
