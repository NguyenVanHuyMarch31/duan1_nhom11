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

        .footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-top: 40px;
        }

        /* Content Section */
        .content {
            flex-grow: 1;
            background-color: #ffffff;
            padding: 30px;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #ff2d2d;
            outline: none;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group button {
            background-color: #ff2d2d;
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #e02424;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-top: 40px;
        }

        .form-group img {
            margin-top: 10px;
            border-radius: 5px;
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
                <h1>Sửa thông tin tài khoản</h1>
            </div>

            <!-- Form for editing account info -->
            <?php if (isset($account)): ?>
                <form action="<?= BASE_URL_USER . '?act=postTaiKhoan' ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_account" value="<?= $account['id_account'] ?>">

                    <div class="form-group">
                        <label for="username">Tên Đăng Nhập</label>
                        <input type="text" id="username" name="username" value="<?= $account['username'] ?>" required >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= $account['email'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="full_name">Họ và Tên</label>
                        <input type="text" id="full_name" name="full_name" value="<?= $account['full_name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="birth_date">Ngày Sinh</label>
                        <input type="date" id="birth_date" name="birth_date" value="<?= $account['birth_date'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Giới Tính</label>
                        <select id="gender" name="gender" required>
                            <option value="Nam" <?= $account['gender'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                            <option value="Nữ" <?= $account['gender'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                            <option value="Khác" <?= $account['gender'] == 'Khác' ? 'selected' : '' ?>>Khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Ảnh Đại Diện</label>
                        <input type="file" id="thumbnail" name="thumbnail">
                        <img id="imgPreview" src="<?= !empty($account['thumbnail']) ? $account['thumbnail'] : 'default-avatar.png' ?>" alt="Thumbnail" style="max-width: 100px; height: auto; display: <?= !empty($account['thumbnail']) ? 'block' : 'none' ?>;">
                    </div>

                    <div class="form-group">
                        <label for="address">Địa Chỉ</label>
                        <input type="text" id="address" name="address" value="<?= $account['address'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="text" id="phone" name="phone" value="<?= $account['phone'] ?>" required pattern="^\d{10}$" title="Số điện thoại phải gồm 10 chữ số">
                    </div>

                    <button type="submit">Cập Nhật Thông Tin</button>
                </form>
            <?php else: ?>
                <p>Không tìm thấy tài khoản.</p>
            <?php endif; ?>

            <div class="footer">
                <p>© 2024 BFH - Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
    </div>

</body>

</html>