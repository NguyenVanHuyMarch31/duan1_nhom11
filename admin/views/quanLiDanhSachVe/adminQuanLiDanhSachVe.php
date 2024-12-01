<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <h3>Quản lí danh sách vé</h3>
            
            <div class="ticket-management">


    <!-- Bảng danh sách vé -->
    <table class="table">
        <thead>
            <tr>
                <th>ID Vé</th>
                <th>Phim</th>
                <th>Suất Chiếu</th>
                <th>Ghế</th>
                <th>Giá</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody id="ticket-list">
            <?php foreach($listTickets as $key => $listTicket){ ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $listTicket['movie_name'] ?></td>
                        <td><?= $listTicket['start_time'] ?></td>
                        <td><?= $listTicket['seats'] ?></td>
                        <td><?= $listTicket['price'] ?></td>
                        <td>
                            <button class="edit-btn">Sửa</button>
                            <button class="delete-btn">Xóa</button>
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