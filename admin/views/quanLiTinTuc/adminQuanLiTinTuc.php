<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <h3>Quản lí tin tức</h3>
            <div class="card-header">
                <a href="<?php echo BASE_URL_ADMIN . '?act=themTinTuc' ?>">
                    <button class="btn btn-success">Thêm mới tin tức</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table" id="newsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày nhập</th>
                            <th>Tác giả</th>
                            <th style="width: 100px;">Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($newsList as $key => $newList) { ?>
                            <tr class="newsRow">
                                <td><?= $key + 1 ?></td>
                                <td><?= $newList['title'] ?></td>
                                <td><?= substr($newList['content'], 0, 100) ?>...</td>
                                <td><?= $newList['publish_date'] ?></td>
                                <td><?= $newList['author'] ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $newList["thumbnail"] ?>" style="width: 100px;" alt="Thumbnail"
                                        onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= BASE_URL_ADMIN . '?act=suaTinTuc&news_id=' . $newList['news_id'] ?>" class="btn btn-primary">Sửa</a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=deleteTinTuc&news_id=' . $newList['news_id'] ?>" onclick="return confirm('Bạn có muốn xóa tin tức này không?')" class="btn btn-warning">Xóa</a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=chiTietTinTuc&news_id=' . $newList['news_id'] ?>" class="btn btn-info">Chi Tiết</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Phân trang -->
                <nav class="paginationNav">
                    <ul class="pagination justify-content-center">
                        <!-- Nút phân trang sẽ được thêm vào đây qua JavaScript -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<?php require './views/layout/footer.php' ?>
