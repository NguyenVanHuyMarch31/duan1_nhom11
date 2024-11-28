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
            --shadow-color: rgba(0, 0, 0, 0.1);
            --highlight-color: #FFCC00;
        }

        body {
            font-size: var(--font-size);
            font-family: var(--font-family);
            margin: 0;
            display: flex;
            flex-direction: column;
            background: var(--bg-color);
            align-items: center;
            justify-content: space-between;
            color: var(--gray);
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--bg-color);
            padding: 1rem 0;
            z-index: 1000;
            box-shadow: 0 2px 4px var(--shadow-color);
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
            font-size: 2rem;
            text-decoration: none;
            color: var(--highlight-color);
            font-family: 'Doto', sans-serif;
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
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
            transition: color 0.3s ease;
        }

        .navbar .links a:hover {
            color: var(--hover-color);
            transition: color 0.3s ease;
            text-decoration: underline;
        }

        .navbar .buttons .signup {
            border: 1px solid var(--primary-color);
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            background: linear-gradient(to bottom, var(--primary-color) 23%, var(--hover-color) 95%);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .navbar .buttons .signup:hover {
            background-color: var(--hover-color);
        }

        footer {
            width: 100%;
            background-color: var(--primary-color);
            padding: 2rem 0;
            color: var(--white);
            text-align: center;
            font-size: 1rem;
            box-shadow: 0 -2px 4px var(--shadow-color);
        }

        footer .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        footer .footer-content a {
            color: var(--white);
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        footer .footer-content a:hover {
            color: var(--highlight-color);
        }

        footer .social-icons {
            display: flex;
            gap: 1rem;
        }

        footer .social-icons a {
            font-size: 1.5rem;
            color: var(--white);
        }

        footer .social-icons a:hover {
            color: var(--highlight-color);
        }

        main {
            padding-top: 100px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .news-article {
            background: #fff;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .news-article img {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }

        .news-article p {
            line-height: 1.6;
            font-size: 1.1rem;
        }

        .news-article h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
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

            .navbar .buttons {
                display: flex;
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

        .news-article {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            background: #fff;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .news-image {
            flex: 0 0 40%;
            /* Hình ảnh chiếm 40% chiều rộng */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .news-image img {
            max-width: 100%;
            /* Giới hạn chiều rộng của ảnh */
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .news-content {
            flex: 1;
            /* Nội dung văn bản chiếm phần còn lại */
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .news-content h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            text-align: left;
        }

        .news-content p {
            line-height: 1.6;
            font-size: 1.1rem;
            color: var(--gray);
            text-align: left;
        }

        .news-details {
            margin-top: 2rem;
            font-size: 1rem;
            color: #333;
            line-height: 1.8;
            text-align: left;
            /* white-space: pre-wrap; */
            /* Giữ nguyên khoảng cách và ngắt dòng */
        }

        .news-details:empty:before {
            content: "Chưa có nội dung.";
            /* Thông báo khi không có nội dung */
            color: #888;
        }

        @media (max-width: 768px) {
            .news-article {
                flex-direction: column;
            }

            .news-image {
                width: 100%;
                margin-bottom: 1rem;
            }

            .news-content {
                width: 100%;
            }

            .news-details {
                width: 100%;
            }
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
                <!-- <li><a href="#">Phim Sắp Chiếu</a></li> -->
                <li><a href="<?= BASE_URL . '?act=tinTuc' ?>">Tin mới & Ưu đãi</a></li>
            </ul>
            <div class="buttons">
                <a href="?act=formRegister" class="signup">Đăng kí</a>
                <a href="?act=formLogin" class="signup">Đăng nhập</a>
            </div>
        </nav>
    </header>

    <main>

        <div class="news-article">
            <div class="news-image">
                <img src="<?= BASE_URL . $news['thumbnail'] ?>"
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