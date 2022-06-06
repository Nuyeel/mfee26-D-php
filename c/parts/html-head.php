<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>轉生吉地良辰</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <style>
        .time-area,
        .news-area {
            outline: 1px solid #aaa;
            border-radius: 10px;
            overflow: hidden;
        }

        .time-area .time-title,
        .place-left .news-title {
            background-color: rgb(57, 89, 114);
            color: rgb(255, 255, 255);
        }

        .filter-section {
            background-color: rgb(203, 207, 212);
            border-radius: 10px;
        }

        #searchBtn {
            background-color: #e9ecef;
            border-color: #c3c6c8;
        }

        .place-card {
            background-color: #fff;
            border-radius: 10px;
            transition: 1s;
        }

        .place-card:hover .card-icons i {
            transform: translateY(2px);
        }

        .place-card .card-icons i {
            font-size: 28px;
            transform: translateY(10px);
            transition: 1s;
        }

        .placeCardBtn .saveBtn,
        .placeCardBtn .chooseBtn {
            font-size: 15px;
            border: none;
            color: #fff;
        }

        .placeCardBtn .saveBtn {
            background-color: #c24242;
        }

        .placeCardBtn .saveBtn:hover {
            background-color: #832a2a;
        }

        .placeCardBtn .chooseBtn {
            background-color: #2b4d8d;
        }

        .placeCardBtn .chooseBtn:hover {
            background-color: #1f3763;
        }

        .top-wrap {
            background-color: #d35202;
        }

        .top-time,
        .top-place {
            font-size: 24px;
            font-weight: bold;
            line-height: 2rem;
            text-align: center;
        }

        .top .title {
            background-color: #ccc;
        }

        .top {
            text-align: center;
            font-weight: bold;
            text-align: center;
            line-height: 1.5rem;
            height: 70%;
            border: 1px solid #555;
            border-radius: 10px;
            overflow: hidden;
        }

        .top p {
            font-size: 22px;
            margin-bottom: 0;
        }

        .top-place .country {
            font-size: 22px;
            color: #1f3763;
        }

        .top-place .city {
            font-size: 18px;
        }

        .top h4 {
            font-weight: bold;
            font-size: 24px;
            border-bottom: 1.5px solid #1f3763;
            padding: 15px 5px 8px;
            margin: 0 8px 0px;
            color: #222;
        }

        .place-info {
            text-align: center;
            background-color: #eee;
            color: #fff;
        }

        .place-info p {
            font-size: 16px;
            margin-bottom: 0;
            padding: 5px;
            color: #945808;
        }

        .place-info .remain {
            color: #c24242;
            font-weight: bold;
        }
    </style>
</head>

<body>