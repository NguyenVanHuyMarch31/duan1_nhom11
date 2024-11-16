<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - BeeFilmHub</title>
    <style>
        /* Importing Google font - Open Sans */
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap");

        :root {
            --white: #e9e9e9;
            --gray: #333;
            --blue: #0367a6;
            --lightblue: #008997;
            --button-radius: 0.7rem;
            --max-width: 400px;
            --max-height: 420px;
            font-size: 16px;
            font-family: "Open Sans", sans-serif;
        }

        body {
            height: 100vh;
            width: 100%;
            margin: 0;
            display: grid;
            place-items: center;
            background: linear-gradient(to bottom, #175d69 23%, #330c43 95%);
        }

        .container {
            background-color: var(--white);
            border-radius: var(--button-radius);
            box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
                0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
            height: var(--max-height);
            width: var(--max-width);
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 2rem;
        }

        .container h2 {
            margin-bottom: 1rem;
            color: var(--gray);
        }

        .input {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 0.9rem;
            margin: 0.5rem 0;
            width: 100%;
            border-radius: 5%;
        }

        .input.error {
            border-color: red;
        }

            .input-group{
                width: 357px;
            }
        .btn {
            background-image: url('https://i.pinimg.com/originals/f5/f2/74/f5f27448c036af645c27467c789ad759.gif');
            color: var(--white);
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
            padding: 0.9rem 2rem;
            margin-top: 1rem;
            border: none;
            border-radius: var(--button-radius);
            width: 100%;
        }

        .signup-link {
            margin-top: 1rem;
            color: var(--blue);
            text-decoration: none;
            font-weight: 500;
        }

        .back-button {
            color: var(--blue);
            font-weight: bold;
            margin-bottom: 1rem;
            text-decoration: none;
            align-self: flex-start;
        }

        .error-message {
            color: red;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

    </style>
</head>

<body>

    <div class="container">
        <a href="?act=trangchu" class="back-button">↩️Quay lại</a>
        <h2>Đăng nhập</h2>

        <form id="sign-in-form" action="<?= BASE_URL . '?act=dangnhap' ?>" method="post" onsubmit="return validateSignInForm(event)">
            <div class="input-group">
                <input class="input" type="text" placeholder="Tên đăng nhập" name="username" id="ten_dang_nhap" />
                <div id="username-error" class="error-message"></div>
            </div>

            <div class="input-group">
                <input class="input" type="password" placeholder="Mật khẩu" name="password" id="mat_khau" />
                <div id="password-error" class="error-message"></div>
            </div>

            <button class="btn" type="submit">Đăng nhập</button>
        </form>

        <a href="?act=register" class="signup-link">Chưa có tài khoản? Đăng ký</a>
    </div>

    <script>
        function validateSignInForm(event) {
            event.preventDefault();

            document.getElementById('username-error').innerText = '';
            document.getElementById('password-error').innerText = '';
            document.getElementById('ten_dang_nhap').classList.remove('error');
            document.getElementById('mat_khau').classList.remove('error');

            var valid = true;
            var tenDangNhap = document.getElementById('ten_dang_nhap').value;
            var matKhau = document.getElementById('mat_khau').value;

            if (tenDangNhap.trim() === "") {
                valid = false;
                document.getElementById('username-error').innerText = "Tên đăng nhập không được để trống.";
                document.getElementById('ten_dang_nhap').classList.add('error');
            }

            if (matKhau.trim() === "") {
                valid = false;
                document.getElementById('password-error').innerText = "Mật khẩu không được để trống.";
                document.getElementById('mat_khau').classList.add('error');
            }

            if (valid) {
                document.getElementById('sign-in-form').submit();
            }
        }
    </script>

</body>

</html>
