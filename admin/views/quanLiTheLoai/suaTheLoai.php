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
                            <h3>Sửa thể loại</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo BASE_URL_ADMIN . '?act=editTheLoai'; ?>" method="post"  class="form-horizontal">
                                <input type="hidden" name="genre_id" value="<?= $genres['genre_id'] ?>">
                                <!-- genre_name -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="genre_name" class="form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="genre_name" name="genre_name" placeholder="" class="form-control" value="<?= $genres['genre_name'] ?>">
                                        <?php if (isset($_SESSION['error']['genre_name'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['genre_name'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                               

                                <!-- Content -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="description" class="form-control-label">Nội dung</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="description" id="description" rows="9" placeholder="" class="form-control"><?= $genres['description'] ?></textarea>
                                        <?php if (isset($_SESSION['error']['description'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['description'] ?></p>
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


        
</body>

</html>