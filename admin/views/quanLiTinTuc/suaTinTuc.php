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
            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sửa Tin Tức</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo BASE_URL_ADMIN . '?act=editTintuc'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="news_id" value="<?= $news['news_id'] ?>">
                                <!-- Title -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="title" class="form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="title" name="title" placeholder="Viết tiêu đề vào đây" class="form-control" value="<?= $news['title'] ?>">
                                        <?php if (isset($_SESSION['error']['title'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['title'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Author -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="author" class="form-control-label">Tác giả</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="author" name="author" placeholder="BeeFilmHub Team" class="form-control" value="<?= $news['author'] ?>">
                                        <?php if (isset($_SESSION['error']['author'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['author'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Publish Date -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_date" class="form-control-label">Ngày nhập</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="publish_date" name="publish_date" class="form-control" value="<?= $news['publish_date'] ?>">
                                        <?php if (isset($_SESSION['error']['ngay_nhap'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Thumbnail -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="thumbnail" class="form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="thumbnail" name="thumbnail" class="form-control-file">
                                        <?php if (isset($_SESSION['error']['thumbnail'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['thumbnail'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class="form-control-label">Nội dung</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="content" id="content" rows="9" placeholder="Nội dung ..." class="form-control"><?= $news['content'] ?></textarea>
                                        <?php if (isset($_SESSION['error']['content'])): ?>
                                            <p class="text-danger"><?= $_SESSION['error']['content'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>

                            </form>
                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="error-messages">
                                    <?php foreach ($_SESSION['error'] as $message): ?>
                                        <p><?= $message ?></p>
                                    <?php endforeach; ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /#right-panel -->

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <script>
            // Khởi tạo TinyMCE
            tinymce.init({
                selector: '#content', // Chỉ định textarea sẽ được chuyển thành trình soạn thảo
                plugins: 'lists link image', // Các plugin cho danh sách, liên kết, hình ảnh
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image', // Các công cụ trên thanh công cụ
                menubar: false, // Ẩn menu bar
                height: 300, // Chiều cao của trình soạn thảo
            });
        </script>
        <!-- Place the first <script> tag in your HTML's <head> -->
        <script src="https://cdn.tiny.cloud/1/bdelgtu5e4fd8c8fh1d8qj13x8qshrbjhjpbus6d3vo6gu6m/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: [
                    // Core editing features
                    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                    // Your account includes a free trial of TinyMCE premium features
                    // Try the most popular premium features until Dec 1, 2024:
                    'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
                    // Early access to document converters
                    'importword', 'exportword', 'exportpdf'
                ],
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                exportpdf_converter_options: {
                    'format': 'Letter',
                    'margin_top': '1in',
                    'margin_right': '1in',
                    'margin_bottom': '1in',
                    'margin_left': '1in'
                },
                exportword_converter_options: {
                    'document': {
                        'size': 'Letter'
                    }
                },
                importword_converter_options: {
                    'formatting': {
                        'styles': 'inline',
                        'resets': 'inline',
                        'defaults': 'inline',
                    }
                },
            });
        </script>

</body>

</html>