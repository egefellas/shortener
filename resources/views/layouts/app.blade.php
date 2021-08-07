<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            margin:0;
            padding:0;
        }
        .navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        .navbar li {
            float: left;
            border-right:1px solid #bbb;
        }
        .navbar li:last-child {
            border-right: none;
        }
        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 15px 16px;
            text-decoration: none;
        }
        .navbar li a:hover:not(.active) {
            background-color: #111;
        }
        .active {
            background-color: #04AA6D;
        }
    </style>
    @stack('styles')
</head>
<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
@stack('scripts')
</body>
</html>
