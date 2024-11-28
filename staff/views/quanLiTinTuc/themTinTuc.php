<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm Tin Tức</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=postTinTuc'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="title" class="form-control-label">Tiêu đề</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" placeholder="Viết tiêu đề vào đây" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="author" class="form-control-label">Tác giả</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="author" name="author" placeholder="BeeFilmHub Team" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="publish_date" class="form-control-label">Ngày nhập</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="publish_date" name="publish_date" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="thumbnail" class="form-control-label">Hình ảnh</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="content" class="form-control-label">Nội dung</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="content" id="content" rows="9" placeholder="Nội dung ....." class="form-control"></textarea>
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

    <?php require './views/layout/footer.php'; ?>
</div><!-- /#right-panel -->