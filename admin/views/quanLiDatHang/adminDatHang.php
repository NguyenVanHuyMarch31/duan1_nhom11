<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="order-management">
                <h1>Quản Lý Đơn Hàng</h1>

                <!-- Bảng danh sách đơn hàng -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Khách Hàng</th>
                            <th>Ngày Đặt</th>
                            <th>Trạng Thái</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody id="order-list">
                        <?php foreach ($listOrders as $key => $order) {
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $order['full_name'] ?></td>
                                <td><?= $order['order_date'] ?></td>
                                <td>
                                    <span class="<?= $order['status'] == 'Đã xác nhận' ? 'status-confirmed' : ($order['status'] == 'Đã hủy' ? 'status-cancelled' : 'status-pending') ?>">
                                        <?= $order['status'] ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= BASE_URL_ADMIN . '?act=chiTietDonHang&id_order=' . $order['id_order'] ?>" class="btn btn-primary">Xem chi tiết</a>

                                        <!-- Confirm Order -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=xacNhanDonHang&id_order=' . $order['id_order'] ?>" class="btn btn-success">Xác nhận</a>
                                        <!-- Cancel Order -->
                                        <a href="<?= BASE_URL_ADMIN . '?act=huyDonHang&id_order=' . $order['id_order'] ?>" class="btn btn-danger">Hủy xác nhận</a>
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