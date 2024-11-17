<!doctype html>

<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }

        .details-btn {
            width: calc(2 * (50px + 5px) - 5px);
        }

        .btn-group a button {
            min-width: 50px;
        }

        .span {
            max-width: 50px
        }
        
    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=quanTriTinTuc' ?>"> <i class="menu-icon fa fa-home"></i>Quản lý tin tức</a>
                    </li>

                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-video-camera"></i>Quản lý phòng phim
                        </a>
                    </li>

                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-shopping-cart"></i>Quản lý danh sách đặt vé
                        </a>
                    </li>
                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-comments"></i>Quản lý bình luận
                        </a>
                    </li>

                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-laptop"></i>Quản lý suất chiếu
                        </a>
                    </li>
                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-bar-chart-o"></i>Thống kê </a>
                    </li>
                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-film"></i>Quản lý phim
                        </a>
                    </li>
                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-sitemap"></i>Quản lý thể loại phim</a>
                    </li>
                    <li class="menu-item dropdown">
                        <a href="<?php echo BASE_URL_ADMIN . '?act=/' ?>"><i class="menu-icon fa fa-users"></i>Quản lý tài khoản</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="/duan1_Nhom11/images/logo2.png" alt="Logo" width="260px" height="40px"></a>
                    <a class="navbar-brand hidden" href="./"><img src="/duan1_Nhom11/images/logo2.png" alt="Logo1" width="100px" height="40px"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/duan1_Nhom11/images/BFH.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <h3>Quản lí tin tức</h3>
                <div class="card-header">
                    <a href="<?php echo BASE_URL_ADMIN . '?act=themTinTuc' ?>">
                        <button class="btn btn-success">Thêm mới tin tức</button>
                    </a>
                </div>
                <div class="table-stats order-table ov-h">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày nhập</th>
                <th>Tác giả</th>
                <th style="width: 100px;">Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsList as $key => $newList) { ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $newList['title'] ?></td>
                    <td><?= substr($newList['content'], 0, 100) ?>...</td>
                    <td><?= $newList['publish_date'] ?></td>
                    <td><?= $newList['author'] ?></td>
                    <td>
                        <img src="<?= BASE_URL . $newList["thumbnail"] ?>" style="width: 100px;" alt="Thumbnail"
                             onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'">
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= BASE_URL_ADMIN . '?act=suaTinTuc&news_id=' . $newList['news_id'] ?>" class="btn btn-primary">Sửa</a>
                            <a href="<?= BASE_URL_ADMIN . '?act=deleteTinTuc&news_id=' . $newList['news_id'] ?>" onclick="return confirm('Bạn có muốn xóa tin tức này không?')" class="btn btn-warning">Xóa</a>
                            <a href="<?= BASE_URL_ADMIN . '?act=chiTietTinTuc&news_id=' . $newList['news_id'] ?>" class="btn btn-info">Chi Tiết</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>BEEFILMHUB</h4>
                        <p>Cổng thông tin giải trí phim và trải nghiệm điện ảnh tốt nhất.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>&copy; 2024 BEEFILMHUB</p>
                        <p>Thiết kế bởi <a href="https://yourwebsite.com">Nhóm 11 - BFH</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

   
</body>

</html>