<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BFH BeeFilmHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap");

        :root {
            --white: #e9e9e9;
            --gray: #333;
            --blue: #0367a6;
            --lightblue: #008997;
            --button-radius: 0.7rem;
            --max-width: 758px;
            --font-family: "Open Sans", sans-serif;
            --font-size: 16px;
            --bg-color: #fff;
            --primary-color: #175d69;
            --hover-color: #330c43;
        }

        body {
            font-size: var(--font-size);
            font-family: var(--font-family);
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            background: var(--bg-color);
            align-items: center;
            justify-content: space-between;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--bg-color);
            padding: 1rem 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .navbar .logo a {
            font-size: 1.8rem;
            text-decoration: none;
            color: pink;
        }

        .navbar .logo img {
            width: 50px;
            height: 50px;
        }

        .navbar .links {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 2rem;
        }

        .navbar .links a {
            font-weight: 500;
            text-decoration: none;
            color: var(--primary-color);
            padding: 10px 0;
            transition: color 0.2s ease;
        }

        .navbar .links a:hover {
            color: var(--hover-color);
            transition: color 0.2s ease;
            text-decoration: underline;
        }

        .navbar .buttons .signup {
            border: 1px solid var(--primary-color);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            background: linear-gradient(to bottom, var(--primary-color) 23%, var(--hover-color) 95%);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .navbar .buttons .signup:hover {
            background-color: var(--hover-color);
        }

        footer {
            width: 100%;
            background-color: var(--primary-color);
            padding: 1rem 0;
            color: var(--white);
            text-align: center;
            font-size: 0.9rem;
        }

        footer .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        footer .footer-content a {
            color: var(--white);
            text-decoration: none;
            margin: 0 10px;
        }

        footer .footer-content a:hover {
            color: var(--hover-color);
        }

        footer .social-icons {
            display: flex;
            gap: 1rem;
        }

        footer .social-icons a {
            font-size: 1.2rem;
            color: var(--white);
        }

        footer .social-icons a:hover {
            color: var(--hover-color);
        }

        @media (max-width: 768px) {
            .navbar .links {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                right: 0;
                background: var(--primary-color);
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .navbar .links a {
                color: var(--white);
                font-size: 1.2rem;
            }

            #menu-toggle:checked+.navbar .links {
                display: flex;
            }

            #hamburger-btn {
                display: flex;
                flex-direction: column;
                gap: 5px;
                cursor: pointer;
            }

            #hamburger-btn div {
                width: 30px;
                height: 4px;
                background: var(--primary-color);
            }
        }

        .bee {
            color: #FFCC00;
            font-size: 3.125rem;
        }

        .filmhub {
            color: var(--gray);
            font-size: 2.5rem;
        }

        .logo .bee,
        .logo .filmhub {
            position: relative;
            top: -10px;
        }

        .logo .bee {
            font-family: 'Doto', sans-serif;
            font-weight: 700;
        }

        .logo .filmhub {
            font-family: 'Doto', sans-serif;
            font-weight: 400;
        }

        .hero {
            margin-top: 10px;
            width: 800px;
            height: 400px;
            background-image: url('https://i.pinimg.com/736x/fa/7c/53/fa7c530a193318ab8685877851abd142.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 60px 20px;
            color: pink;
        }

        .hero h2 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .hero .btn {
            padding: 15px 30px;
            background-color: #f4a261;
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .hero .btn:hover {
            background-color: #e76f51;
        }

        /* Featured Movies Section */
        .featured-movies {
            padding: 40px 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 0 auto;
            /* Canh giữa phần tử */
        }

        .featured-movies .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: bold;
        }



        .movie-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        
            /* Giới hạn chiều cao tối đa */
            
            /* Đảm bảo chiếm toàn bộ chiều cao khi cần */
        }


        .movie-item {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-height: 500px;
            height: 100%;
            transition: transform 0.3s ease-in-out;
            /* Thêm hiệu ứng khi hover */
        }

        .movie-item:hover {
            transform: translateY(-5px);
            /* Di chuyển nhẹ khi hover */
        }

        .movie-item img {
            width: 95%;
            height: 250px;
            /* object-fit: cover; */
            border-bottom: 2px solid #f1f1f1;
            /* Đường viền dưới ảnh */
        }

        .movie-info {
            padding: 15px 10px;

        }

        .movie-info h3 {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
            font-weight: 600;
        }

        .movie-info p {
            /* font-size: 1rem; */
            color: #777;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="?act=trangchu">
                    <img src="https://i.pinimg.com/736x/76/42/ca/7642ca38bdb1c1f4692a1bb3c1e2f5cc.jpg" alt="BeeFilmHub Logo" />
                    <span class="bee">Bee</span><span class="filmhub">FilmHub</span>
                </a>
            </div>
            <ul class="links">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="<?= BASE_URL . '?act=phimdangchieu' ?>">Phim</a></li>
                <!-- <li><a href="<?= BASE_URL . '?act=phimdangchieu' ?>">Phim Sắp Chiếu</a></li> -->
                <li><a href="<?= BASE_URL . '?act=tinTuc' ?>">Tin mới & Ưu đãi</a></li>
            </ul>
            <div class="buttons">
                <a href="?act=formRegister" class="signup">Đăng kí</a>
                <a href="?act=formLogin" class="signup">Đăng nhập</a>
            </div>
        </nav>
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