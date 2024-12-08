<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đặt Vé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .qr-container {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 130px;
            height: 130px;
            border: 2px solid #e6e6e6;
            border-radius: 8px;
            margin-right: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 5px;
        }

        .qr-container img {
            width: 100%;
            height: 100%;
        }

        .ticket-info ul li {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px;
            margin-bottom: 12px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .ticket-info ul li span:first-child {
            font-weight: bold;
            color: #333;
        }

        .ticket-info ul li span:last-child {
            font-weight: bold;
            color: #28a745;
        }

        .payment-info .total {
            font-size: 1.5em;
            font-weight: bold;
            color: #e74c3c;
        }

        footer {
            text-align: center;
            font-size: 0.9em;
            color: #777;
            margin-top: 40px;
        }

        .payment-methods input[type="radio"] {
            margin-right: 8px;
        }

        .form-check-label {
            font-size: 1.1em;
        }

        .ticket-info h3,
        .payment-info h3 {
            font-size: 1.3em;
            margin-bottom: 15px;
            color: #333;
        }

        .btn-payment {
            background-color: #e74c3c;
            color: white;
            font-size: 1.2em;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-payment:hover {
            background-color: #c0392b;
        }

        .payment-methods {
            margin-top: 20px;
        }

        .payment-methods label {
            margin-right: 20px;
        }

        /* Cải thiện căn chỉnh cho các phần tử trong trang */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-6 {
            padding: 15px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .header p {
            font-size: 1.2rem;
            color: #777;
        }

        .ticket-info {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .ticket-info p {
            margin-bottom: 15px;
        }

        /* Cải thiện phần thanh toán */
        .payment-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .payment-methods .form-check {
            margin-bottom: 15px;
        }

        .payment-methods {
            text-align: center;
            margin-top: 20px;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .form-check-label {
            font-size: 16px;
        }

        /* Cải thiện căn chỉnh form */
        .payment-methods .form-check {
            display: inline-block;
            margin-right: 15px;
        }

    </style>
</head>

<body>

    <div class="container position-relative">
        <!-- Mã QR -->
        <div class="qr-container">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=0986690271_MBbank_BFH" alt="QR Code">
        </div>

        <form action="<?= BASE_URL_USER . '?act=camOn' ?>" method="POST">
            <!-- Header -->
            <input type="hidden" name="ticket_id" value="<?= $ticketDetails['id_ticket'] ?>">
            <input type="hidden" name="total_price" value="<?= $ticketDetails['ticket_prices'] ?>">
            <div class="header">
                <h1 class="display-4">Thông Tin Đặt Vé</h1>
                <p class="lead">Chúng tôi đã ghi nhận thông tin vé của bạn. Cảm ơn bạn đã đặt vé!</p>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <!-- Thông tin người đặt vé -->
                    <div class="ticket-info">
                        <h3 class="h5">Thông tin người đặt vé:</h3>
                        <input type="hidden" name="">
                        <p><strong>Họ tên:</strong> <?= $account['full_name'] ?></p>
                        <p><strong>Số điện thoại:</strong> <?= $account['phone'] ?></p>
                        <p><strong>Email:</strong> <?= $account['email'] ?></p>
                        <!-- <p><strong>Ngày đặt vé :</strong><?= $orderId['order_date'] ?></p> -->
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <!-- Thông tin vé -->
                    <div class="ticket-info">
                        <h3 class="h5">Thông tin vé bạn đã chọn:</h3>
                        <p><strong>Phim:</strong> <?= $ticketDetails['movie_name'] ?></p>
                        <p><strong>Suất chiếu:</strong> <?= date('H:i - d/m/Y', strtotime($ticketDetails['start_time'])) ?></p>
                        <p><strong>Phòng chiếu:</strong> <?= $ticketDetails['cinema_room_name'] ?></p>
                        <p><strong>Ghế đã chọn:</strong> <?= $ticketDetails['seat_names'] ?></p>
                    </div>
                </div>

                <!-- Thông tin thanh toán -->
                <div class="payment-info text-center mb-4">
                    <h3 class="h5">Thông tin thanh toán:</h3>
                    <p><strong>Hình thức thanh toán:</strong> Thanh toán online</p>
                    <p class="total">Tổng giá vé: <?= number_format($ticketDetails['ticket_prices'], 0, ',', '.') ?> VND</p>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="payment-methods text-center mb-8">
                    <h3 class="h5">Chọn phương thức thanh toán:</h3>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="momo" name="payment_method" value="momo">
                        <label class="form-check-label" for="momo">MoMo</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="vnpay" name="payment_method" value="vnpay">
                        <label class="form-check-label" for="vnpay">VNPay</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="cash_on_delivery" name="payment_method" value="cash_on_delivery">
                        <label class="form-check-label" for="cash_on_delivery">Thanh toán khi đến rạp</label>
                    </div>
                </div>

                <!-- Nút thanh toán -->
                <div class="d-flex mb-8">
                    <button class="btn-payment mx-auto" type="submit">Thanh Toán</button>
                </div>

            </div>
        </form>

        <!-- Liên hệ -->
        <div class="text-center mb-4">
            <p><strong>Số điện thoại liên hệ:</strong> <a href="tel:0986690271">0986690271</a></p>
        </div>
    </div>

    <footer>
        <p>Copyright © 2024. Tất cả quyền được bảo vệ.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
