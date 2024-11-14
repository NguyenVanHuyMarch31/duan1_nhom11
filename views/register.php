<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - BeeFilmHub</title>
    <style>
        /* Importing Google font - Open Sans */
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap");

        :root {
            --white: #e9e9e9;
            --gray: #333;
            --blue: #0367a6;
            --lightblue: #008997;
            --button-radius: 0.7rem;
            font-size: 16px;
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, #175d69 23%, #330c43 95%);
            /* background-image: url('https://i.pinimg.com/originals/c7/f8/8f/c7f88f7ad16442235485c45a5fac0ea4.gif'); */
            /* background-size: cover; */
            /* background-position: center; */
            color: var(--white);
        }

        .container {
            background-color: var(--white);
            border-radius: var(--button-radius);
            box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
                0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--gray);
        }

        .container h2 {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .input {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 0.9rem;
            margin: 0.5rem 0;
            width: 100%;
            border-radius: var(--button-radius);
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


        .btn:hover {
            background-color: var(--lightblue);
        }

        .login-link {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--blue);
            text-decoration: none;
            transition: color 0.2s;
        }

        .login-link:hover {
            color: var(--lightblue);
        }

        .back-button {
            color: var(--blue);
            font-weight: bold;
            margin-bottom: 1rem;
            text-decoration: none;
            align-self: flex-start;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="?act=trangchu" class="back-button">Quay lại</a>

        <h2>Đăng ký</h2>
        <form action="<?= BASE_URL . '?act=dangky' ?>" method="post" onsubmit="return validateSignUpForm()">
            <input class="input" type="text" placeholder="Tên đăng nhập" name="username" id="ten_dang_nhap" />
            <input class="input" type="email" placeholder="Email" name="email" id="email" />
            <input class="input" type="password" placeholder="Mật khẩu" name="password" id="mat_khau" />
            <button class="btn" type="submit">Đăng ký</button>
        </form>

        <a class="login-link" href="?act=login">Đã có tài khoản? Đăng nhập</a>
    </div>
    <script>
        function validateSignUpForm() {
            var tenDangNhap = document.getElementById('ten_dang_nhap').value;
            var email = document.getElementById('email').value;
            var matKhau = document.getElementById('mat_khau').value;

            if (tenDangNhap.trim() === "") {
                alert("Tên đăng nhập không được để trống.");
                return false;
            }

            if (email.trim() === "") {
                alert("Email không được để trống.");
                return false;
            }

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                alert("Vui lòng nhập một địa chỉ email hợp lệ.");
                return false;
            }

            if (matKhau.trim() === "") {
                alert("Mật khẩu không được để trống.");
                return false;
            }

            if (matKhau.length < 6) {
                alert("Mật khẩu phải có ít nhất 6 ký tự.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>