<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL', 'http://localhost/duan1_nhom11');
define('BASE_URL_ADMIN'       , 'http://localhost/duan1_nhom11/admin/');
define('BASE_URL_STAFF'       , 'http://localhost/duan1_nhom11/staff/');
define('BASE_URL_USER'       , 'http://localhost/duan1_nhom11/user/');


define('UPLOAD_PATH', './uploads/');
define('UPLOAD_URL', BASE_URL . './uploads/'); 
define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duan1_nhom11');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
