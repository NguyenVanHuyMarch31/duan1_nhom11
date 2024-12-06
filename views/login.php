<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BeeFilmHub</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap");

        :root {
            --white: #e9e9e9;
            --gray: #333;
            --blue: #0367a6;
            --button-radius: 0.7rem;
            --max-width: 400px;
            --max-height: 450px;
            font-size: 16px;
            font-family: "Open Sans", sans-serif;
        }

        body {
            height: 100vh;
            display: grid;
            place-items: center;
            margin: 0;
            background: linear-gradient(to bottom, #175d69 23%, #330c43 95%);
        }

        .container {
            background-color: var(--white);
            border-radius: var(--button-radius);
            box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
                0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
            width: var(--max-width);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container h2 {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .input-group {
            width: 100%;
            margin-bottom: 1rem;
        }

        .input {
            width: 100%;
            padding: 0.9rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .input.error {
            border-color: red;
        }

        .error-message {
            color: red;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .btn {
            width: 100%;
            padding: 0.9rem;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background-image: url('https://i.pinimg.com/originals/f5/f2/74/f5f27448c036af645c27467c789ad759.gif');
            border: none;
            border-radius: var(--button-radius);
            cursor: pointer;
            text-align: center;
        }

        .signup-link,
        .back-button {
            color: var(--blue);
            text-decoration: none;
            font-weight: 500;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="?act=trangchu" class="back-button">↩️Quay lại</a>
        <h2>Đăng nhập</h2>

        <form id="login-form" action="http://localhost/duan1_nhom11/?act=login" method="POST" onsubmit="validateSignInForm(event)">
            <div class="input-group">
                <label for="ten_dang_nhap" class="input-label">Tên đăng nhập</label>
                <input class="input" type="text" placeholder="Nhập tên đăng nhập" name="username" id="ten_dang_nhap">
                <div id="username-error" class="error-message"></div>
            </div>

            <div class="input-group">
                <label for="mat_khau" class="input-label">Mật khẩu</label>
                <input class="input" type="password" placeholder="Nhập mật khẩu" name="password" id="mat_khau">
                <div id="password-error" class="error-message"></div>
            </div>

            <button class="btn" type="submit">Đăng nhập</button>
        </form>

        Chưa có tài khoản?
        <a href="?act=formRegister" class="signup-link">Đăng ký</a>
    </div>

    <script>
        function validateSignInForm(event) {
            event.preventDefault();

            const usernameField = document.getElementById('ten_dang_nhap');
            const passwordField = document.getElementById('mat_khau');
            const usernameError = document.getElementById('username-error');
            const passwordError = document.getElementById('password-error');

            let valid = true;

            usernameError.innerText = '';
            passwordError.innerText = '';
            usernameField.classList.remove('error');
            passwordField.classList.remove('error');

            if (usernameField.value.trim() === '') {
                valid = false;
                usernameError.innerText = 'Tên đăng nhập không được để trống.';
                usernameField.classList.add('error');
            }

            if (passwordField.value.trim() === '') {
                valid = false;
                passwordError.innerText = 'Mật khẩu không được để trống.';
                passwordField.classList.add('error');
            }

            if (valid) {
                document.getElementById('login-form').submit();
            }
        }
    </script>
</body>

</html>
