<!DOCTYPE html>
<html>
<head>
    <title>Update Game</title>
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
    <h2>Update Game</h2>
    <div class="contentForm">
        <form action="{{url('/doUpdateGame')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="txtOldGameId" value="{{$data->id}}">
            <b>Game Name : <br></b>
            <input style="width: 100%" type="text" name="txtGameName" placeholder="Type here..." value="{{$data->name}}"><br><br>
            <b>Price : <br></b>
            <input style="width: 100%" type="text" name="txtPrice" placeholder="Type here..." value="{{$data->price}}"><br><br>
            <b>Release Date : <br></b>
            <input style="width: 100%" type="text" name="txtRd" placeholder="MM/DD/YYYY" value="{{$data->release_date}}"><br><br>
            <b>Genre : <br></b>
            <input style="width: 100%" type="text" name="txtGenre" placeholder="Type here..." value="{{$data->genreType->genreTypeName}}"><br><br>
            <b>Picture<br></b>
            <input type="file" name="fileUpload"><br><br>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Update Game">
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
