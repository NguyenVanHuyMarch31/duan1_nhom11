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
            <div class="movie-item">
                <img src="https://i.pinimg.com/236x/d1/44/9c/d1449cf0ef6efa6386bd8df6b99a3edd.jpg" alt="Phim 1">
                <div class="movie-info">
                    <h3>Ở nhà một mình </h3>
                    <p>Thể loại: Trẻ em/Hài</p>
                </div>
            </div>
            <div class="movie-item">
                <img src="https://i.pinimg.com/236x/15/4a/66/154a6638fcf59b56b0a4aaf052752aa8.jpg" alt="Phim 2">
                <div class="movie-info">
                    <h3>Tiên hắc ám</h3>
                    <p>Thể loại: Trẻ em/Kỳ ảo</p>
                </div>
            </div>
            <div class="movie-item">
                <img src="https://i.pinimg.com/236x/3f/be/ba/3fbebabfb00e74ff6be92486d004a79d.jpg" alt="Phim 3">
                <div class="movie-info">
                    <h3>Xứ sở các nguyên tố</h3>
                    <p>Thể loại: Trẻ em/Hài</p>
                </div>
            </div>
            <div class="movie-item">
                <img src="https://i.pinimg.com/474x/42/00/da/4200dae9ac7b15a5c65375cbfaceaa69.jpg" alt="Phim 4">
                <div class="movie-info">
                    <h3>Avengers</h3>
                    <p>Thể loại: Hành động/Khoa học viễn tưởng</p>
                </div>
            </div>
            <div class="movie-item">
                <img src="https://i.pinimg.com/236x/23/75/4b/23754b0b1fc5d35c1ee3159ae7cf6acc.jpg" alt="Phim 5">
                <div class="movie-info">
                    <h3>Truy tìm phép thuật</h3>
                    <p>Thể loại: Trẻ em/Kỳ ảo</p>
                </div>
            </div>
            <div class="movie-item">
                <img src="https://i.pinimg.com/236x/a1/6c/89/a16c89e3dcd2bbc3d19c1c23ceaf266d.jpg" alt="Phim 6">
                <div class="movie-info">
                    <h3>Coco</h3>
                    <p>Thể loại: Trẻ em/Kỳ ảo</p>
                </div>
            </div>
            <div class="movie-item">
                <img src="https://i.pinimg.com/236x/24/c0/5e/24c05e7015c2f218bf5dfa79010700f9.jpg" alt="Phim 7">
                <div class="movie-info">
                    <h3>Khách sạn huyền bí 2</h3>
                    <p>Thể loại: Trẻ em/Hài</p>
                </div>
            </div>



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
                autoplay: false,
                autoplaySpeed: 3000,
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