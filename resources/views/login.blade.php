<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
@if(Auth::check())
    return redirect('/');
@else
<body>
    @include('header')
        <div class="contentBody">
            <h2>Login</h2>
            <div class="contentForm">
                <form action="{{url('/doLogin')}}" method="post">
                    {{csrf_field()}}
                    <b>Email Address<br></b>
                    <input style="width: 100%" type="text" name="txtEmail" placeholder="name@example.com"><br><br>
                    <b>Password<br></b>
                    <input style="width: 100%" type="password" name="txtPassword" placeholder="password"><br><br>
                    <input type="checkbox" name="rememberMe"><b>Remember me</b><br><br>
                    <input style="background-color: dodgerblue; color:white" type="submit" value="Login">
                </form>
            </div>
        </div>
    @include('footer')
</body>
@endif
</html>
