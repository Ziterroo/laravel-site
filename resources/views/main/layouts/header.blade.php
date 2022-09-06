<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    {{--    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />--}}
    {{--    <!-- Custom Theme files -->--}}
    {{--    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />--}}
    {{--    <!-- Custom Theme files -->--}}
    {{--    <script src="js/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="{{ asset('public/assets/main/css/main.css') }}">
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="TecNews Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <style>
        .navigation .is-invalid {
            border: 1px solid #ff0000;
        }
    </style>
</head>
<body>
<!-- header-section-starts -->
<div class="header" @if(isset($post) && !request()->is('single/' . $post->slug)) style="margin-bottom: 2em" @endif>
    <div class="container">
        <div class="logo">
            <a href="{{ route('home') }}"><h1>TecNews</h1></a>
        </div>

        <div class="pages">
            <ul>
                <li><a href="{{ route('home') }}">Главаная</a></li>
                <li><a href="{{ route('categories.single', ['slug' => 'telefony']) }}">Телефоны</a></li>
                <li><a href="{{ route('categories.single', ['slug' => 'apple']) }}">Apple</a></li>
                <li><a href="{{ route('categories.single', ['slug' => 'slivy']) }}">Инсайды</a></li>
            </ul>
        </div>

        <div class="navigation">
            <form action="{{ route('search') }}" class="form-inline" method="get">
                <label for="search"></label>
                <input type="text" name="s" class="form-control @error('s') is-invalid @enderror" id="search" placeholder="Найти новость" required>
                <input type="submit" value="Search" class="btn btn-info">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
