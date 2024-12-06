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
            /* text-decoration: underline; */
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
        <div class="main-container">
            <div class="filters">
                <div class="movie-search">
                    <input type="text" placeholder="Tìm kiếm phim..." id="searchInput" onkeyup="searchMovies()">
                </div>

                <div class="filters-genres">
                    <div class="filters-genres">
                        <?php
                        foreach ($listGenres as $genre) { ?>
                            <input type="checkbox" class="genre-checkbox" data-genre="<?= $genre['genre_id'] ?>" onchange="filterMovies()">
                            <label for="genre-<?= $genre['genre_id'] ?>"><?= $genre['genre_name'] ?></label><br>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>

            <div class="movie-section">
                <div class="movie-list" id="movie-list">
                    <?php
                    foreach ($listMovies as $index => $movie) {
                    ?>
                        <div class="movie-card" data-index="<?= $index ?>">
                            <img src="<?= BASE_URL . $movie['poster'] ?>" alt="Poster" onclick="openModal('<?= $movie['trailer'] ?>')"
                                onerror="this.onerror=null; this.src='https://i.pinimg.com/236x/02/02/3e/02023ee1ee6d1a463eff69caf78e6322.jpg'">
                            <h3><?= $movie['movie_name'] ?></h3>
                            <p><?= $movie['genres'] ?> | <?= $movie['duration'] ?> phút</p>
                            <div class="btn-group">
                                <a href="<?= BASE_URL . '?act=chitietPhim&movie_id=' . $movie['movie_id'] ?>" class="btn btn-primary" title="Xem chi tiết">
                                    Xem chi tiết
                                </a> |
                                <a href="?act=formLogin" class="btn btn-danger" title="Đặt vé">
                                    Đặt vé phim
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div id="pagination-controls">
                    <button onclick="changePage('prev')" class="pagination-btn" id="prev-btn">Trước</button>
                    <span id="page-number" class="page-number"> 1</span>
                    <button onclick="changePage('next')" class="pagination-btn" id="next-btn">Tiếp</button>
                </div>

            </div>

        </div>
    </main>

    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <iframe id="trailerIframe" src="" allow="autoplay; encrypted-media" frameborder="0"></iframe>
        </div>
    </div>

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
    <script>
        const moviesPerPage = 6;
        let currentPage = 1;
        const allMovies = document.querySelectorAll('.movie-card');
        const totalMovies = allMovies.length;
        const totalPages = Math.ceil(totalMovies / moviesPerPage);

        function displayMovies() {
            allMovies.forEach(movie => movie.style.display = 'none');

            const start = (currentPage - 1) * moviesPerPage;
            const end = start + moviesPerPage;
            for (let i = start; i < end && i < totalMovies; i++) {
                allMovies[i].style.display = 'block';
            }

            document.getElementById('page-number').textContent = ` ${currentPage}`;
        }

        function changePage(direction) {
            if (direction === 'next' && currentPage < totalPages) {
                currentPage++;
            } else if (direction === 'prev' && currentPage > 1) {
                currentPage--;
            }
            displayMovies();
        }

        displayMovies();

        function openModal(trailerLink) {
            document.getElementById('trailerIframe').src = trailerLink;
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('trailerIframe').src = '';
        }

        function searchMovies() {
            var input = document.getElementById("searchInput").value.toLowerCase();
            var movieCards = document.querySelectorAll(".movie-card");
            movieCards.forEach(function(card) {
                var movieName = card.querySelector("h3").textContent.toLowerCase();
                if (movieName.indexOf(input) > -1) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }

        document.querySelectorAll('.genre-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var selectedGenres = [];
                document.querySelectorAll('.genre-checkbox:checked').forEach(function(checkedCheckbox) {
                    selectedGenres.push(checkedCheckbox.getAttribute('data-genre'));
                });

                var movieCards = document.querySelectorAll(".movie-card");
                movieCards.forEach(function(card) {
                    var movieGenres = card.getAttribute('data-genre').split(',');
                    var isVisible = selectedGenres.length === 0 || selectedGenres.some(genre => movieGenres.includes(genre));
                    card.style.display = isVisible ? "" : "none";
                });
            });
        });
        const genreCheckboxes = document.querySelectorAll('.genre-checkbox');
        const movieCards = document.querySelectorAll('.movie-card');

        function filterMovies() {
            const selectedGenres = [];

            genreCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedGenres.push(parseInt(checkbox.getAttribute('data-genre')));
                }
            });

            movieCards.forEach(card => {
                const movieGenres = card.getAttribute('data-genres').split(',');
                const hasMatchingGenre = selectedGenres.some(genre => movieGenres.includes(genre.toString()));

                if (selectedGenres.length === 0 || hasMatchingGenre) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        genreCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterMovies);
        });

        function filterMovies() {
            const selectedGenres = [];

            // Lấy danh sách các thể loại đã chọn
            genreCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedGenres.push(checkbox.getAttribute('data-genre'));
                }
            });

            // Lọc các phim dựa trên thể loại đã chọn
            movieCards.forEach(card => {
                const movieGenres = card.getAttribute('data-genres').split(',');
                const hasMatchingGenre = selectedGenres.some(genre => movieGenres.includes(genre));

                // Hiển thị hoặc ẩn phim tùy thuộc vào thể loại có chọn hay không
                if (selectedGenres.length === 0 || hasMatchingGenre) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        filterMovies();
    </script>
</body>

</html>