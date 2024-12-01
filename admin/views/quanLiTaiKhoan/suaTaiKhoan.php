<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">

            <div class="container mt-5">
                <h2 class="text-center mb-4">Sửa Thông Tin Tài Khoản</h2>

                <?php if (isset($account)): ?>
                    <form action="<?= BASE_URL_ADMIN . '?act=postEditTaiKhoan' ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_account" value="<?= $account['id_account'] ?>">

                        <div class="form-group">
                            <label for="username">Tên Đăng Nhập</label>
                            <input type="text" id="username" name="username" value="<?= $account['username'] ?>" required readonly>
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?= $account['email'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="full_name">Họ và Tên</label>
                            <input type="text" id="full_name" name="full_name" value="<?= $account['full_name'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="birth_date">Ngày Sinh</label>
                            <input type="date" id="birth_date" name="birth_date" value="<?= $account['birth_date'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Giới Tính</label>
                            <select id="gender" name="gender" required>
                                <option value="Nam" <?= $account['gender'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                                <option value="Nữ" <?= $account['gender'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                                <option value="Khác" <?= $account['gender'] == 'Khác' ? 'selected' : '' ?>>Khác</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Ảnh Đại Diện</label>
                            <input type="file" id="thumbnail" name="thumbnail">
                            <img id="imgPreview" src="<?= $account['thumbnail'] ?>" alt="Thumbnail" style="max-width: 100px; height: auto; display: none;">
                        </div>

                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" id="address" name="address" value="<?= $account['address'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="text" id="phone" name="phone" value="<?= $account['phone'] ?>" required>
                        </div>


                        <button type="submit" class="btn btn-warning">Cập Nhật Thông Tin</button>
                    </form>
                <?php else: ?>
                    <p>Không tìm thấy tài khoản.</p>
                <?php endif; ?>

            </div>

        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (for Bootstrap components like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Script -->
    <script>
        document.getElementById('thumbnail').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgPreview = document.getElementById('imgPreview');
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block'; // Show the image preview
            };

            if (file) {
                reader.readAsDataURL(file); // Convert file to base64
            }
        });
    </script>