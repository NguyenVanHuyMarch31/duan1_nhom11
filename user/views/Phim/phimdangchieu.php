<?php require './views/layout/header.php' ?>

    <header class="header">
    <?php require './views/layout/nav.php' ?>

    </header>

    <main>
        <div class="main-container">
            <!-- Filters Section (Left Side) -->
            <div class="filters">
                <div class="movie-search">
                    <input type="text" placeholder="Tìm kiếm phim..." id="searchInput">
                </div>

                <div class="filters-genres">
                    <?php
                    foreach ($listGenres as $genre) { ?>
                        <input type="checkbox" id="actionGenre"> <label for="actionGenre"><?= $genre['genre_name'] ?></label><br>

                    <?php }
                    ?>
                </div>
            </div>

            <!-- Movies Section (Right Side) -->
            <div class="movie-section">
                <div class="movie-list">
                    <?php
                    foreach ($listMovies as $movie) {
                    ?>
                        <div class="movie-card" onclick="openModal('<?= $movie['trailer'] ?>')">
                            <img src="<?= BASE_URL_USER . $movie['poster'] ?>" alt="Poster"
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

                    <!-- Additional movies go here -->
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
    </script>
</body>

</html>