<?php require './views/layout/header.php' ?>

    <header class="header">
    <?php require './views/layout/nav.php' ?>

    </header>

    <main >

        <div class="news-article">
            <div class="news-image">
                <img src="<?= BASE_URL_USER . $news['thumbnail'] ?>"
                    alt="<?= $news['title'] ?? 'Hình ảnh bài viết' ?>"
                    onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'" />
            </div>

            <div class="news-content">
                <h1><?= $news['title'] ?></h1>
                <p><strong>Ngày phát hành:</strong> <?= $news['publish_date'] ?></p>
                <p><strong>Tác giả:</strong> <?= $news['author'] ?></p>
            </div>

            <div class="news-details">
                <?= $news['content'] ?>
            </div>
        </div>


    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 BeeFilmHub. Team11-CHH.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>