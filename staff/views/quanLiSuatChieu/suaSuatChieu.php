<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>

    <div class="animated fadeIn">
        <!-- Thông báo -->
        <div id="alertMessage" class="alert alert-success" style="display: none; margin-top: 15px;">
            Cập nhật suất chiếu thành công!
        </div>

        <!-- Form Quản lý sửa suất chiếu -->
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <strong>Sửa Suất Chiếu </strong>
                </div>
                <div class="card-body">
                <form action="<?php echo BASE_URL_ADMIN . '?act=editSuatChieu'; ?>" method="post">
                    <input type="hidden" name="showtime_id" value="<?= $showtime['showtime_id'] ?>">

                    <div class="form-group">
                        <label for="movie_id">Tên Phim</label>
                        <select id="movie_id" name="movie_id" required>
                            <?php foreach ($movies as $movie): ?>
                                <option value="<?= $movie['movie_id'] ?>" <?= $movie['movie_id'] == $showtime['movie_id'] ? 'selected' : '' ?>>
                                    <?= $movie['movie_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_cinema_room">Phòng Chiếu</label>
                        <select id="id_cinema_room" name="id_cinema_room" required>
                            <?php foreach ($cinema_rooms as $room): ?>
                                <option value="<?= $room['id_cinema_room'] ?>" <?= $room['id_cinema_room'] == $showtime['id_cinema_room'] ? 'selected' : '' ?>>
                                    <?= $room['room_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_time">Thời Gian Chiếu</label>
                        <input type="datetime-local" id="start_time" name="start_time" value="<?= date('Y-m-d\TH:i', strtotime($showtime['start_time'])) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Trạng Thái</label>
                        <select id="status" name="status" required>
                            <option value="Sắp chiếu" <?= $showtime['status'] == 'Sắp chiếu' ? 'selected' : '' ?>>Sắp chiếu</option>
                            <option value="Đang chiếu" <?= $showtime['status'] == 'Đang chiếu' ? 'selected' : '' ?>>Đang chiếu</option>
                            <option value="Đã kết thúc" <?= $showtime['status'] == 'Đã kết thúc' ? 'selected' : '' ?>>Đã kết thúc</option>
                        </select>
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
    <!-- .animated -->
</div>
<!-- /.content -->

<?php require './views/layout/footer.php'; ?>

<script>
    // Xử lý form submit
    document.getElementById('showtimeForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Ngăn chặn hành động submit mặc định

        // Hiển thị thông báo thành công
        const alertMessage = document.getElementById('alertMessage');
        alertMessage.style.display = 'block';

        // Tự động ẩn thông báo sau 3 giây
        setTimeout(function() {
            alertMessage.style.display = 'none';
        }, 3000);

        // Xử lý dữ liệu tại đây, ví dụ như gửi dữ liệu qua AJAX nếu cần
    });
</script>