<?php require './views/layout/header.php' ?>

<header class="header">
    <?php require './views/layout/nav.php' ?>
</header>

<main>
    <div class="main-container">
        <div class="filters">
            <div class="movie-search">
                <input type="text" placeholder="Tìm kiếm phim..." id="searchInput" onkeyup="searchMovies()">
            </div>

            <div class="filters-genres">
                <label for="genre-select">Chọn thể loại phim:</label>
                <select id="genre-select" onchange="filterMovies()">
                    <option value="">Tất cả thể loại</option>
                    <?php foreach ($listGenres as $genre) { ?>
                        <option value="<?= $genre['genre_id'] ?>"><?= $genre['genre_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="movie-section">
            <div class="movie-list">
                <?php
                foreach ($listMovies as $movie) {
                    // Chuyển danh sách thể loại thành một chuỗi
                    $genresArray = is_array($movie['genres']) ? $movie['genres'] : explode(',', $movie['genres']);
                    $movieGenres = implode(',', $genresArray);
                ?>
                    <div class="movie-card" data-genres="<?= $movie['genres'] ?>" onclick="openModal('<?= $movie['trailer'] ?>')">
                        <img src="<?= BASE_URL . $movie['poster'] ?>" alt="Poster"
                            onerror="this.onerror=null; this.src='https://i.pinimg.com/236x/02/02/3e/02023ee1ee6d1a463eff69caf78e6322.jpg'">
                        <h3><?= $movie['movie_name'] ?></h3>
                        <p><?= $movie['genres'] ?> | <?= $movie['duration'] ?> phút</p>
                        <div class="btn-group">
                            <a href="<?= BASE_URL_USER . '?act=chitietPhim&movie_id=' . $movie['movie_id'] ?>" class="btn btn-primary" title="Xem chi tiết">
                                Xem chi tiết
                            </a> |
                            <a href="<?= BASE_URL_USER . '?act=datVe&movie_id=' . $movie['movie_id'] ?>" class="btn btn-danger" title="Đặt vé">
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
                <span id="page-number" class="page-number">1</span>
                <button onclick="changePage('next')" class="pagination-btn" id="next-btn">Tiếp</button>
            </div>
        </div>
    </div>
</main>

<!-- Modal for Video -->
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
// Open modal with trailer video
function openModal(trailerLink) {
    document.getElementById('trailerIframe').src = trailerLink;
    document.getElementById('modal').style.display = 'flex';
}

// Close modal
function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('trailerIframe').src = '';
}

// Filter movies based on genre selection
function filterMovies() {
    var selectedGenre = document.getElementById("genre-select").value;
    var movieCards = document.querySelectorAll(".movie-card");

    movieCards.forEach(function(card) {
        var movieGenres = card.getAttribute('data-genres').split(','); // Assuming genres are stored as comma-separated list
        if (selectedGenre === "" || movieGenres.includes(selectedGenre)) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    });
}

// Search movies by name
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

// Pagination logic
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
</script>
</body>

</html>
