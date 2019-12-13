<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ asset('') }}">
    <link rel="shortcut icon" href="{{ asset('client_assets/img/favicon.png') }}" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 40%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 710px;
            width: 100%;
            text-align: center;
            padding: 0px 15px;
            line-height: 1.4;
        }

        .notfound .notfound-404 {
            height: 100px;
        }

        .notfound .notfound-404 h3 {
            font-family: 'Fredoka One', cursive;
            font-size: 100px;
            margin: 0;
            color: #ff508e;
            text-transform: uppercase;
            font-weight: lighter;
        }

        .notfound h2 {
            font-family:  sans-serif;
            font-size: 22px;
            font-weight: 400;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 10px;
        }

        .notfound-search {
            position: relative;
            padding-right: 123px;
            max-width: 420px;
            width: 100%;
            margin: 30px auto 22px;
        }

        .notfound-search input {
            font-family: 'Raleway', sans-serif;
            width: 100%;
            height: 40px;
            padding: 3px 15px;
            color: #222;
            font-size: 18px;
            background: #f8fafb;
            border: 1px solid rgba(34, 34, 34, 0.2);
            border-radius: 3px;
        }

        .notfound-search button {
            font-family: 'Raleway', sans-serif;
            position: absolute;
            right: 0px;
            top: 0px;
            width: 120px;
            height: 40px;
            text-align: center;
            border: none;
            background: #ff508e;
            cursor: pointer;
            padding: 0;
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            border-radius: 3px;
        }

        .notfound a {
            font-family: 'Raleway', sans-serif;
            display: inline-block;
            font-weight: 700;
            border-radius: 15px;
            text-decoration: none;
            color: #39b1cb;
        }

        .notfound a > .arrow {
            position: relative;
            top: -2px;
            border: solid #39b1cb;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
            -webkit-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            transform: rotate(135deg);
        }

        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 122px;
                line-height: 122px;
            }

            .notfound .notfound-404 h3 {
                font-size: 122px;
            }
        }

    </style>

</head>

<body>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h3>404</h3>
        </div>
        <h2>Lỗi , Không tìm thấy trang !!</h2>
        <a href="/"><span class="arrow"></span>Trờ về trang chủ</a>
    </div>
</div>
</body>
</html>
