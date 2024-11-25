<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <div class="animated fadeIn">
        <h3>Quản lý suất chiếu</h3>
        <div class="card-header">
    <a href="<?= BASE_URL_ADMIN . '?act=themSuatChieu' ?>">
        <button class="btn btn-success">Thêm mới suất chiếu</button>
    </a>
    <form method="GET" style="display: inline-block; margin-left: 20px;">
        <input type="hidden" name="act" value="quanTriSuatChieu">
        <input type="text" name="search" placeholder="Tìm kiếm suất chiếu..." 
               value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
    </form>
</div>

<div class="card-body">
    <?php
    $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

    if (!empty($searchTerm)) {
        $listShowtimes = array_filter($listShowtimes, function ($showtime) use ($searchTerm) {
            return stripos($showtime['movie_name'], $searchTerm) !== false 
                || stripos($showtime['room_name'], $searchTerm) !== false;
        });
    }
    ?>

    <?php if (!empty($searchTerm)): ?>
        <p class="text-center">
            Kết quả tìm kiếm cho: <strong><?= $searchTerm ?></strong>
        </p>
        <?php if (empty($listShowtimes)): ?>
            <p class="text-center text-danger">Không tìm thấy suất chiếu nào phù hợp!</p>
        <?php endif; ?>
    <?php endif; ?>

        <table class="table table-striped" id="showtimesTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Phim</th>
                    <th>Phòng Chiếu</th>
                    <th>Thời Gian Bắt Đầu</th>
                    <th>Thời Gian Kết Thúc</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listShowtimes as $key => $showtime) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $showtime['movie_name'] ?></td>
                        <td><?= $showtime['room_name'] ?></td>
                        <td><?= $showtime['start_time'] ?></td>
                        <td><?= $showtime['end_time'] ?></td>
                        <td><?= $showtime['status'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= BASE_URL_ADMIN . '?act=suaSuatChieu&showtime_id=' . $showtime['showtime_id'] ?>" class="btn btn-primary">Sửa</a>
                                <a href="<?= BASE_URL_ADMIN . '?act=deleteSuatChieu&showtime_id=' . $showtime['showtime_id'] ?>" 
                                   onclick="return confirm('Bạn có muốn xóa suất chiếu này không?')" 
                                   class="btn btn-warning">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        

</div>
    </div>
</div>
<!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>

<?php require './views/layout/footer.php' ?>