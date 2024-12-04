<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Vé Xem Phim</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1c1c1c;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background: #2d2d2d;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2.5rem;
            color: #e50914;
        }

        h2 {
            font-size: 1.8rem;
            color: #f9a825;
        }

        .info-film {
            text-align: center;
            margin-bottom: 30px;
        }

        .info-film p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .select-showtime {
            margin: 20px 0;
        }

        label {
            font-size: 1.2rem;
            margin-right: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #555;
            border-radius: 5px;
            background: #333;
            color: #fff;
            margin: 10px 0;
            outline: none;
        }

        select:focus {
            border-color: #e50914;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background-color: #e50914;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #b00710;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9rem;
            color: #bbb;
        }

        .select-container {
            margin-bottom: 30px;
        }

        .button-group-wrapper {
            display: flex;
            align-items: center;
            overflow-x: auto;
            gap: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .button-group-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .button-group-wrapper::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .button-group {
            display: flex;

            gap: 15px;
        }

        .button-group button {
            flex: 0 0 auto;
            padding: 12px 20px;
            background: #e50914;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .button-group button:hover {
            background: #b00710;
            transform: translateY(-3px);
        }

        .button-group button:active {
            transform: translateY(1px);
            box-shadow: none;
        }

        .button-group button:disabled {
            background: #ddd;
            cursor: not-allowed;
        }

        .button-group-wrapper {
            max-width: calc(3 * (158px + 10px));
        }

        .button-group button {
            width: 150px;
        }

        /* Ẩn phần chọn thời gian khi chưa chọn ngày */
        .time-select-container {
            display: none;
        }

        /* Style for the buttons */
        .date-time-button {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            display: inline-block;
        }

        /* Style for button on hover */
        .date-time-button:hover {
            background-color: #ddd;
        }

        /* Style for button when it is focused (clicked or tabbed into) */
        .date-time-button:focus {
            background-color: #007BFF;
            color: white;
            border: 1px solid #0056b3;
            outline: none;
        }

        /* Style for button when it is active (clicked but not yet released) */
        .date-time-button:active {
            background-color: #0056b3;
            color: white;
            border: 1px solid #003f8f;
        }

        /* Optional: Add a visual effect for 'selected' button by using :focus */
        .date-time-button.selected {
            background-color: #007BFF;
            color: white;
            border: 1px solid #0056b3;
        }

        .seats-container {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 10px;
            width: 82%;
            margin-left: 100px;
            margin-bottom: 20px;
        }

        .seat {
            position: relative;
            padding: 3px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            font-size: 10px;
        }

        .seat.unavailable {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .seat-checkbox {
            display: none;
            color: #1c1c1c;
        }

        .seat label {
            font-size: 16px;
            text-align: center;
        }

        .seat-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 25px;
            color: green;
            display: none;
        }

        .seat-checkbox:checked+label+.seat-icon {
            display: block;
            background-color: #003f8f;
            /* Hiển thị biểu tượng khi ghế được chọn */
        }

        .seat.yellow {
            background-color: yellow;
        }

        .seat.pink {
            background-color: pink;
        }

        .seat.red {
            background-color: green;
        }

        .seat:hover {
            opacity: 0.8;
            background-color: #0056b3;
        }

        .seat-checkbox:checked+label {
            font-weight: bold;
            color: #007BFF;
        }



        .seats-legend {
            background-color: gray;
            padding: 20px;
            border-radius: 8px;
            margin-left: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* max-width: 500px; */
            width: 55%;
            text-align: center;
        }

        .seats-legend h4 {
            text-align: center;
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .legend-container {

            display: flex;
            justify-content: space-between;

            margin-bottom: 10px;
        }

        /* Các phần tử loại ghế và trạng thái ghế */
        .legend-item {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #444;
        }

        .legend-item p {
            margin: 0;
        }

        /* Thêm màu nền thay cho biểu tượng */
        .seat-color {
            width: 24px;
            height: 24px;
            margin-right: 10px;
            border-radius: 50%;
        }

        /* Màu sắc cho từng loại ghế */
        .yellow {
            background-color: #f1c40f;
        }

        .pink {
            background-color: #e91e63;
        }

        .red {
            background-color: green;
        }


        /* Thêm hiệu ứng hover cho từng trạng thái */
        .legend-item:hover {
            background-color: palevioletred;
            border-radius: 4px;
            cursor: pointer;
        }

        .screen-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .screen {
            position: relative;
            width: 80%;
            height: 40px;
            background: linear-gradient(180deg, #ffffff, #dcdcdc);
            /* Hiệu ứng sáng mờ */
            border-radius: 20px 20px 0 0;
            /* Bo góc phía trên */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Đổ bóng */
            text-align: center;
            line-height: 40px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            overflow: hidden;
        }

        /* Canvas giả hiệu ứng khung màn hình */
        .screen::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 10px;
            background: #999;
            border-radius: 0 0 4px 4px;
            /* Bo góc phần khung */
        }

        /* Phần khung treo màn hình */
        .screen::after {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 20px;
            background: #999;
        }

        .confirm-btn {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(45deg, #ff7f50, #ff6347);
            color: white;
            font-size: 16px;
            margin-left: 380px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0 8px 15px rgba(255, 99, 71, 0.3);
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .confirm-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s ease-in-out;
        }

        .confirm-btn:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .confirm-btn:hover {
            background: linear-gradient(45deg, #ff6347, #ff4500);
            box-shadow: 0 12px 20px rgba(255, 69, 0, 0.4);
            transform: translateY(-3px);
        }

        .confirm-btn:active {
            transform: translateY(2px);
            box-shadow: 0 6px 10px rgba(255, 69, 0, 0.2);
        }
        .seat {
    text-align: center;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
}

.seat input[type="checkbox"] {
    margin-top: 5px;
}

.seat:hover {
    background-color: #e0f7fa; /* Màu nền khi hover */
}

.seat input[type="checkbox"]:checked {
    background-color: #4caf50; /* Màu nền khi chọn */
}

    </style>
</head>