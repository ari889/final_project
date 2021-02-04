<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: Roboto, sans-serif, serif;
            background-color: #fff;
        }
        .logo{
            display: block;
            margin: auto;
            width: 200px;
        }
        .mail-title{
            font-size: 20px;
            font-weight: 400;
            text-align: center;
        }
        .mail-title a{
            color: #00005B;
            font-weight: 700;
            display: inline-block;
            text-decoration: none;
        }
        .message{
            font-size: 16px;
            font-width: 400;
            max-width: 700px;
            line-height: 25px;
            margin: 20px auto 0;
        }
        .response{
            padding: 10px 20px;
            background-color: #00005B;
            color: #fff !important;
            text-decoration: none;
            border: 2px solid transparent;
            margin: 20px auto 0;
            display: table;
            border-radius: 5px;
            transition: 0.3s;
        }
        .response:hover{
            border: 2px solid #00005B;
            background-color: #fff;
            color: #00005B !important;
        }
    </style>
</head>
<body>
<img src="{{URL::to('/')}}/frontend/images/logo.png" alt="" class="logo">
<h1 class="mail-title">Hi admin, <a href="mailto:{{$data['email']}}">{{$data['name']}}</a> send you a message for help.</h1>

<p class="message">{{$data['message']}}</p>

<a href="mailto:{{$data['email']}}" class="response">Response</a>
</body>
</html>
