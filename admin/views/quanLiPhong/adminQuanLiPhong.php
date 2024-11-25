<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <h3>Quản lí phòng</h3>
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=themPhong' ?>">
                    <button class="btn btn-success">Thêm mới phòng</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên phòng chiếu</th>
                            <th>Số lượng ghế</th>
                            <th>Màn hình</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $key => $room) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $room['room_name'] ?></td>
                                <td><?= $room['seat_count'] ?></td>
                                <td><?= $room['screen'] ?></td>
                                <td><?= $room['status'] ?></td>

                                <td>
                                    <div class="btn-group">
                                        <a href="<?= BASE_URL_ADMIN . '?act=suaPhong&id_cinema_room=' . $room['id_cinema_room'] ?>" class="btn btn-primary">Sửa</a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=trangThaiPhong&id_cinema_room=' . $room['id_cinema_room'] ?>" onclick="return confirm('Bạn có muốn thay đổi trang thái này không?')" class="btn btn-warning">Thay đổi trạng thái</a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=xoaPhong&id_cinema_room=' . $room['id_cinema_room'] ?>" onclick="return confirm('Bạn có muốn xóa phòng này không?')" class="btn btn-danger">Xóa</a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=quanTriGhe&cinema_room_id=' . $room['cinema_room_id'] ?>" class="btn btn-secondary">Chi tiết phòng</a>
                            

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <h3>Quản lí loại ghế</h3>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên loại ghế</th>
                            <th>Giá ghế</th>
                            <th>Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($types as $key => $type) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $type['seat_type_name'] ?></td>
                                <td><?= $type['price'] ?></td>
                                <td><?= $type['description'] ?></td>


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