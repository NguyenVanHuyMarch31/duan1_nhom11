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

        <!-- Form đặt vé -->
        <form action="" method="POST">
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

            <!-- Chọn phòng chiếu -->
            <?php if (!empty($cinema_rooms)): ?>
                <h3>Chọn Phòng Chiếu</h3>
                <select name="cinema_room_id" id="cinema_room" onchange="this.form.submit()">
                    <option value="">Chọn Phòng Chiếu</option>
                    <?php foreach ($cinema_rooms as $room): ?>
                        <option value="<?= $room['id_cinema_room'] ?>" <?= isset($selected_cinema_room_id) && $selected_cinema_room_id == $room['id_cinema_room'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($room['room_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <?php if (!empty($seats)): ?>
                <h3>Chọn Ghế</h3>
                <div class="screen-container">
                    <div class="screen">Màn hình</div>
                </div>
                <div class="seats-container">
                    <?php foreach ($seats as $seat): ?>
                        <div class="seat 
                    <?= ($seat['status'] == 'unavailable') ? 'unavailable' : '' ?> 
                    <?= ($seat['seat_type_id'] == 2) ? 'yellow' : '' ?>
                    <?= ($seat['seat_type_id'] == 1) ? 'pink' : '' ?>
                    <?= ($seat['seat_type_id'] == 3) ? 'red' : '' ?>
                    <?= ($seat['status'] == 'booked') ? 'booked' : '' ?>"
                    type="<?= $seat['ticket_price'] ?>
                            data-seat-id="<?= $seat['id_seat'] ?>"
                            data-seat-name="<?= htmlspecialchars($seat['seat_name']) ?>"
                            data-row="<?= htmlspecialchars($seat['seat_row']) ?>"
                            data-column="<?= htmlspecialchars($seat['seat_column']) ?>">
                            <input type="checkbox" name="selected_seats[]" value="<?= $seat['id_seat'] ?>" class="seat-checkbox">
                            <label><?= htmlspecialchars($seat['seat_name']) ?></label>
                            <?php if ($seat['status'] == 'Đã đặt'): ?>❌
                            <?php elseif ($seat['status'] == 'Ghế trống'): ?>🪑
                        <?php else: ?>
                            ✔️
                        <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="seats-legend">
                    <h4>Ghi chú</h4>
                    <!-- Căn chỉnh loại ghế bên phải và trạng thái ghế bên trái -->
                    <div class="legend-container">
                        <div class="legend-item">
                            <span class="seat-color yellow"></span> Ghế Vip
                        </div>
                        <div class="legend-item">
                        ✔️ Ghế đã chọn
                        </div>
                    </div>
                    <div class="legend-container">
                        <div class="legend-item">
                            <span class="seat-color pink"></span> Ghế thường
                        </div>
                        <div class="legend-item">
                            ❌ Ghế đã đặt
                        </div>
                    </div>
                    <div class="legend-container">
                        <div class="legend-item">
                            <span class="seat-color red"></span> Ghế Premium
                        </div>
                        <div class="legend-item">
                            🪑 Ghế trống
                        </div>
                    </div>
                </div>
            <?php endif; ?>

<br><br>

            <!-- Nút xác nhận -->
<button class="confirm-btn" type="submit">Xác Nhận Chọn Ghế</button>

        </form>
    </div>

    <footer>
        <p>&copy; 2024 Cinema Booking. Tất cả các quyền được bảo lưu.</p>
    </footer>
    <script>
        document.querySelectorAll('.seat').forEach(function(seat) {
            seat.addEventListener('click', function() {
                if (seat.classList.contains('unavailable')) {
                    return; // Không cho phép chọn ghế đã hết
                }

                const checkbox = seat.querySelector('.seat-checkbox');
                if (checkbox.checked) {
                    seat.classList.remove('selected');
                    checkbox.checked = false;
                } else {
                    seat.classList.add('selected');
                    checkbox.checked = true;
                }
            });
        });
    </script>

</body>

</html>