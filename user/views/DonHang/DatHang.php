<?php require './views/layoutVe/header.php'; ?>

<body>
    <div class="container">
        <h1>Đặt Vé Xem Phim</h1>

        <!-- Thông tin phim -->
        <div class="info-film" style="display: flex; align-items: flex-start; gap: 20px;">
            <div style="flex: 7; text-align: left;">
                <h2>Thông Tin Phim</h2>
                <p><strong>Phim:</strong> <?= ($movie['movie_name']) ?></p>
                <p><strong>Mô tả:</strong> <?= ($movie['description']) ?></p>
            </div>
            <div style="flex: 3; text-align: center;">
                <img src="<?= (BASE_URL . $movie['poster']) ?>" alt="Poster Phim" style="max-width: 100%; height: 200px; border-radius: 10px;">
            </div>
        </div>

        <form action="<?= BASE_URL_USER . '?act=postDatVe' ?>" method="post" id="booking-form">
            <input type="hidden" name="movie_id" value="<?= $movie_id ?>"><?= $movie['movie_name'] ?> <!-- Chọn suất chiếu -->
            <h3>Chọn Suất Chiếu</h3>
            <select name="showtime_id" id="showtime" onchange="updateSeats()">
                <option value="">Chọn Suất Chiếu</option>
                <?php foreach ($showtimes as $showtime): ?>
                    <option value="<?= $showtime['showtime_id'] ?>" <?= isset($selected_showtime_id) && $selected_showtime_id == $showtime['showtime_id'] ? 'selected' : '' ?>>
                        <?= ($showtime['start_time']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php if (!empty($cinema_rooms)): ?>
                <!-- Chọn phòng chiếu -->
                <h3>Chọn Phòng Chiếu</h3>
                <select name="cinema_room_id" id="cinema-room" onchange="updateSeats()">
                    <option value="">Chọn Phòng Chiếu</option>
                    <?php foreach ($cinema_rooms as $room): ?>
                        <option value="<?= $room['id_cinema_room'] ?>" <?= isset($selected_cinema_room_id) && $selected_cinema_room_id == $room['id_cinema_room'] ? 'selected' : '' ?>>
                            <?= ($room['room_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <?php if (!empty($cinema_rooms)): ?>
                <!-- Chọn phòng chiếu -->
                <h3>Chọn Ghế</h3>

                        <select name="seat_id[]" id="cinema-room" class="form-control" multiple>
                            <?php foreach ($seats as $seat): ?>
                                <option value="<?= ($seat['id_seat']) ?>"
                                    <?= $seat['status'] == 'Đã đặt' ? 'disabled' : ''; ?>
                                    <?= $seat['status'] == 'Ghế đã chọn' ? 'disabled' : ''; ?>>
                                    <?= ($seat['seat_name']) ?>
                                    <?php if ($seat['status'] == 'Đã đặt') echo '(Đã đặt)';
                                    elseif ($seat['status'] == 'Ghế đã chọn') echo '(Ghế đã chọn)';
                                    ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    
            <?php else: ?>
                <p>Không có phòng chiếu hoặc ghế nào khả dụng.</p>
            <?php endif; ?>


            <?php if (!empty($seats)): ?>
                <!-- Chọn ghế -->
                <h3>Chọn Ghế</h3>
                <div class="screen-container">
                    <div class="screen">Màn hình</div>
                </div>
                <div class="seats-container" id="seats-container">
                    <?php foreach ($seats as $seat): ?>
                        <div class="seat
                            <?= ($seat['status'] == 'unavailable') ? 'unavailable' : '' ?>
                            <?= ($seat['seat_type_id'] == 2) ? 'yellow' : '' ?>
                            <?= ($seat['seat_type_id'] == 1) ? 'pink' : '' ?>
                            <?= ($seat['seat_type_id'] == 3) ? 'red' : '' ?>
                            <?= ($seat['status'] == 'booked') ? 'booked' : '' ?>"
                            data-seat-id="<?= $seat['id_seat'] ?>"
                            data-seat-name="<?= ($seat['seat_name']) ?>"
                            data-row="<?= ($seat['seat_row']) ?>"
                            data-column="<?= ($seat['seat_column']) ?>">
                            <input type="checkbox" name="selected_seats[]" value="<?= $seat['id_seat'] ?>" class="seat-checkbox"
                                <?= ($seat['status'] == 'unavailable' || $seat['status'] == 'booked') ? 'disabled' : '' ?>>
                            <label><?= ($seat['seat_name']) ?></label>
                            <?php if ($seat['status'] == 'Đã đặt'): ?>❌
                            <?php elseif ($seat['status'] == 'Ghế trống'): ?>🪑
                        <?php else: ?>
                            ✔️
                        <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ghế legend -->
                <div class="seats-legend">
                    <h4>Ghi chú</h4>
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

            <button class="confirm-btn" type="submit">Xác Nhận Chọn Ghế</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Cinema Booking. Tất cả các quyền được bảo lưu.</p>
    </footer>

    <script>
        function updateSeats() {
            const selectedShowtime = document.getElementById("showtime").value;
            const selectedRoom = document.getElementById("cinema-room").value;

            // Disable all seats initially
            const seats = document.querySelectorAll('.seat');
            seats.forEach(seat => {
                const checkbox = seat.querySelector('.seat-checkbox');
                checkbox.disabled = true;
                checkbox.checked = false;
                seat.classList.remove('selected');
            });

            // If both showtime and room are selected, enable available seats
            if (selectedShowtime && selectedRoom) {
                seats.forEach(seat => {
                    if (!seat.classList.contains('unavailable') && !seat.classList.contains('booked')) {
                        const checkbox = seat.querySelector('.seat-checkbox');
                        checkbox.disabled = false; // Enable checkbox for available seats
                        checkbox.checked = true; // Mark the seat as selected by default
                        seat.classList.add('selected');
                    }
                });
            }
        }
    </script>
</body>

</html>