
                        <h3>Thêm phim mới</h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=postPhim'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="movie_name" class="form-control-label">Tên phim</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="movie_name" name="movie_name" placeholder="Nhập tên phim" class="form-control">
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
                                                        class="form-check-input">
                                                    <?= $genre_movie['genre_name']; ?> <!-- Hiển thị tên thể loại -->
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3"><label for="duration" class="form-control-label">Thời lượng</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="duration" name="duration" placeholder="Ví dụ: 120 phút" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="description" class="form-control-label">Mô tả</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="description" rows="4" placeholder="Nhập mô tả ngắn gọn về phim" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="director" class="form-control-label">Đạo diễn</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="director" name="director" placeholder="Nhập tên đạo diễn" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="actors" class="form-control-label">Diễn viên</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="actors" name="actors" placeholder="Nhập danh sách diễn viên, cách nhau bằng dấu phẩy" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="release_date" class="form-control-label">Ngày phát hành</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="release_date" name="release_date" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="poster" class="form-control-label">Ảnh bìa</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="poster" name="poster" class="form-control-file">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="trailer" class="form-control-label">Trailer</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="url" id="trailer" name="trailer" placeholder="Nhập liên kết trailer (YouTube, Vimeo...)" class="form-control">
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