<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa Phòng</h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=editPhong'; ?>" method="post" class="form-horizontal">
                            <input type="hidden" name="id_cinema_room" value="<?= $room['id_cinema_room'] ?>">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="room_name" class="form-control-label">Tên phòng chiếu</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="room_name" name="room_name" placeholder="]" class="form-control" value="<?= $room['room_name'] ?>">
                                    <?php if (isset($_SESSION['error']['room_name'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['room_name'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="screen" class="form-control-label">Loại màn hình chiếu</label></div>
                                <div class="col-12 col-md-9">
                                    <select id="screen" name="screen" class="form-control">
                                        <option value="" disabled selected>Chọn loại màn hình chiếu</option>
                                        <option value="2D" <?= ($room['screen'] == '2D') ? 'selected' : '' ?>>Màn hình 2D</option>
                                        <option value="3D" <?= ($room['screen'] == '3D') ? 'selected' : '' ?>>Màn hình 3D</option>
                                        <option value="IMAX" <?= ($room['screen'] == 'IMAX') ? 'selected' : '' ?>>Màn hình IMAX</option>
                                        <option value="4DX" <?= ($room['screen'] == '4DX') ? 'selected' : '' ?>>Màn hình 4DX</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['screen'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['screen'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="seat_count" class="form-control-label">Số lượng ghế</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="seat_count" name="seat_count" placeholder="BeeFilmHub Team" class="form-control" value="<?= $room['seat_count'] ?>" readonly>
                                    <?php if (isset($_SESSION['error']['seat_count'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['seat_count'] ?></p>
                                    <?php endif; ?>
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
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="error-messages">
                                <?php foreach ($_SESSION['error'] as $message): ?>
                                    <p><?= $message ?></p>
                                <?php endforeach; ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require './views/layout/footer.php' ?>
    </body>

    </html>