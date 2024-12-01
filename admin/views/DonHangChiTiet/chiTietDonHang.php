<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="container">
            <div class="header">
                <h1>Chi Tiết Đơn Hàng <?= $order_details[0]['id_ticket'] ?></h1>
                <p>Thông tin chi tiết về vé xem phim đã đặt</p>
            </div>

            <div class="details-section">
                <h3>Thông Tin Khách Hàng</h3>
                
                <p><strong>Tên Khách Hàng:</strong> <?= $order_details[0]['full_name'] ?></p>
                <p><strong>Số Điện Thoại:</strong> <?= $order_details[0]['phone'] ?></p>
                <p><strong>Email:</strong><?= $order_details[0]['email'] ?></p>
            </div>

            <div class="details-section">
                <h3>Thông Tin Vé Đặt</h3>
                <table class="details-table">
                    <thead>
                        <tr>
                            <th>Mã Vé</th>
                            <th>Phim</th>
                            <th>Suất Chiếu</th>
                            <!-- <th>Vị Trí Ghế</th> -->
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Tổng Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($order_details)) {
                            foreach ($order_details as $key => $details) {
                        ?>
                                <tr>
                                    <td>#00<?= $order_details[0]['id_ticket'] ?></td>
                                    <td><?= $details['movie_name'] ?></td>
                                    <td><?= $details['showtime'] ?></td>
                                    <!-- <td><?= $details['seat_names'] ?></td> -->
                                    <td><?= $details['total_quantity'] ?></td>
                                    <td><?= $details['price'] ?></td>
                                    <td><?= $details['total_price'] ?>VND</td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='4'>No order details found.</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="total-price">
                <p><strong>Tổng Giá Trị Đơn Hàng:</strong> <?= $details['total_price'] ?> VND</p>
            </div>

            <div>
                <a href="#" class="btn btn-print">In Vé</a>
                <a href="#" class="btn btn-danger">Hủy Đơn Hàng</a>
            </div>

            <a href="quanLyDonHang.html" class="back-link">Quay lại danh sách đơn hàng</a>
        </div>

    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
<?php require './views/layout/footer.php' ?>