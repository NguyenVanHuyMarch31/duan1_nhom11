<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BFH BeeFilmHub</title>
    <style>
        /* Importing Google font - Open Sans */
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap");

        :root {
            --white: #e9e9e9;
            --gray: #333;
            --blue: #0367a6;
            --lightblue: #008997;
            --button-radius: 0.7rem;
            --max-width: 758px;
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

        /* Navbar Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to bottom, #175d69, #330c43);
            padding: 10px 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .navbar .logo a {
            font-size: 1.8rem;
            text-decoration: none;
            color: #fff;
        }

        .navbar .links {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 35px;
        }

        .navbar .links a {
            font-weight: 500;
            text-decoration: none;
            color: #fff;
            padding: 10px 0;
            transition: 0.2s ease;
        }

        .navbar .buttons .signup {
            border: 1px solid #fff;
            padding: 10px 20px;
            border-radius: 0.375rem;
            transition: 0.2s ease;
            color: #fff;
            text-decoration: none;
        }

        /* Hamburger Menu */
        #menu-toggle {
            display: none;
        }

        #hamburger-btn {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        #hamburger-btn div {
            width: 30px;
            height: 4px;
            background: #fff;
        }

        /* Media Query for Small Screens */
        @media (max-width: 768px) {
            .navbar .links {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                right: 0;
                background: #175d69;
                padding: 20px;
                flex-direction: column;
                gap: 15px;
            }

            .navbar .links a {
                padding: 10px 0;
                font-size: 1.2rem;
            }

            #menu-toggle:checked + #hamburger-btn + .links {
                display: flex;
            }

            #hamburger-btn {
                display: flex;
            }
        }

        /* Overlay Form Container */
        .container {
            background-color: var(--white);
            border-radius: var(--button-radius);
            box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
                0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
            height: var(--max-height);
            max-width: var(--max-width);
            overflow: hidden;
            position: relative;
            width: 100%;
            display: flex;
            transition: transform 0.6s ease-in-out;
        }

        .container__form {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: var(--white);
        }

        .form h2 {
            margin-bottom: 1rem;
            color: var(--gray);
        }

        .input {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 0.9rem;
            margin: 0.5rem 0;
            width: 100%;
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
        }

        /* Overlay */
        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            background-image: url('../images/BFH.jpg');
            background-size: cover;
            background-position: center;
            height: 525px;
            width: 474px;
            background-color: var(--lightblue);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .btn-1 {
            background-image: url('https://i.pinimg.com/236x/bf/a1/30/bfa1301d8df7a2a1f8b89a7d8d44d506.jpg');
            color: var(--white);
            cursor: pointer;
            text-align: center;
            font-size: 0.9rem;
            font-weight: bold;
            padding: 16px 32px;
            border: none;
            border-radius: var(--button-radius);
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo"><a href="#">BeeFilmHub</a></div>
            <input type="checkbox" id="menu-toggle" />
            <label for="menu-toggle" id="hamburger-btn">
                <div></div>
                <div></div>
                <div></div>
            </label>
            <ul class="links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div class="buttons">
                <a href="#" class="signup">Đăng kí</a>
                <a href="#" class="signup">Đăng nhập</a>
            </div>
        </nav>
    </header>

    <div class="container" id="container">
        <div class="container__form container--signin" style="background-image: url('https://i.pinimg.com/474x/fe/3b/f3/fe3bf37f547ccdbb50617d509482ed2d.jpg');">
            <form class="form" id="sign-in-form" action="<?= BASE_URL . '?act=dangnhap' ?>" method="post">
                <h2>Đăng nhập</h2>
                <input class="input" type="text" placeholder="Tên đăng nhập" name="ten_dang_nhap"  />
                <input class="input" type="password" placeholder="Password" name="mat_khau"  />
                <button class="btn">Đăng nhập</button>
            </form>
        </div>
        <div class="container__form container--signup" style="background-image: url('https://i.pinimg.com/474x/fe/3b/f3/fe3bf37f547ccdbb50617d509482ed2d.jpg');">
            <form class="form" id="sign-up-form" action="<?= BASE_URL . '?act=dangky' ?>" method="post">
                <h2>Đăng kí</h2>
                <input class="input" type="text" placeholder="Username" name="ten_dang_nhap"  />
                <input class="input" type="email" placeholder="Email" name="email"  />
                <input class="input" type="password" placeholder="Password" name="mat_khau"  />
                <button class="btn">Đăng kí</button>
            </form>
        </div>
        <div class="overlay-container">
            <button class="btn-1" id="switch-button">Đăng kí</button>
        </div>
    </div>

    <script>
        const switchButton = document.getElementById('switch-button');
        const container = document.getElementById('container');

        switchButton.onclick = toggleForm;

        function toggleForm() {
            container.classList.toggle('right-panel-active');
            switchButton.textContent = container.classList.contains('right-panel-active') ? 'Đăng nhập' : 'Đăng kí';
        }
    </script>
</body>
</html>
