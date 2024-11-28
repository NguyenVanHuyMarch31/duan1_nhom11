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
                            <h3>Thêm Tin Tức</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo BASE_URL_ADMIN . '?act=postTheLoai'; ?>" method="post"  class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="genre_name" class="form-control-label">Thể Loại Phim</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="genre_name" name="genre_name" placeholder="Viết thể loại vào đây"
                                            value="<?php echo isset($_POST['genre_name']) ? $_POST['genre_name'] : ''; ?>" class="form-control">
                                        <?php if (isset($_SESSION['error']['genre_name'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['genre_name'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="description" class="form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="description" id="description" rows="9" placeholder="Nội dung ....." class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
</body>

</html>