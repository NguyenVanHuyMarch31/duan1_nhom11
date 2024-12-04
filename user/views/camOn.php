<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm Ơn Bạn Đã Thanh Toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 900px;
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

        .payment-success {
            text-align: center;
            margin-top: 30px;
        }

        .payment-success .icon {
            font-size: 80px;
            color: #28a745;
        }

        .payment-success h2 {
            color: #333;
        }

        .payment-success p {
            font-size: 1.1em;
            color: #555;
        }

        footer {
            text-align: center;
            font-size: 0.9em;
            color: #777;
            margin-top: 40px;
        }

        .btn-back {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 1.2em;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1 class="display-4">Cảm Ơn Bạn Đã Thanh Toán!</h1>
            <p class="lead">Chúng tôi đã nhận được thanh toán của bạn và sẽ xử lý đơn hàng ngay lập tức.</p>
        </div>

        <!-- Success Message -->
        <div class="payment-success">
            <div class="icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <h2>Thanh Toán Thành Công!</h2>
            <p>Cảm ơn bạn đã hoàn tất thanh toán. Vé của bạn sẽ được gửi qua email trong thời gian sớm nhất.</p>
            <p>Bạn có thể kiểm tra lại thông tin vé trong mục "Lịch sử đơn hàng" của chúng tôi.</p>

            <!-- Button to go back or continue shopping -->
            <a href="http://localhost/duan1_nhom11/user/" class="btn-back">Quay lại trang chủ</a>
        </div>

        <!-- Footer -->
        <footer>
            <p>Chúc bạn có một trải nghiệm tuyệt vời tại rạp! <br> <a href="">Điều khoản sử dụng</a></p>
        </footer>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
