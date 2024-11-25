<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="movie-details-container">
                <h1 class="movie-title">Thông tin phim -
                    <?= $movie['movie_name'] ?? 'Thông tin phim' ?></h1>
                <hr>

                <div class="movie-info">
                    <div class="movie-info-left">
                        <div class="movie-poster" onclick="openVideo('<?= $movie['trailer'] ?>')">
                            <img src="<?= BASE_URL . $movie['poster'] ?>"  class="poster-img"
                            onerror="this.onerror=null; this.src='https://i.pinimg.com/236x/02/02/3e/02023ee1ee6d1a463eff69caf78e6322.jpg'">
                        </div>

                        <!-- Tóm tắt nội dung dưới poster -->
                        <div class="movie-description">
                            <h3><strong>Tóm tắt nội dung</strong></h3>
                            <p><?= substr($movie['description'] , 0 ,100) ?? 'Chưa có mô tả' ?></p>
                        </div>
                    </div>

                    <div class="movie-info-right">
                        <p><strong>Thời lượng:</strong> <?= $movie['duration'] ?? 'Chưa có thông tin' ?></p>
                        <p><strong>Đạo diễn:</strong> <?= $movie['director'] ?? 'Chưa có thông tin' ?></p>
                        <p><strong>Diễn viên:</strong> <?= $movie['actors'] ?? 'Chưa có thông tin' ?></p>
                        <p><strong>Ngày phát hành:</strong> <?= $movie['release_date'] ?? 'Chưa có thông tin' ?></p>
                        <p><strong>Trailer:</strong>
                            <a href="<?= substr($movie['trailer'] ,0,50) ?? '#' ?>" target="_blank" class="btn btn-trailer">
                                <?= substr($movie['trailer'] ,0,50) ?? 'Không có trailer' ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Quản lý suất chiếu -->
            <!-- Bình luận -->
<div class="movie-comments">
    <h2>Bình luận về phim</h2>
    <div class="comments-list">
        <h3>Bình luận đã có</h3>
        <div class="comment">
            <p><strong>Nguyễn Văn A:</strong> Đây là bình luận của người dùng A.</p>
            <p class="comment-date">2024-11-21 10:00</p>
            <button class="btn btn-warning">Sửa</button>
            <button class="btn btn-danger">Xóa</button>
        </div>
        <div class="comment">
            <p><strong>Trần Thị B:</strong> Bình luận của người dùng B rất thú vị.</p>
            <p class="comment-date">2024-11-20 14:30</p>
            <button class="btn btn-warning">Sửa</button>
            <button class="btn btn-danger">Xóa</button>
        </div>
        <!-- Thêm các bình luận khác tại đây -->
    </div>
</div>





        </div>
        <!-- .animated -->
        <div class="clearfix"></div>
    </div>
    <!-- End of Right Panel -->

    <!-- Popup Video -->
    <div id="videoPopup" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; max-width: 800px; background-color: #000; padding: 20px; z-index: 1000;">
        <iframe id="videoFrame" width="100%" height="450" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <button onclick="closeVideo()" style="position: absolute; top: 10px; right: 10px; background-color: #fff; border: none; font-size: 18px;">X</button>
    </div>

    <!-- Overlay -->
    <div id="overlay" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 999;"></div>

    <script>
        function openVideo(trailerUrl) {
            // Chuyển URL trailer thành dạng embed
            var embedUrl = trailerUrl.replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/");
            document.getElementById('videoFrame').src = embedUrl + "?autoplay=1";
            document.getElementById('videoPopup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closeVideo() {
            document.getElementById('videoPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('videoFrame').src = ''; // Dừng video khi đóng popup
        }
    </script>

    <?php require './views/layout/footer.php'; ?>
</div>

