<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BFH BeeFilmHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
    <!-- Thêm link CSS của Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm jQuery và Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

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
            margin-top: 150px;
            width: 800px;
            height: 500px;
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
            /* object-fit: cover; */

            /* Khoảng cách giữa các items */
        }


        .movie-item {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
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
            font-size: 14px;
            color: #333;
            margin: 10px 0;
            font-weight: 600;
        }

        .movie-info p {
            font-size: 10px;
            color: #777;
            margin-bottom: 5px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: relative;
        }

        .online-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-menu {
            font-size: 14px;
            padding: 8px 10px;
            display: none;
            /* Đảm bảo menu chỉ hiển thị khi người dùng nhấn vào avatar */
        }

        .user-menu .nav-link {
            padding: 6px 10px;
        }

        .user-menu .nav-link i {
            margin-right: 8px;
        }

        .user-area .dropdown-menu {
            min-width: 150px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
        }
        
        .news-heading {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-color);
        }

        .news-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 5 tin tức trên một dòng */
            gap: 1rem;
            padding: 0 1rem;
            justify-content: center;
        }

        @media (max-width: 1000px) {
            .news-list {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .news-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .news-list {
                grid-template-columns: 1fr;
            }
        }


        .news-item {
            background: var(--bg-color);
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            /* Center align content */
        }

        .news-item figure {
            margin: 10px;
            height: 300px;
            padding: 5px;
            /* overflow: hidden; */
        }

        .news-item img {
            width: 100%;
            height: 100%;
            /* object-fit: cover; */
        }


        .news-content {
            padding: 0.5rem;
        }

        .news-content h3 {
            font-size: 0.9rem;
            /* Smaller text for compact layout */
            font-weight: 600;
            color: var(--gray);
            margin: 0.5rem 0;
        }

        .news-link {
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 3px;
            color: #007BFF;
            /* Set a blue color for the text */
            text-decoration: none;
            background-color: #f8f9fa;
            transition: background-color 0.3s, color 0.3s;
        }

        .news-link:hover {
            background-color: #007BFF;
            color: white;
        }

        .news-link:active {
            transform: translateY(1px);
        }


        .no-news {
            text-align: center;
            font-size: 1rem;
            color: var(--gray);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: relative;
        }

        .online-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-menu {
            font-size: 14px;
            padding: 8px 10px;
            display: none;
            /* Đảm bảo menu chỉ hiển thị khi người dùng nhấn vào avatar */
        }

        .user-menu .nav-link {
            padding: 6px 10px;
        }

        .user-menu .nav-link i {
            margin-right: 8px;
        }

        .user-area .dropdown-menu {
            min-width: 150px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
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
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: relative;
        }

        .online-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-menu {
            font-size: 14px;
            padding: 8px 10px;
            display: none;
            /* Đảm bảo menu chỉ hiển thị khi người dùng nhấn vào avatar */
        }

        .user-menu .nav-link {
            padding: 6px 10px;
        }

        .user-menu .nav-link i {
            margin-right: 8px;
        }

        .user-area .dropdown-menu {
            min-width: 150px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
        }
        .main-container {
            display: flex;
            padding: 20px;
            margin-top: 100px;
        }

        .filters {
            width: 250px;
            margin-top: 50px;
            padding-right: 50px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .filters input {
            margin-right: 10px;
        }

        .movie-section {
            flex-grow: 1;
        }

        .movie-search {
            text-align: center;
            margin-bottom: 20px;
        }

        .movie-search input {
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 0.5rem;
            width: 100%;
            margin-right: 10px;
            border: 1px solid var(--primary-color);
        }

        .movie-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: auto;
            margin-top: 20px;
        }

        .movie-card {
            background: #f1f1f1;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 10px;
            cursor: pointer;
        }

        .movie-card img {
            width: 250px;
            height: 350px;
            border-radius: 8px;
        }

        .movie-card h3 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .movie-card p {
            font-size: 1rem;
            color: var(--gray);
        }

        /* Modal Style */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            position: relative;
        }

        .modal iframe {
            width: 600px;
            height: 340px;
            border: none;
        }

        .modal .close {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 1.5rem;
            color: #000;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: relative;
        }

        .online-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-menu {
            font-size: 14px;
            padding: 8px 10px;
            display: none;
            /* Đảm bảo menu chỉ hiển thị khi người dùng nhấn vào avatar */
        }

        .user-menu .nav-link {
            padding: 6px 10px;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }

        .btn-group {
            display: flex;
            text-decoration: none;
            gap: 10px;
        }

        .pagination-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .pagination-btn:hover {
            background-color: #0056b3;
        }

        .page-number {
            font-size: 16px;
            color: #333;
            padding: 0 10px;
        }

        #pagination-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .user-menu .nav-link i {
            margin-right: 8px;
        }

        .user-area .dropdown-menu {
            min-width: 150px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
        }
        main {
            padding-top: 100px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            /* text-align: center; */
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
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: relative;
        }

        .online-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-menu {
            font-size: 14px;
            padding: 8px 10px;
            display: none;
            /* Đảm bảo menu chỉ hiển thị khi người dùng nhấn vào avatar */
        }

        .user-menu .nav-link {
            padding: 6px 10px;
        }

        .user-menu .nav-link i {
            margin-right: 8px;
        }

        .user-area .dropdown-menu {
            min-width: 150px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
        }
        .filters-genres{
            /* display: flex; */
            gap: 10px;
            margin-bottom: 10px;
        }
        
    </style>
</head>

<body>