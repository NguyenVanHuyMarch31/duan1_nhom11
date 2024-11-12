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
            --font-family: "Open Sans", sans-serif;
            --font-size: 16px;
            --bg-color: #fff;
            font-size: var(--font-size);
            font-family: var(--font-family);
        }

        body {
            height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            background: var(--bg-color);
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
            color: pink;
        }

        .navbar .logo img {
            width: 100%;
            max-width: 270px;
            height: auto;
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
            padding: 10px;
            border-radius: 10%;
            background-color: linear-gradient(to bottom, #175d69, #330c43);
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
            background: linear-gradient(to bottom, #175d69, #330c43);
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

            #menu-toggle:checked+#hamburger-btn+.links {
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
            box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25), 0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
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
            <div class="logo">
                <a href="?act=trangchu">
                    <img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t1.15752-9/462568801_601351862462540_8090446170272868322_n.png?_nc_cat=101&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeG3WeBtPV6KnC_8c9sG66zt_btnVtBznh79u2dW0HOeHvmWv3csFmmqauUGviv9bo7QPUc9mlUJGw54c9G1bdh9&_nc_ohc=L-xGH3BEF_IQ7kNvgGRcio7&_nc_zt=23&_nc_ht=scontent.fhan14-1.fna&_nc_gid=AWe5PMv4-06Hq-5DfwJPpNn&oh=03_Q7cD1QFTZGnONi4PVUdgmUhAPSU2y5gzq7RjqxIVBpg8MZ_Xiw&oe=674F1083" alt="BeeFilmHub Logo" />

                </a>
            </div>
            <input type="checkbox" id="menu-toggle" />
            <ul class="links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div class="buttons">
                <a href="?act=register" id="signup-button" class="signup">Đăng kí</a>
                <a href="?act=login" id="signin-button" class="signup">Đăng nhập</a>
            </div>
        </nav>
    </header>
    <div class="container">
        
    </div>


</body>

</html>