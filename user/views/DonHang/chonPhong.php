<?php require './views/layoutVe/header.php'; ?>

<body>
    <div class="container">
        <h1>Đặt Vé Xem Phim</h1>

        <!-- Thông tin phim -->
        <div class="info-film" style="display: flex; align-items: flex-start; gap: 20px;">
            <div style="flex: 7; text-align: left;">
                <h2>Thông Tin Phim</h2>
                <p><strong>Phim:</strong> <?= htmlspecialchars($movie['movie_name']) ?></p>
                <p><strong>Mô tả:</strong> <?= htmlspecialchars($movie['description']) ?></p>
            </div>
            <div style="flex: 3; text-align: center;">
                <img src="<?= htmlspecialchars(BASE_URL_USER . $movie['poster']) ?>" alt="Poster Phim" style="max-width: 100%; height: 200px; border-radius: 10px;">
            </div>
        </div>

        <form action="<?= BASE_URL_USER . '?act=chonPhong' ?>" method="post">

            <!-- Chọn suất chiếu -->
            <h3>Chọn Suất Chiếu</h3>
            <select name="showtime_id" id="showtime" onchange="this.form.submit()">
                <option value="">Chọn Suất Chiếu</option>
                <?php foreach ($showtimes as $showtime): ?>
                    <option value="<?= $showtime['showtime_id'] ?>" <?= isset($selected_showtime_id) && $selected_showtime_id == $showtime['showtime_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($showtime['start_time'] . " - " . $showtime['room_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php if (isset($selected_showtime_id)): ?>
                <div class="selected-showtime">
                    <h3>Thông Tin Suất Chiếu Đã Chọn:</h3>
                    <p><strong>Suất chiếu:</strong> <?= htmlspecialchars($selected_showtime['start_time']) ?> - <?= htmlspecialchars($selected_showtime['room_name']) ?></p>
                </div>
            <?php endif; ?>

            <button class="confirm-btn" type="submit">Xác Nhận Chọn Suất Chiếu</button>
        </form>

    </div>

    <footer>
        <p>&copy; 2024 Cinema Booking. Tất cả các quyền được bảo lưu.</p>
    </footer>

</body>
</html>
