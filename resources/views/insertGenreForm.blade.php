<!DOCTYPE html>
<html>
<head>
    <title>Insert Genre</title>
    @if(!Auth::check())
        <script>window.location = "/login";</script>
    @else
        @if(Auth::user()->role=='Member')
            <script>window.location = "/";</script>
        @endif
    @endif
</head>
<body>
@include('header')
<div class="contentBody">
    <h2>Insert Genre</h2>
    <div class="contentForm">
        <form action="{{url('/doInsertGenre')}}" method="post">
            {{csrf_field()}}
            <b>Genre Name : <br></b>
            <input style="width: 100%" type="text" name="txtGenreName" placeholder="Type here..."><br><br>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Insert Genre">
        </form>
    </div>
</div>
@include('footer')
</body>
</html>
