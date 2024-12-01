<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Đặt Vé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 30px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #1a1a1a;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        .sidebar h2 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #b8b8b8;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a:hover {
            color: #fff;
            background-color: #ff2d2d;
            padding-left: 10px;
            transition: all 0.3s ease;
        }

        .sidebar ul li a.active {
            color: #fff;
            background-color: #ff2d2d;
        }

        .sidebar ul li a:before {
            content: "►";
            margin-right: 10px;
        }

        /* Content Section */
        .content {
            flex-grow: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #333;
            font-size: 32px;
            font-weight: 600;
        }

        .notification-box {
            background-color: pink;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 50%;
            padding-top: 80px;
            margin-bottom: 250px;
            text-align: center;
        }

        .notification-box h1 {
            color: #28a745;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .notification-box p {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .notification-box .btn {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .notification-box .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar (Menu) -->
        <div class="sidebar">
            <h2>TÀI KHOẢN BFH</h2>
            <?php require './views/layout/sidebar.php' ?>

        </div>

        <!-- Content Section -->
        <div class="content">
            <div class="header">
                <h1>Thông Báo Đặt Vé</h1>
            </div>
            <br><br>

            <div class="notification-box">
                <h1 class="success">Đặt Vé Thành Công</h1>
                <p>Cảm ơn bạn đã đặt vé cho bộ phim "Avengers: Endgame" vào lúc 19:00, ngày 30/11. Chúc bạn xem phim vui vẻ!</p>
                <a href="#" class="btn">Xem Thông Tin Đặt Vé</a>
            </div>

            <div class="footer">
                <p>© 2024 BFH - Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
    </div>

</body>

</html>
