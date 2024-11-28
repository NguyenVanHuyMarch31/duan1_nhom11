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
            padding: 15px;
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

        .container {
            width: 100%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .movie-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .movie-header img {
            width: 200px;
            height: 300px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .movie-header h1 {
            font-size: 2em;
            color: #333;
            margin: 0;
        }

        .movie-header .details {
            color: #666;
            font-size: 1.1em;
        }

        .movie-description {
            margin-top: 20px;
        }

        .movie-description p {
            line-height: 1.6;
            color: #333;
        }

        .movie-genres {
            margin-top: 20px;
        }

        .movie-genres span {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .movie-footer {
            margin-top: 20px;
            text-align: center;
        }

        .movie-footer a {
            text-decoration: none;
            background-color: #ff5722;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin: 0 10px;
        }

        .movie-footer a:hover {
            background-color: #e64a19;
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
                <li><a href="<?= BASE_URL . '?act=trangchu' ?>">Trang chủ</a></li>
                <li><a href="<?= BASE_URL . '?act=phimdangchieu' ?>">Phim</a></li>
                <li><a href="<?= BASE_URL . '?act=tinTuc' ?>">Tin mới & Ưu đãi</a></li>
            </ul>
            <div class="buttons">
                <a href="?act=formRegister" class="signup">Đăng kí</a>
                <a href="?act=formLogin" class="signup">Đăng nhập</a>
            </div>
        </nav>
    </header>

    <main style="margin: 100px;">
        <div class="container">
            <div class="movie-header">
                <img src="<?= BASE_URL . $movie['poster'] ?>" alt="Poster"
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

                <a href="?act=formLogin">Đặt Vé</a>
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