<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <h3>Quản lí danh sách vé</h3>
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=themTheLoai' ?>">
                    <button class="btn btn-success">Thêm mới vé</button>
                </a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Phim</th>
                            <th>Lịch Chiếu</th>
                            <th>Giá Vé</th>
                            <th>Số lượng ghế đã đặt</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php foreach ($ticket as $key => $tickets) { ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= htmlspecialchars($tickets['movie_name']) ?></td>
            <td><?= htmlspecialchars($tickets['start_time']) ?> - <?= htmlspecialchars($tickets['end_time']) ?></td>
            <td><?= $tickets['ticket_price'] ?> VND</td>
            <td><?= htmlspecialchars($tickets['reserved_seats']) ?>/<?= htmlspecialchars($tickets['total_seats']) ?> (<?= htmlspecialchars($tickets['room_name']) ?>)</td>
            <td>
                <div class="btn-group">
                    <a href="<?= BASE_URL_ADMIN . '?act=suaVe&id_ticket=' . htmlspecialchars($tickets['id_ticket']) ?>" class="btn btn-primary" title="Sửa">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="<?= BASE_URL_ADMIN . '?act=deleteve&id_ticket=' . htmlspecialchars($tickets['id_ticket']) ?>" onclick="return confirm('Bạn có muốn xóa vé này không?')" class="btn btn-danger" title="Xóa">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>

                </table>

            </div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <?php require './views/layout/footer.php' ?>