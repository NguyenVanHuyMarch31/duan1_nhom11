<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>

    <div class="animated fadeIn">
        <h3 style="text-align: center;">Quản lý suất chiếu</h3>

        <!-- Giao diện thêm suất chiếu -->
        <div class="container">
            <div class="form-container">
                <form action="<?php echo BASE_URL_ADMIN . '?act=postSuatChieu'; ?>" method="post" class="form-horizontal">
                    <!-- Tên phim -->
                    <div class="form-group">
                        <label for="movie_id">Tên Phim</label>
                        <select id="movie_id" name="movie_id" required>
                            <option value="">-- Chọn phim --</option>
                            <?php foreach ($movies as $movie): ?>
                                <option value="<?= $movie['movie_id'] ?>"><?= $movie['movie_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Phòng chiếu -->
                    <div class="form-group">
                        <label for="id_cinema_room">Phòng Chiếu</label>
                        <select id="id_cinema_room" name="id_cinema_room" required>
                            <option value="">-- Chọn phòng chiếu --</option>
                            <?php foreach ($cinema_rooms as $room): ?>
                                <option value="<?= $room['id_cinema_room'] ?>"><?= $room['room_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Thời Gian Chiếu</label>
                        <input type="datetime-local" id="start_time" name="start_time" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="end_time">Thời Gian Kết Thúc</label>
                        <input type="datetime-local" id="end_time" name="end_time" readonly>
                    </div> -->

                    <div class="form-group">
                        <label for="status">Trạng Thái</label>
                        <select id="status" name="status" required>
                            <option value="Sắp chiếu">Sắp chiếu</option>
                            <option value="Đang chiếu">Đang chiếu</option>
                            <option value="Đã kết thúc">Đã kết thúc</option>
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
        <!-- Kết thúc giao diện thêm suất chiếu -->

    </div>
</div>
<!-- .animated -->
</div>
<!-- /.content -->

<?php require './views/layout/footer.php'; ?>