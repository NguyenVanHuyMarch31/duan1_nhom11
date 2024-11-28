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
                        <h3>Sửa Phim
                            -
                            <?= $movie['movie_name'] ?>
                        </h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=editPhim'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="movie_id" value="<?= $movie['movie_id'] ?>">

                            <!-- Movie Name -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="movie_name" class="form-control-label">Tên Phim</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="movie_name" name="movie_name" placeholder="Tên phim..." class="form-control" value="<?= $movie['movie_name'] ?>">
                                    <?php if (isset($_SESSION['error']['movie_name'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['movie_name'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Thể loại</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <?php foreach ($listGenreMovies as $genre_movie) { ?>
                                            <div class="checkbox">
                                                <label class="form-check-label">
                                                    <input
                                                        type="checkbox"
                                                        name="genre_id[]"
                                                        value="<?= $genre_movie['genre_id']; ?>"
                                                        class="form-check-input"
                                                        <?php
                                                        if (isset($selectedGenres) && in_array($genre_movie['genre_id'], $selectedGenres)) {
                                                            echo 'checked';  
                                                        }
                                                        ?>>
                                                    <?= $genre_movie['genre_name']; ?> 
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>




                            <!-- Duration -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="duration" class="form-control-label">Thời Lượng</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="duration" name="duration" placeholder="120 phút..." class="form-control" value="<?= $movie['duration'] ?>">
                                    <?php if (isset($_SESSION['error']['duration'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['duration'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="description" class="form-control-label">Mô Tả</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="description" rows="9" placeholder="Mô tả phim..." class="form-control"><?= $movie['description'] ?></textarea>
                                    <?php if (isset($_SESSION['error']['description'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['description'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Director -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="director" class="form-control-label">Đạo Diễn</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="director" name="director" placeholder="Đạo diễn..." class="form-control" value="<?= $movie['director'] ?>">
                                    <?php if (isset($_SESSION['error']['director'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['director'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Actors -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="actors" class="form-control-label">Diễn Viên</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="actors" name="actors" placeholder="Diễn viên..." class="form-control" value="<?= $movie['actors'] ?>">
                                    <?php if (isset($_SESSION['error']['actors'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['actors'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Release Date -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="release_date" class="form-control-label">Ngày Phát Hành</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="release_date" name="release_date" class="form-control" value="<?= $movie['release_date'] ?>">
                                    <?php if (isset($_SESSION['error']['release_date'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['release_date'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Poster -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="poster" class="form-control-label">Hình Ảnh</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="poster" name="poster" class="form-control-file">
                                    <?php if (isset($_SESSION['error']['poster'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['poster'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Trailer -->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="trailer" class="form-control-label">Trailer</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="trailer" name="trailer" placeholder="URL trailer..." class="form-control" value="<?= $movie['trailer'] ?>">
                                    <?php if (isset($_SESSION['error']['trailer'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trailer'] ?></p>
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
</div>