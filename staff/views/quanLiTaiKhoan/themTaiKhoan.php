<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card-header">
                    <h3>Thêm Tài Khoản Mới</h3>
                </div>
                <!-- New Account Form -->
                <div class="card-body">

                    <form action="<?= BASE_URL_ADMIN . '?act=themTaiKhoan'; ?>" method="POST">
                        <!-- Username -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="username" class="form-control-label">Tên Đăng Nhập</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" class="form-control" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email" class="form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email" name="email" placeholder="Nhập email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="role" class="form-control-label">Vai Trò</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select id="role" name="role_id" class="form-control" required>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= $role['id_role']; ?>"><?= $role['role_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="status" class="form-control-label">Trạng Thái</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="1">Kích Hoạt</option>
                                    <option value="0">Vô Hiệu Hóa</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './views/layout/footer.php'; ?>