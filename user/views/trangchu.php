<?php require './views/layout/header.php' ?>
    <header class="header">
    <?php require './views/layout/nav.php' ?>

    </header>

   
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Khám phá bộ phim mới nhất</h2>
            <p>Đắm chìm trong thế giới phim ảnh độc đáo và hấp dẫn.</p>
        </div>
    </section>

    <!-- Featured Movies Section -->
    <section class="featured-movies">
        <h2 class="section-title">Phim Nổi Bật</h2>
        <div class="movie-grid">
            <?php foreach ($listMovies as $movie) {
            ?>
                <div class="movie-item">
                    <img src="<?= BASE_URL . $movie['poster'] ?>" alt="Phim 1">
                    <div class="movie-info">
                        <h3><?= $movie['movie_name'] ?> </h3>
                        <p></p>
                    </div>
                </div>
            <?php
            } ?>



        </div>
    </section>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.movie-grid').slick({
                infinite: true, // Cho phép quay vòng
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnHover: true,
                responsive: [{
                        breakpoint: 10,
                        settings: {
                            slidesToShow: 2 // Hiển thị 2 phim trên màn hình nhỏ hơn 1000px
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1 // Hiển thị 1 phim trên màn hình nhỏ hơn 500px
                        }
                    }
                ]
            });
        });
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