<!DOCTYPE html>
<html>
<head>
    <title>My Games</title>
    @if(!Auth::check())
        <script>window.location = "/login";</script>
    @else
        @if(Auth::user()->role=='Admin')
            <script>window.location = "/";</script>
        @endif
    @endif
</head>
<body>

</body>
</html>
