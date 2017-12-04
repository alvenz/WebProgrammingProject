<!DOCTYPE html>
<html>
<head>
    <title>Manage Genre</title>
</head>
@if(!Auth::check())
    <script>window.location = "/login";</script>
@else
    @if(Auth::user()->role=='Member')
        <script>window.location = "/";</script>
    @endif
@endif
<body>
@include('header')
<div class="contentContainer">
    <div class="contentHead">
        <h2>Manage Genre</h2>
    </div>
    <a href="{{url('/insertGenre')}}">+ Add New Genre</a><br><br>
    <tr>
        <th>#</th>
        <th>Genre Name</th>
        <th colspan="2">Action</th><br>
    </tr>
    @for($i=0; $i<count($genres); $i++)
        <tr>
            <td>{{$i + 1}}</td>
            <td>{{ $genres[$i]->genreTypeName }}</td>
            <td><a href="{{url('/doDeleteGenre/'.$genres[$i]->id)}}">Delete</a></td>
            <td><a href="{{url('/updateGenre/'.$genres[$i]->id)}}">Edit</a></td><br>
        </tr>
    @endfor
</div>
@include('footer')
</body>
</html>
