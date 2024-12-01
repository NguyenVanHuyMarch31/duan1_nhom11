<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
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

        /* Form chính */
        .form-container {
            background-color: #fff;
            padding: 30px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1030px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tiêu đề */
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h1 {
            font-size: 26px;
            font-weight: bold;
            color: #444;
            margin-bottom: 8px;
        }

        .form-header p {
            font-size: 14px;
            color: #888;
        }

        /* Nhóm input */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 6px rgba(255, 107, 107, 0.5);
            outline: none;
        }

        /* Nút submit */
        .form-group input[type="submit"] {
            background-color: #ff6b6b;
            color: white;
            font-size: 18px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #e63946;
            transform: translateY(-2px);
        }

        /* Thông báo lỗi */
        .error-message {
            font-size: 14px;
            background-color: #ff6b6b;
            color: white;
            padding: 8px 12px;
            border-radius: 12px;
            position: absolute;
            top: 100%;
            left: 0;
            transform: translateY(8px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        }

        .error-message:before {
            content: "";
            position: absolute;
            top: -8px;
            left: 20px;
            border-width: 8px;
            border-style: solid;
            border-color: transparent transparent #ff6b6b transparent;
        }

        .form-group.error .error-message {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Thông báo thành công */
        .success-message {
            font-size: 16px;
            background-color: #4caf50;
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            text-align: center;
            display: none;
            margin-bottom: 16px;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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
        <div class="form-container">
        <!-- Thông báo thành công -->
        <div class="success-message" id="success-message">
            Mật khẩu đã được thay đổi thành công!
        </div>

        <!-- Tiêu đề -->
        <div class="form-header">
            <h1>Đổi mật khẩu</h1>
            <p>Hãy nhập thông tin để thay đổi mật khẩu của bạn.</p>
        </div>

        <!-- Form -->
        <form id="password-form" action="path-to-action" method="POST">
            <!-- Mật khẩu hiện tại -->
            <div class="form-group" id="current-password-group">
                <label for="current-password">Mật khẩu hiện tại</label>
                <input type="password" id="current-password" name="current-password" placeholder="Nhập mật khẩu hiện tại">
                <div class="error-message">Vui lòng nhập mật khẩu hiện tại</div>
            </div>
            <br><br>

            <!-- Mật khẩu mới -->
            <div class="form-group" id="new-password-group">
                <label for="new-password">Mật khẩu mới</label>
                <input type="password" id="new-password" name="new-password" placeholder="Nhập mật khẩu mới">
                <div class="error-message">Mật khẩu mới phải ít nhất 6 ký tự</div>
            </div>

            <br><br>
            <!-- Xác nhận mật khẩu -->
            <div class="form-group" id="confirm-password-group">
                <label for="confirm-password">Xác nhận mật khẩu mới</label>
                <input type="password" id="confirm-password" name="confirm-password"
                    placeholder="Nhập lại mật khẩu mới">
                <div class="error-message">Mật khẩu xác nhận không khớp</div>
            </div>
            <br><br>
            <!-- Nút submit -->
            <div class="form-group">
                <input type="submit" value="Đổi mật khẩu">
            </div>
        </form>
    </div>

            <div class="footer" style="text-align: center;">
                <p>© 2024 BFH - Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
    </div>
    <script>
        // Validate form
        document.getElementById("password-form").addEventListener("submit", function (e) {
            let valid = true;

            // Lấy các trường nhập
            const currentPassword = document.getElementById("current-password");
            const newPassword = document.getElementById("new-password");
            const confirmPassword = document.getElementById("confirm-password");

            // Các nhóm input
            const currentPasswordGroup = document.getElementById("current-password-group");
            const newPasswordGroup = document.getElementById("new-password-group");
            const confirmPasswordGroup = document.getElementById("confirm-password-group");

            // Reset lỗi
            currentPasswordGroup.classList.remove("error");
            newPasswordGroup.classList.remove("error");
            confirmPasswordGroup.classList.remove("error");

            // Kiểm tra mật khẩu hiện tại
            if (!currentPassword.value) {
                currentPasswordGroup.classList.add("error");
                valid = false;
            }

            // Kiểm tra mật khẩu mới
            if (newPassword.value.length < 6) {
                newPasswordGroup.classList.add("error");
                valid = false;
            }

            // Kiểm tra xác nhận mật khẩu
            if (newPassword.value !== confirmPassword.value) {
                confirmPasswordGroup.classList.add("error");
                valid = false;
            }

            // Hiển thị thông báo thành công
            if (valid) {
                e.preventDefault();
                document.getElementById("success-message").style.display = "block";
                setTimeout(() => {
                    document.getElementById("password-form").reset();
                }, 2000);
            } else {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>
