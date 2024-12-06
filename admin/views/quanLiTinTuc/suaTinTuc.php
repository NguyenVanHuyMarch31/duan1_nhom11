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
                        <h3>Sửa Tin Tức</h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=editTintuc'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="news_id" value="<?= $news['news_id'] ?>">
                            <!-- Title -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="title" class="form-control-label">Tiêu đề</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" placeholder="Viết tiêu đề vào đây" class="form-control" value="<?= $news['title'] ?>">
                                    <?php if (isset($_SESSION['error']['title'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['title'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Author -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="author" class="form-control-label">Tác giả</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="author" name="author" placeholder="BeeFilmHub Team" class="form-control" value="<?= $news['author'] ?>">
                                    <?php if (isset($_SESSION['error']['author'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['author'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Publish Date -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="publish_date" class="form-control-label">Ngày nhập</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="publish_date" name="publish_date" class="form-control" value="<?= $news['publish_date'] ?>">
                                    <?php if (isset($_SESSION['error']['ngay_nhap'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Thumbnail -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="thumbnail" class="form-control-label">Hình ảnh</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file">
                                    <?php if (isset($_SESSION['error']['thumbnail'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['thumbnail'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="content" class="form-control-label">Nội dung</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="content" id="content" rows="9" placeholder="Nội dung ..." class="form-control"><?= $news['content'] ?></textarea>
                                    <?php if (isset($_SESSION['error']['content'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['content'] ?></p>
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


    <!-- /#right-panel -->

    <!-- t> -->

    </body>

    </html>