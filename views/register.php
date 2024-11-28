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
            flex-direction: column;
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

        .input.error {
            border-color: red;
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

        .error-message {
            color: red;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .input-group {
            width: 357px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="?act=trangchu" class="back-button">↩️Quay lại</a>

        <h2>Đăng ký</h2>
        <form id="signup-form" action="http://localhost/duan1_nhom11/?act=dangky" method="POST">
    <div class="input-group">
        <input class="input" type="text" placeholder="Tên đăng nhập" name="username" id="ten_dang_nhap" required />
        <div id="username-error" class="error-message"></div>
    </div>

    <div class="input-group">
        <input class="input" type="email" placeholder="Email" name="email" id="email" required />
        <div id="email-error" class="error-message"></div>
    </div>

    <div class="input-group">
        <input class="input" type="password" placeholder="Mật khẩu" name="password" id="mat_khau" required />
        <div id="password-error" class="error-message"></div>
    </div>

    <button class="btn" type="submit">Đăng ký</button>
</form>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        Đã có tài khoản?<a class="login-link" href="?act=formLogin"> Đăng nhập</a>



        <script>
            function validateSignUpForm(event) {
                event.preventDefault(); // Prevent form submission to handle validation

                // Clear previous error messages
                document.getElementById('username-error').innerText = '';
                document.getElementById('email-error').innerText = '';
                document.getElementById('password-error').innerText = '';
                document.getElementById('ten_dang_nhap').classList.remove('error');
                document.getElementById('email').classList.remove('error');
                document.getElementById('mat_khau').classList.remove('error');

                var valid = true;

                var tenDangNhap = document.getElementById('ten_dang_nhap').value;
                var email = document.getElementById('email').value;
                var matKhau = document.getElementById('mat_khau').value;

                if (tenDangNhap.trim() === "") {
                    valid = false;
                    document.getElementById('username-error').innerText = "Tên đăng nhập không được để trống.";
                    document.getElementById('ten_dang_nhap').classList.add('error');
                }

                if (email.trim() === "") {
                    valid = false;
                    document.getElementById('email-error').innerText = "Email không được để trống.";
                    document.getElementById('email').classList.add('error');
                } else {
                    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    if (!emailPattern.test(email)) {
                        valid = false;
                        document.getElementById('email-error').innerText = "Vui lòng nhập một địa chỉ email hợp lệ.";
                        document.getElementById('email').classList.add('error');
                    }
                }

                if (matKhau.trim() === "") {
                    valid = false;
                    document.getElementById('password-error').innerText = "Mật khẩu không được để trống.";
                    document.getElementById('mat_khau').classList.add('error');
                }

                if (matKhau.length < 6) {
                    valid = false;
                    document.getElementById('password-error').innerText = "Mật khẩu phải có ít nhất 6 ký tự.";
                    document.getElementById('mat_khau').classList.add('error');
                }

                // If everything is valid, submit the form
                if (valid) {
                    document.getElementById('signup-form').submit();
                }
            }

            // Attach the validation function to form submission
            document.getElementById('signup-form').addEventListener('submit', validateSignUpForm);
        </script>
</body>

</html>