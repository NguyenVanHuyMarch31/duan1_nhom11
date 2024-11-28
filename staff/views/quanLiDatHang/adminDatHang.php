<?php require './views/layout/header.php' ?>
<?php require './views/layout/sidebar.php' ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php' ?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <h3>Quản lí danh sách đặt hàng</h3>
            <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Danh sách Đặt vé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td span {
            font-weight: bold;
        }

        .paid {
            color: green;
        }

        .unpaid {
            color: red;
        }

        /* Thêm hiệu ứng khi hover vào hàng */
        tr:hover {
            background-color: #e0e0e0;
        }

        /* Cải tiến bảng cho di động */
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <h1>Danh sách Đặt vé Xem Phim</h1>

    <table>
        <thead>
            <tr>
                <th>ID Đặt vé</th>
                <th>Tên Khách hàng</th>
                <th>Ghế Đặt</th>
                <th>Phòng Chiếu</th>
                <th>Ngày Đặt</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nguyễn Văn A</td>
                <td>A1</td>
                <td>Phòng 1</td>
                <td>21-11-2024 14:30</td>
                <td><span class="paid">Đã Thanh Toán</span></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Trần Thị B</td>
                <td>B2</td>
                <td>Phòng 2</td>
                <td>21-11-2024 15:00</td>
                <td><span class="unpaid">Chưa Thanh Toán</span></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Phan Minh C</td>
                <td>C3</td>
                <td>Phòng 3</td>
                <td>21-11-2024 16:00</td>
                <td><span class="paid">Đã Thanh Toán</span></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Vũ Thi D</td>
                <td>D4</td>
                <td>Phòng 1</td>
                <td>21-11-2024 17:00</td>
                <td><span class="unpaid">Chưa Thanh Toán</span></td>
            </tr>
        </tbody>
    </table>

</body>
</html>


        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <?php require './views/layout/footer.php' ?>