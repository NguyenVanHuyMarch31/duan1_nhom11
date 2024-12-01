<ul>
                <li><a href="<?= BASE_URL_USER . '?act=thongTinTaiKhoan&id=' . $_SESSION['user']['id_account']; ?>" >Thông Tin Chung</a></li>
                <li><a href="<?= BASE_URL_USER . '?act=suaTaiKhoan&id=' . $_SESSION['user']['id_account']; ?>">Sửa thông tin tài khoản</a></li>
                <li><a href="<?= BASE_URL_USER . '?act=lichSuDatVe&id=' . $_SESSION['user']['id_account']; ?>">Lịch Sử Giao Dịch</a></li>
                <li><a href="<?= BASE_URL_USER . '?act=doiMatKhau&id=' . $_SESSION['user']['id_account']; ?>">Đổi mật khẩu</a></li>
                <li><a href="<?= BASE_URL_USER . '?act=thongbao&id=' . $_SESSION['user']['id_account']; ?>">Thông báo</a></li>

                <li><a href="<?= BASE_URL_USER . '?act=/' ?>">Trang chủ</a></li>
                <!-- <li><a href="#">Chức năng</a></li>
                <li><a href="#">Chức năng</a></li> -->
            </ul>