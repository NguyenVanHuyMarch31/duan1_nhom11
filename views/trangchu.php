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

            #menu-toggle:checked + .navbar .links {
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
                <li><a href="#">Phim</a></li>
                <li><a href="#">Thể loại</a></li>
                <li><a href="#">Tin mới & Ưu đãi</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
            <div class="buttons">
                <a href="?act=register" class="signup">Đăng kí</a>
                <a href="?act=login" class="signup">Đăng nhập</a>
            </div>
        </nav>
    </header>

    <main style="padding-top: 70px; text-align: center;">
        <h1>Welcome to BeeFilmHub</h1>
        <p>Your hub for all things film. Discover new movies, watch trailers, and more.</p>
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
