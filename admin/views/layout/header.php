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
    </style>

</head>