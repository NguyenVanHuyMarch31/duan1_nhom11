<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>

    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <h3>Quản lý Tài khoản</h3>
            <div class="card-header">
                <a href="<?php echo BASE_URL_ADMIN . '?act=themTaiKhoan'; ?>">
                    <button class="btn btn-success">Thêm mới tài khoản</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th >Tên tài khoản</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Họ và tên</th>
                            <th style="text-align: center;">Hình ảnh</th>
                            <th style="text-align: center;">Vai trò</th>
                            <th style="text-align: center;">Trạng thái</th>
                            <th style="text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accountList as $key => $account) { ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $account['username']; ?></td>
                                <td><?= $account['email']; ?></td>
                                <td><?= $account['full_name']; ?></td>
                                <td>
                                    <img class="rounded-circle" src="<?= BASE_URL . $account['thumbnail']; ?>" style="width: 50px; height: 50px;" alt="Avatar"
                                        onerror="this.onerror=null; this.src='https://i.pinimg.com/control2/236x/e7/a5/53/e7a5532bb5721fcd7062382188221de3.jpg' ">
                                </td>
                                <td><?= $account['role_names'] ?: 'Chưa có vai trò'; ?></td> <!-- Hiển thị vai trò -->
                                <td><?= $account['status'] == 1 ? 'Kích hoạt' : 'Vô hiệu hóa'; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <!-- Chi tiết -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=chiTietTaiKhoan&id=' . $account['id_account']; ?>" class="btn btn-info btn-sm" title="Chi tiết">
                                            <i class="fa fa-info-circle"></i>
                                        </a>

                                        <!-- Sửa -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=suaTaiKhoan&id=' . $account['id_account']; ?>" class="btn btn-primary btn-sm" title="Sửa">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Xóa -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=xoaTaiKhoan&id=' . $account['id_account']; ?>" onclick="return confirm('Bạn có muốn xóa tài khoản này không?');" class="btn btn-danger btn-sm" title="Xóa">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <!-- Vô hiệu hóa / Kích hoạt -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=doiTrangThai&id=' . $account['id_account']; ?>" class="btn btn-warning btn-sm" title="<?= $account['status'] == 1 ? 'Vô hiệu hóa' : 'Kích hoạt'; ?>">
                                            <i class="fa <?= $account['status'] == 1 ? 'fa-lock' : 'fa-unlock'; ?>"></i>
                                        </a>


                                        <!-- Phân quyền -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=phanQuyen&id=' . $account['id_account']; ?>" class="btn btn-secondary btn-sm" title="Phân quyền">
                                            <i class="fa fa-android"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php if (empty($accountList)): ?>
                                <tr>
                                    <td colspan="9">Không có tài khoản nào.</td>
                                </tr>
                            <?php else: ?>
                                <!-- Hiển thị danh sách tài khoản -->
                            <?php endif; ?>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <?php require './views/layout/footer.php'; ?>
</div>
<!-- /#right-panel -->