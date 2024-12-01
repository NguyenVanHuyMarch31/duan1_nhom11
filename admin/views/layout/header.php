<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HHC - BFH Bee Film Hub</title>
    <meta name="description" content="Ela Admin - Mẫu quản trị HTML5">
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: rgba(235, 195, 52, 0.2);
        }

        .container {
            margin: 0 auto;
            max-width: 1300px;
            padding: 30px 20px;
            padding-top: 60px;
        }

        .container .center {
            text-align: center;
        }

        .center h1 {
            font-size: 36px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .our-team-text {
            margin: 0 auto;
            max-width: 700px;
            line-height: 1.8;
            color: #888;
            margin-bottom: 40px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 30px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card img {
            height: 100px;
            width: 100px;
            object-fit: cover;
            border-radius: 1%;
            margin-bottom: 30px;
        }

        .card .card-name {
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 24px;
        }

        .card .card-text {
            font-size: 16px;
            color: #888;
            margin-bottom: 40px;
        }

        .card .btn {
            padding: 15px 60px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            border-radius: 50px;
            text-decoration: none;
            color: #000;
            transition: 0.3s ease;
        }

        .card .btn:hover {
            box-shadow: -2px -2px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        @media screen and (max-width: 700px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }

        .movie-details-container {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .movie-title {
            font-size: 2rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .movie-info {
            display: flex;
            justify-content: space-between;
        }

        .movie-info-left {
            width: 40%;
        }

        .movie-info-right {
            width: 55%;
        }

        .poster-img {
            max-width: 100%;
            border-radius: 8px;
        }

        .movie-details-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .movie-info-left {
            flex: 1;
            padding-right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f8f8f8;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            padding: 20px;
            margin-bottom: 20px;
        }

        .movie-poster {
            position: relative;
            cursor: pointer;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .poster-img {
            transition: transform 0.3s ease, filter 0.3s ease;
            width: 100%;
            border-radius: 10px;
        }

        .movie-poster:hover .poster-img {
            transform: scale(1.05);
            filter: brightness(1.2);
        }

        .movie-description {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: justify;
        }

        .movie-description h3 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #333;
        }

        .movie-info-right {
            flex: 1;
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 800px;
        }

        .movie-info-right p {
            font-size: 1rem;
            margin-bottom: 15px;
            color: #555;
        }

        .movie-info-right strong {
            color: #333;
        }

        .btn.btn-trailer {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .btn.btn-trailer:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        #videoPopup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 10px;
            z-index: 9999;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 9998;
        }

        .popup-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #333;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Cải thiện giao diện bảng */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #495057;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        /* Nút nhóm */
        .btn-group {
            display: flex;
            gap: 10px;
        }

        /* Nút chính (Sửa và Xóa) */
        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        /* Tiêu đề phòng */
        h3 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        /* Chỉnh sửa không gian */
        .content {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Cải thiện layout */
        .table-stats {
            margin-top: 20px;
        }

        hr {
            border: 0;
            height: 5px;
            background-image: url('https://i.pinimg.com/originals/89/8a/14/898a14d06c6c0bf27b8ceaf749cecb4c.gif');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 20px 0;
        }

        /* Form Container */
        .card-body {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Labels */
        .form-control-label {
            font-weight: bold;
            color: #333;
        }

        /* Inputs */
        .form-control,
        .form-control-file {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Checkboxes */
        .form-check-label {
            font-size: 14px;
            margin-left: 5px;
        }

        /* Buttons */
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }

        /* Error Messages */
        .text-danger {
            font-size: 12px;
            color: #dc3545;
        }

        .error-messages p {
            color: #dc3545;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Card Header */
        .card-header h3 {
            font-size: 20px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Checkbox Container */
        .checkbox {
            margin-bottom: 10px;
        }

        .seat-container {
            display: grid;
            grid-template-columns: repeat(10, 60px);
            gap: 10px;
            justify-content: center;
            margin-top: 30px;
            margin-left: 40px;
        }

        .seat {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .seat input[type="checkbox"] {
            display: none;
        }

        .seat label {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        .seat input[type="checkbox"]:checked+label {
            background-color: #4CAF50;
            color: white;
        }

        /* Màu sắc theo loại ghế */
        .seat.regular label {
            background-color: #ddd;
        }

        .seat.vip label {
            background-color: #FFD700;
        }

        .seat.premium label {
            background-color: #87CEEB;
        }

        /* Pop-up thông tin ghế */
        .seat-info-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 300px;
        }

        .seat-info-popup h4 {
            margin-top: 0;
        }

        .seat-info-popup button {
            margin: 5px;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .seat-info-popup button:hover {
            background-color: #45a049;
        }


        .seat-info-popup {
            display: none;
            position: absolute;
            background: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Trạng thái ghế */
        .seat.maintain {
            background-color: #6c757d;
            /* Màu xám */
            cursor: not-allowed;
        }

        .seat.selected {
            background-color: #28a745;
            /* Màu xanh lá */
        }

        .seat.not-selected {
            background-color: #dc3545;
            /* Màu đỏ */
        }

        /* Loại ghế */
        .seat.gray {
            background-color: #adb5bd;
            /* Màu xám nhạt */
        }

        .seat.green {
            background-color: #20c997;
            /* Màu xanh mint */
        }

        .seat.gold {
            background-color: #ffc107;
            /* Màu vàng sáng */
        }

        .seat.unknown {
            background-color: #6f42c1;
            /* Màu tím */
        }

        .comment {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .comment .btn {
            margin-right: 10px;
        }

        .comment-date {
            color: gray;
            font-size: 12px;
        }

        .comment-form {
            margin-bottom: 30px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .account-detail {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .account-detail p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .account-detail h4 {
            font-size: 20px;
            color: #333;
            margin-top: 20px;
        }

        .account-detail ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        .account-detail ul li {
            background-color: #f8f9fa;
            padding: 8px 12px;
            border-radius: 5px;
            margin: 5px 0;
            font-size: 14px;
        }

        .account-detail figure {
            text-align: center;
            margin-top: 20px;
        }

        .account-detail figure img {
            width: 150px;
            height: 150px;
            /* border-radius: 50%; */
            border: 3px solid #ccc;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-detail .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .account-detail .btn:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .site-footer {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .news-article {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .news-article p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .news-article p strong {
            color: #007bff;
        }

        .news-article figure {
            margin: 20px 0;
            text-align: left;
        }

        .news-article figure img {
            width: 320px;
            height: 320px;
            /* border-radius: 50%; */
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-article .badge {
            font-size: 14px;
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            margin-right: 5px;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            color: black;
            width: 125px;
            text-align: center;
            display: inline-block;
        }

        .status-da-ket-thuc {
            background-color: #dc3545;
            /* Màu đỏ */
        }

        .status-sap-chieu {
            background-color: #ffc107;
            /* Màu vàng */
            color: black;
            /* Màu chữ cho trạng thái vàng */
        }

        .status-dang-chieu {
            background-color: #28a745;
            /* Màu xanh lá */
        }

        .form-container {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="datetime-local"] {
            padding: 8px;
        }

        .form-group button {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background: #0056b3;
        }
        .order-management {
            max-width: 1200px; /* Đặt chiều rộng tối đa thành 1000px */
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Thanh tìm kiếm */
        .search-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        #search-input {
            width: 60%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        #search-input:focus {
            border-color: #007bff;
            outline: none;
        }

        #search-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #search-btn:hover {
            background-color: #0056b3;
        }

        /* Bảng danh sách đơn hàng */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .order-table th, .order-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .order-table th {
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
        }

        /* Trạng thái đơn hàng */
        .status {
            padding: 6px 12px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .status.pending {
            background-color: #f0ad4e;
            color: white;
        }

        .status.confirmed {
            background-color: #28a745;
            color: white;
        }

        .status.canceled {
            background-color: #dc3545;
            color: white;
        }

        /* Nút hành động */
        button {
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .view-btn {
            background-color: #17a2b8;
            color: white;
        }

        .view-btn:hover {
            background-color: #138496;
        }

        .confirm-btn {
            background-color: #28a745;
            color: white;
        }

        .confirm-btn:hover {
            background-color: #218838;
        }

        .cancel-btn {
            background-color: #dc3545;
            color: white;
        }

        .cancel-btn:hover {
            background-color: #c82333;
        }

        /* Hiệu ứng hover cho các hàng */
        .order-table tr:hover {
            background-color: #f8f9fa;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #search-input {
                width: 45%;
            }

            .order-table th, .order-table td {
                font-size: 14px;
            }
        }
         /* Bảng danh sách vé */
         .ticket-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        .ticket-table th, .ticket-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .ticket-table th {
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
        }

        .ticket-table tr:hover {
            background-color: #f8f9fa;
        }

        .action-btn {
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .view-btn {
            background-color: #17a2b8;
            color: white;
        }

        .view-btn:hover {
            background-color: #138496;
        }

        .edit-btn {
            background-color: #ffc107;
            color: white;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
        .details-section {
            margin-bottom: 30px;
        }
        .details-section h3 {
            color: #007bff;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .details-table th, .details-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .details-table th {
            background-color: #f1f1f1;
        }
        .total-price {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            margin: 10px 0;
        }
        .btn-print {
            background-color: #28a745;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>

</head>