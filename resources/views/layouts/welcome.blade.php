<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{route('index')}}">@lang('main.all_products')</a></li>
                <li @routeactive('categor*')><a href="{{route('categories')}}">@lang('main.categories')</a>
                </li>
                <li @routeactive('basket*') ><a href="{{route('basket')}}">@lang('main.cart')</a></li>
                @admin
                <li><a href="{{route('reset')}}">@lang('main.reset_project')</a></li>
                @endadmin
                <li><a href="{{ route('lang',  __('main.set_lang')) }}">@lang('main.set_lang')</a></li>

{{--                <li class="dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">₽<span class="caret"></span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>--}}
{{--                        <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>--}}
{{--                        <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
            @guest()
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}">@lang('main.login')</a></li>
                    <li><a href="{{route('register')}}">@lang('main.register')</a></li>
                </ul>
            @endguest
            @auth()
                <ul class="nav navbar-nav navbar-right">
                @admin
                        <li><a href="{{route('home')}}">@lang('main.admin_panel')</a></li>
                    @else
                        <li><a href="{{route('order.index')}}">@lang('main.my_orders')</a></li>
                @endadmin


                        <li><a href="{{route('get-logout')}}">@lang('main.logout')</a></li>
                </ul>
            @endauth
        </div>
    </div>
</nav>



<div class="container">
    <div class="starter-template">
        @if (session()->has('success'))
            <p class="alert alert-success">{{session()->get('success') }}</p>
        @endif
            @if (session()->has('warning'))
                <p class="alert alert-warning">{{session()->get('warning') }}</p>
            @endif

        @yield('content')
    </div>
</div>
</body>
</html>
