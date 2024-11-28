<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm Phòng Chiếu</h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=postPhong'; ?>" method="post" class="form-horizontal">

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="room_name" class="form-control-label">Tên phòng chiếu</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="room_name" name="room_name" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="screen_type" class="form-control-label">Loại màn hình chiếu</label></div>
                                <div class="col-12 col-md-9">
                                    <select id="screen_type" name="screen_type" class="form-control" required>
                                        <option value="" disabled selected>Chọn loại màn hình chiếu</option>
                                        <option value="2D">Màn hình 2D</option>
                                        <option value="3D">Màn hình 3D</option>
                                        <option value="IMAX">Màn hình IMAX</option>
                                        <option value="4DX">Màn hình 4DX</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['screen_type'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['screen_type'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="seat_count" class="form-control-label">Số lượng ghế của phòng chiếu</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="seat_count" name="seat_count" placeholder="" min="10" max="50" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="status" class="form-control-label">Trạng thái của phòng chiếu</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="#" selected disabled>Vui lòng chọn trạng thái</option>
                                        <option value="Có sẵn">Có sẵn</option>
                                        <option value="Bảo trì">Bảo trì</option>
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
    <!-- .content -->