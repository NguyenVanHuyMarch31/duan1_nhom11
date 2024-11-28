<?php require './views/layout/header.php' ?>

    <header class="header">
    <?php require './views/layout/nav.php' ?>

    </header>

    <main style="margin: 100px;">
        <div class="container">
            <div class="movie-header">
                <img src="<?= BASE_URL_USER . $movie['poster'] ?>" alt="Poster"
                    onerror="this.onerror=null; this.src='https://i.pinimg.com/236x/02/02/3e/02023ee1ee6d1a463eff69caf78e6322.jpg'">
                <div>
                    <h1><?= $movie['movie_name'] ?? 'Thông tin phim' ?></h1>
                    <div class="details">Ngày phát hành: <?= $movie['release_date'] ?? 'Chưa có thông tin' ?></div>

                    <div class="details">Thời lượng phim: <?= $movie['duration'] ?? 'Chưa có thông tin' ?> phút
                    </div>
                    <div class="details">Đạo diễn: <?= $movie['director'] ?? 'Chưa có thông tin' ?>
                    </div>
                    <div class="details">Diễn viên: <?= $movie['actors'] ?? 'Chưa có thông tin' ?>
                    </div>
                </div>
            </div>
            <div class="movie-description">
                <h2>Mô tả phim</h2>
                <p><?= $movie['description'] ?? 'Chưa có thông tin' ?></p>
            </div>
            <div class="movie-genres">
                <h3>Thể loại:</h3>
                <?php
                foreach ($movie_genres as $genre) {
                    echo "<span>{$genre['genre_name']}</span>";
                }
                ?>

            </div>
            <br>
            <div class="movie-footer">
                <a href="javascript:void(0)" onclick="openVideo('<?= $movie['trailer'] ?>')">Xem Trailer</a>

                <a href="<?= BASE_URL_USER . '?act=datVe&movie_id=' . $movie['movie_id'] ?>">Đặt Vé</a>
            </div>
        </div>

    </main>
    <div id="videoPopup" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; max-width: 800px; background-color: #000; padding: 20px; z-index: 1000;">
        <iframe id="videoFrame" width="100%" height="450" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <button onclick="closeVideo()" style="position: absolute; top: 10px; right: 10px; background-color: #fff; border: none; font-size: 18px;">X</button>
    </div>



    <div id="overlay" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 999;"></div>

    <script>
        function openVideo(trailerUrl) {
            var embedUrl = trailerUrl.replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", "https://www.youtube.com/");
            document.getElementById('videoFrame').src = embedUrl + "?autoplay=1";
            document.getElementById('videoPopup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }


        function closeVideo() {
            document.getElementById('videoPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('videoFrame').src = '';
        }
    </script>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 BeeFilmHub. Team11-CHH.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div>
                <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a> | <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>
</body>

</html>