<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Vé Xem Phim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
        }

        .container {
            display: flex;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .left,
        .right {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .left {
            flex: 3;
        }

        .right {
            flex: 2;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            margin-bottom: 10px;
        }

        .screen-selection select,
        button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
            display: block;
            cursor: pointer;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
        }

        button:hover {
            background: #0056b3;
        }

        .payment-methods,
        .bill-info {
            margin-top: 20px;
        }

        .payment-option {
            margin-right: 20px;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
        }

        .payment-option:hover {
            background: #218838;
        }

        .payment-option.selected {
            background: #ffcc00;
            color: black;
        }

        .screen {
            height: 35px;
            margin: 20px auto;
            background: linear-gradient(90deg, #ffcccc, #ff9999);
            text-align: center;
            line-height: 35px;
            font-weight: bold;
            color: #333;
            width: 80%;
            border-radius: 8px;
            box-shadow: inset 0 -2px 4px rgba(0, 0, 0, 0.1);
        }



        .seats {
            display: flex;
            gap: 5px;
        }

        .seat {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            position: relative;
            /* Để tạo các lớp phủ */
            color: #fff;
        }

        /* Loại ghế */
        .seat.vip {
            background-color: #d4af37;
            /* Màu vàng cho VIP */
        }

        .seat.regular {
            background-color: #007bff;
            /* Màu xanh cho Regular */
        }

        .seat.deluxe {
            background-color: #8e44ad;
            /* Màu tím cho Deluxe */
        }

        /* Trạng thái ghế */
        .seat.available::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.4);
            /* Lớp phủ làm nhạt màu */
            z-index: 1;
            border: 2px solid green;
            /* Viền xanh cho ghế trống */
            border-radius: 5px;
        }

        .seat.selected::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 123, 255, 0.4);
            /* Màu xanh nhạt phủ */
            z-index: 1;
            border: 2px solid blue;
            /* Viền xanh đậm */
            border-radius: 5px;
        }

        .seat.booked::after {
            content: "X";
            /* Ký hiệu ghế đã đặt */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            font-weight: bold;
            color: red;
            z-index: 2;
        }

        /* Thêm hiệu ứng hover */
        .seat:hover {
            filter: brightness(0.8);
        }


        /* Căn chỉnh cơ bản */
        .seat-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Thông tin trạng thái và loại ghế */
        .seat-info {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
            background-color: pink;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 900px;
        }

        .seat-status,
        .seat-type {
            flex: 1;
            min-width: 300px;
            margin-bottom: 20px;
        }

        .seat-status h4,
        .seat-type h4 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .seat-item {
            display: flex;
            align-items: center;
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Căn chỉnh cơ bản cho khung ghế */
        .seat-item .seat-box {
            width: 30px;
            height: 30px;
            margin-right: 15px;
            border-radius: 8px;
            text-align: center;
            line-height: 30px;
            position: relative;
            background-color: #e0e0e0;
            /* Màu nền mặc định */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Loại ghế - ưu tiên trước */
        .seat-item .seat-box.vip {
            background-color: #f39c12;
            /* Màu vàng cho ghế VIP */
        }

        .seat-item .seat-box.regular {
            background-color: #6c757d;
            /* Màu xám cho ghế Regular */
        }

        .seat-item .seat-box.deluxe {
            background-color: #17a2b8;
            /* Màu xanh dương cho ghế Deluxe */
        }

        /* Trạng thái ghế trống */
        .seat-item .seat-box.available {
            background-color: transparent;
            /* Giữ nền trong suốt */
            border: 2px solid #28a745;
            /* Viền xanh cho ghế trống */
        }

        /* Trạng thái ghế đã chọn */
        .seat-item .seat-box.selected {
            background-color: transparent;
            /* Giữ nền trong suốt */
            border: 2px solid #007bff;
            /* Viền xanh lam cho ghế đã chọn */
        }

        /* Trạng thái ghế đã đặt */
        .seat-item .seat-box.booked {
            background-color: #dc3545;
            /* Màu nền đỏ cho ghế đã đặt */
            border: 2px solid #dc3545;
            /* Viền đỏ cho ghế đã đặt */
            color: #fff;
        }

        /* Ký hiệu X cho ghế đã đặt */
        .seat-item .seat-box.booked::after {
            content: "X";
            /* Ký tự X cho ghế đã đặt */
            font-weight: bold;
            font-size: 14px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Thêm hiệu ứng hover */
        .seat-item .seat-box:hover {
            filter: brightness(0.8);
        }

        /* Hiển thị thông tin trạng thái ghế và loại ghế */
        .seat-info {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
            background-color: pink;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 900px;
        }

        .seat-status,
        .seat-type {
            flex: 1;
            min-width: 300px;
            margin-bottom: 20px;
        }

        .seat-status h4,
        .seat-type h4 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .seat-item {
            display: flex;
            align-items: center;
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Phần bên trái -->
        <div class="left">
            <!-- Thông tin phim -->
            <div class="section movie-info">
                <h2>Thông Tin Phim</h2>
                <p id="movie-title">Phim: <?= $movie_details['movie_name'] ?></p>
                <p id="movie-genre">Thể loại: <?= $movie_details['genre_name'] ?></p>
                <p id="movie-genre">Mô tả: <?= $movie_details['movie_description'] ?></p>
                <p id="movie-duration">Thời gian: <?= $movie_details['duration'] ?> phút</p>
            </div>
            <!-- Chọn phòng -->
            <div class="section screen-selection">
                <h2>Chọn Phòng Chiếu</h2>
                <select id="screen-select">
                    <option value="" disabled selected>Chọn phòng chiếu</option>
                    <?php foreach ($theaters as $room): ?>
                        <option value="<?= $room['id_cinema_room'] ?>"><?= $room['room_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php
            // Xử lý dữ liệu ghế
            function getSeatClass($seat)
            {
                $classes = [];

                // Loại ghế (ưu tiên trước)
                switch ($seat['seat_type_name']) {
                    case 'vip':
                        $classes[] = 'vip';
                        break;
                    case 'regular':
                        $classes[] = 'regular';
                        break;
                    case 'deluxe':
                        $classes[] = 'deluxe';
                        break;
                    default:
                        $classes[] = 'regular';
                }

                // Trạng thái ghế (sau khi loại ghế đã được xác định)
                switch ($seat['status']) {
                    case 'Ghế trống':
                        $classes[] = 'available';
                        break;
                    case 'Đã chọn':
                        $classes[] = 'selected';
                        break;
                    case 'Đã đặt':
                        $classes[] = 'booked';
                        break;
                    default:
                        $classes[] = 'available';
                }

                return implode(' ', $classes);
            }

            ?>

            <!-- Hiển thị ghế -->
            <div class="seat-group">
                <?php
                $rows = ['A', 'B', 'C', 'D', 'E']; // Các hàng ghế
                foreach ($rows as $row):
                    $seatsInRow = array_filter($seats, function ($seat) use ($row) {
                        return strpos($seat['seat_name'], $row) === 0; // Lọc ghế theo hàng
                    });
                ?>
                    <div class="seats" id="seat-container-<?= strtolower($row) ?>">
                        <?php foreach ($seatsInRow as $seat): ?>
                            <div
                                class="seat <?= getSeatClass($seat) ?>"
                                data-seat="<?= $seat['seat_name'] ?>"
                                data-price="<?= $seat['ticket_price'] ?>"
                                title="Giá: <?= number_format($seat['ticket_price'], 0, ',', '.') ?> VND">
                                <?= $seat['seat_name'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>



            <!-- Thông tin về loại ghế và trạng thái ghế -->
            <div class="seat-info">
                <div class="seat-status">
                    <h4>Trạng Thái Ghế</h4>
                    <div class="seat-item">
                        <div class="seat-box vip available">A1</div>

                        <div class="seat-box regular selected">A2</div>
                        <div class="seat-box deluxe booked">A3</div>
                    </div>
                </div>
                <div class="seat-type">
                    <h4>Loại Ghế</h4>
                    <div class="seat-item">
                        <div class="seat-box vip">VIP</div>
                        <div class="seat-box regular">Regular</div>
                        <div class="seat-box deluxe">Deluxe</div>
                    </div>
                </div>
            </div>




            <!-- Chọn suất chiếu -->
            <div class="section">
                <h2>Chọn Suất Chiếu</h2>
                <div class="schedule" id="schedule-container">
                    <!-- Các suất chiếu sẽ được thêm vào đây -->
                </div>
            </div>

            <!-- Mã giảm giá -->
            <div class="section voucher">
                <h2>Nhập Mã Giảm Giá</h2>
                <input type="text" id="voucher-code" placeholder="Nhập mã giảm giá" />
                <button id="apply-voucher-btn">Áp dụng</button>
                <p id="voucher-status">Mã giảm giá: Chưa áp dụng</p>
            </div>
        </div>

        <!-- Phần bên phải -->
        <div class="right">
            <div class="section">
                <h2>Thông Tin Hóa Đơn</h2>
                <div id="bill-info">
                    <p>Phòng chiếu: <span id="selected-screen">Chưa chọn</span></p>
                    <p>Ghế đã chọn: <span id="selected-seats">Chưa chọn</span></p>
                    <p>Suất chiếu: <span id="selected-schedule">Chưa chọn</span></p>
                    <p>Họ và Tên: <span id="user-name">Nguyễn Văn A</span></p>
                    <p>Số Điện Thoại: <span id="user-phone">0123456789</span></p>
                    <p>Địa Chỉ: <span id="user-address">Số 123, Đường ABC, TP. Hà Nội</span></p>
                    <p>Tổng tiền: <span id="total-price">0</span> VND</p>
                    <div class="payment-methods">
                        <span class="payment-option" id="payment-cash">Thanh toán bằng tiền mặt</span>
                        <span class="payment-option" id="payment-online">Thanh toán online</span>
                    </div>
                    <p id="selected-payment-method">Phương thức thanh toán: Chưa chọn</p>

                    <button id="pay-btn">Thanh Toán</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectedSeats = [];
            const seatElements = document.querySelectorAll('.seat');

            seatElements.forEach(seat => {
                seat.addEventListener('click', function() {
                    if (this.classList.contains('booked')) return; // Không chọn được ghế đã đặt

                    const seatName = this.getAttribute('data-seat');
                    const seatPrice = parseInt(this.getAttribute('data-price'), 10);

                    // Thêm hoặc bỏ chọn ghế
                    if (this.classList.contains('selected')) {
                        this.classList.remove('selected');
                        const index = selectedSeats.findIndex(s => s.name === seatName);
                        if (index > -1) selectedSeats.splice(index, 1);
                    } else {
                        this.classList.add('selected');
                        selectedSeats.push({
                            name: seatName,
                            price: seatPrice
                        });
                    }

                    // Cập nhật hóa đơn
                    updateBill(selectedSeats);
                });
            });

            function updateBill(seats) {
                const selectedSeatsElement = document.getElementById('selected-seats');
                const totalPriceElement = document.getElementById('total-price');

                const seatNames = seats.map(s => s.name).join(', ');
                const totalPrice = seats.reduce((sum, seat) => sum + seat.price, 0);

                selectedSeatsElement.textContent = seatNames || 'Chưa chọn';
                totalPriceElement.textContent = `${totalPrice.toLocaleString('vi-VN')} VND`;
            }
        });
    </script>

</body>

</html>