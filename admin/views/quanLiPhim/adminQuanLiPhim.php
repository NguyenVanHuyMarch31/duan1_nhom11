<?php require './views/layout/header.php'; ?>
<?php require './views/layout/sidebar.php'; ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <h1>Danh Sách Phim - Bee Film Hub</h1>
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=themPhim' ?>">
                    <button class="btn btn-success">Thêm mới phim</button>
                </a>
            </div>

            <div class="card-body">
                <?php if (!empty($listMovies) && is_array($listMovies)) { ?>
                    <table class="table" id="moviesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên phim</th>
                                <th>Thời lượng</th>
                                <th>Poster</th>
                                <th>Trailer</th>
                                <th>Thể loại</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listMovies as $index => $movie) { ?>
                                <tr class="movieRow">
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $movie['movie_name'] ?></td>
                                    <td><?= $movie['duration'] ?> phút</td>
                                    <td>
                                        <img src="<?= BASE_URL . $movie['poster'] ?>" style="width: 100px;" alt="Poster"
                                            onerror="this.onerror=null; this.src='https://i.pinimg.com/236x/02/02/3e/02023ee1ee6d1a463eff69caf78e6322.jpg'">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="openVideo('<?= $movie['trailer'] ?>')">Xem Trailer</a>
                                    </td>
                                    <td><?= $movie['genres'] ?></td>
                                    <td title="<?= $movie['description'] ?>">
                                        <?= substr($movie['description'], 0, 100) ?>...
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=suaPhim&movie_id=' . $movie['movie_id'] ?>" class="btn btn-primary" title="Sửa">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=deletePhim&movie_id=' . $movie['movie_id'] ?>" onclick="return confirm('Bạn có muốn xóa phim này không?')" class="btn btn-danger" title="Xóa">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=chiTietPhim&movie_id=' . $movie['movie_id'] ?>" class="btn btn-info" title="Chi tiết">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Phân trang -->
                    <nav class="paginationNav">
                        <ul class="pagination justify-content-center">
                            <!-- Nút phân trang sẽ được thêm vào đây qua JavaScript -->
                        </ul>
                    </nav>
                <?php } else { ?>
                    <p class="text-center">Chưa có phim nào được thêm!</p>
                <?php } ?>
            </div>
        </div>
        <!-- .animated -->
    </div>
</div>

    <div id="videoPopup" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; max-width: 800px; background-color: #000; padding: 20px; z-index: 1000;">
        <iframe id="videoFrame" width="100%" height="450" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <button onclick="closeVideo()" style="position: absolute; top: 10px; right: 10px; background-color: #fff; border: none; font-size: 18px;">X</button>
    </div>



    <div id="overlay" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 999;"></div>

    <script>
        function openVideo(trailerUrl) {
            // Sử dụng URL embed đúng định dạng
            var embedUrl = trailerUrl.replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", "https://www.youtube.com/");
            document.getElementById('videoFrame').src = embedUrl + "?autoplay=1";
            document.getElementById('videoPopup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }


        function closeVideo() {
            document.getElementById('videoPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('videoFrame').src = ''; // Stop video when closing
        }
    </script>
    
    <?php require './views/layout/footer.php'; ?>
</div>