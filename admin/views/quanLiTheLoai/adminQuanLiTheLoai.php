<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <h3>Quản lí loại phim</h3>
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=themTheLoai' ?>">
                    <button class="btn btn-success">Thêm mới loại phim</button>
                </a>
            </div>

            <div class="card-body">
                <?php if (!empty($listGenreMovies) && is_array($listGenreMovies)) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên thể loại</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listGenreMovies as $key => $listGenreMovie) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $listGenreMovie['genre_name'] ?></td>
                                    <td><?= $listGenreMovie['description'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=suaTheLoai&genre_id=' . $listGenreMovie['genre_id'] ?>" class="btn btn-primary">Sửa</a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=deleteTheLoai&genre_id=' . $listGenreMovie['genre_id'] ?>" onclick="return confirm('Bạn có muốn xóa thể loại này không?')" class="btn btn-warning">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="text-center">Chưa có thể loại nào được thêm!</p>
                <?php } ?>
            </div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <?php require './views/layout/footer.php' ?>