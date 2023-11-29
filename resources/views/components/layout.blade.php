<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            background: white;
            color: #222222;
            max-width: 600px;
            margin: auto;
            font-family: sans-serif;
        }
        p {
            line-height: 1.7;
        }
        article + article {
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid #c5c5c5;
        }
    </style>
</head>
<body>
    {{ $slot }}
</body>
</html>
