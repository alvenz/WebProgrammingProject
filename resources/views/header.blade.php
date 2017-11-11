<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="navHeadLeft">
            <li>
                <b>Orizon</b>
            </li>
            <li>
                <a href="{{url('/')}}"> Home </a>
            </li>
            <li>
                <a href="{{url('/store')}}"> Store </a>
            </li>
        </div>
            @if(Auth::check())

                <div class="navHeadRight">

                </div>
            @else
                <div class="navHeadRight">
                    <li><a href="{{url('/login')}}">Login</a></li>
                    <li><a href="{{url('/register')}}">Register</a></li>
                </div>
            @endif
    </div>
</body>
</html>
