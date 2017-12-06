<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        @if(Auth::check())
            <div class="navHeadLeft">
                @if(Auth::user()->role == 'Member')
                    <li>
                        <b>Orizon</b>
                    </li>
                    <li>
                        <a href="{{url('/')}}"> Home </a>
                    </li>
                    <li>
                        <a href="{{url('/store/default')}}"> Store </a>
                    </li>
                    <li>
                        <a href="{{url('/myGames/'.\Illuminate\Support\Facades\Auth::user()->id)}}"> My Games </a>
                    </li>
            </div>
            <div class="navHeadRight">
                <li>
                    <a href="{{url('/doLogout')}}"> Logout </a>
                </li>
                <li>
                    <a href="{{url('/profile')}}"> Profile </a>
                </li>
                <li>
                    <a href="{{url('/myCart/'.\Illuminate\Support\Facades\Auth::user()->id)}}"> Cart </a>
                </li>
                Hi, {{Auth::user()->name}}
            </div>
                @else
                    <div class="navHeadLeft">
                        <li>
                            <b>Orizon</b>
                        </li>
                        <li>
                            <a href="{{url('/')}}"> Home </a>
                        </li>
                        <li>
                            <a href="{{url('/manageGame')}}"> Manage Game </a>
                        </li>
                        <li>
                            <a href="{{url('/manageUser')}}"> Manage User </a>
                        </li>
                        <li>
                            <a href="{{url('/manageGenre')}}"> Manage Genre </a>
                        </li>
                    </div>
                    <div class="navHeadRight">
                        <li>
                            <a href="{{url('/doLogout')}}"> Logout </a>
                        </li>
                        <li>
                            <a href="{{url('/profile')}}"> Profile </a>
                        </li>
                        <li>
                            <a href="{{url('/viewTransactions')}}"> View Transaction </a>
                        </li>
                        Hi, {{Auth::user()->role}}
                    </div>
                @endif
        @else
            <div class="navHeadLeft">
                <li>
                    <b>Orizon</b>
                </li>
                <li>
                    <a href="{{url('/')}}"> Home </a>
                </li>
                <li>
                    <a href="{{url('/store/default')}}"> Store </a>
                </li>
            </div>
            <div class="navHeadRight">
                <li><a href="{{url('/login')}}"> Login </a></li>
                <li><a href="{{url('/register')}}"> Register </a></li>
            </div>
        @endif
    </div>
</body>
</html>
