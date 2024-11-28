<?php require './views/layout/header.php' ?>

    <header class="header">
    <?php require './views/layout/nav.php' ?>

    </header>

    <main style="padding-top: 70px; text-align: center;">
        <h1 class="news-heading">Tin Tức Mới</h1>
        <div class="news-list">
            <?php if (!empty($newsList)): ?>
                <?php foreach ($newsList as $news): ?>
                    <div class="news-item">
                        <figure>
                            <img src="<?= BASE_URL_USER . $news['thumbnail'] ?>"
                                alt="<?= $news['title'] ?? 'Hình ảnh bài viết' ?>"
                                onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'">
                        </figure>
                        <div class="news-content">
                            <h3><?= $news['title'] ?></h3>
                            <a href="<?= BASE_URL_USER . '?act=chiTietTinTuc&news_id=' . $news['news_id'] ?>" class="news-link">Xem chi tiết</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-news">Hiện không có tin tức nào.</p>
            <?php endif; ?>
        </div>

    </main>

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