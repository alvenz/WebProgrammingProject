<!DOCTYPE html>
<html>
<head>
    <title>Update Genre</title>
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
    <h2>Update Genre</h2>
    <div class="contentForm">
        <form action="{{url('/doUpdateGenre')}}" method="post">
            {{csrf_field()}}
            <b>Genre Name : <br></b>
            <input type="hidden" name="txtOldGenreId" value="{{$data->id}}">
            <input style="width: 100%" type="text" name="txtGenreName" placeholder="Type here..." value="{{$data->genreTypeName}}"><br><br>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Update Genre">
        </form>
    </div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@include('footer')
</body>
</html>
