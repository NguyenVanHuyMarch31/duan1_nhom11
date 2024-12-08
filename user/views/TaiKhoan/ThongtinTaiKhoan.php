<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài Khoản CGV</title>
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

        .profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .profile-info {
            flex: 65%;
            padding-right: 30px;
        }

        .profile-info p {
            font-size: 18px;
            color: #555;
            margin: 12px 0;
            line-height: 1.6;
        }

        .profile-info p span {
            font-weight: bold;
            color: #333;
        }

        .profile-info a {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }

        .profile-info a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .profile-avatar {
            flex: 35%;
            text-align: center;
        }

        .profile-avatar img {
            border-radius: 50%;
            width: 140px;
            height: 140px;
            border: 4px solid #007bff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .update-button {
            display: block;
            width: 220px;
            margin: 30px auto;
            padding: 12px;
            background-color: #28a745;
            color: white;
            text-align: center;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .update-button:hover {
            background-color: #218838;
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
                <h1>Thông Tin Tài Khoản Người Dùng</h1>
            </div>

            <div class="profile">
                <div class="profile-info">
                    <p><span>Tên Đăng Nhập:</span><?= $account['username'] ?></p>
                    <p><span>Họ và Tên:</span><?= $account['full_name'] ?></p>
                    <p><span>Email:</span> <?= $account['email'] ?></p>
                    <p><span>Ngày Sinh:</span> <?= $account['birth_date'] ?></p>
                    <p><span>Địa Chỉ:</span> <?= $account['address'] ?></p>
                    <p><span>Giới Tính:</span> <?= $account['gender'] ?></p>
                    <p><span>Số Điện Thoại:</span><?= $account['phone'] ?></p>
                    <p><span>Chỉnh sửa tài khoản:</span> <a href="#">Chỉnh sửa thông tin</a></p>
                </div>

                <div class="profile-avatar">
                <img src="<?= BASE_URL . $account['thumbnail'] ?>" alt="<?= $account['username'] ?? 'Ảnh đại diện' ?>" onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'">

                </div>
            </div>

            <button class="update-button">Cập Nhật Thông Tin</button>

            <div class="footer">
                <p>© 2024 Nguyễn Văn Huy - Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
    </div>

</body>

</html>