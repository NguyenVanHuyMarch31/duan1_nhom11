<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <h1>Quản lí tin tức - <?= $news['title'] ?></h1>

                <hr>
                <div class="container">
                    <div class="news-article">
                        <p><strong>Ngày phát hành:</strong> <?= $news['publish_date'] ?></p>
                        <p><strong>Tác giả:</strong> <?= $news['author'] ?></p>

                        <figure>
                            <img src="<?= BASE_URL . $news['thumbnail'] ?>"
                                style="width: 500px; height: 500px;"
                                alt="<?= $news['title'] ?? 'Hình ảnh bài viết' ?>"
                                onerror="this.onerror=null; this.src='https://i.pinimg.com/474x/8b/ec/ad/8becad61ee85c3c02b460bddf5ba7905.jpg'">
                        </figure>

                        <details>
                            <summary>Tóm tắt nội dung</summary>
                            <p contenteditable="true"><?= $news['content'] ?></p>
                        </details>

                    </div>
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