<!DOCTYPE html>
<html>
<head>
    <title>Manage Games</title>
</head>
@if(!Auth::check())
    <script>window.location = "/login";</script>
@else
    @if(Auth::user()->role=='Member')
        <script>window.location = "/login";</script>
    @endif
@endif
<body>
    @include('header')
    <div class="contentContainer">
        <div class="contentHead">
            <h2>Manage Games</h2>
        </div>
        <a href="{{url('/insertGame')}}">+ Add New Games</a><br><br>
        <tr>
            <th>#</th>
            <th>Game Name</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Release Date</th>
            <th>Picture</th>
            <th colspan="2">Action</th><br>
        </tr>
        @for($i=0; $i<count($products); $i++)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{ $products[$i]->name }}</td>
                <td>{{ $products[$i]->genre }}</td>
                <td>{{ $products[$i]->price }}</td>
                <td>{{ $products[$i]->release_date }}</td>
                <td>{{ $products[$i]->picture }}</td>
                <td><a href="{{url('/doDeleteGame/'.$products[$i]->id)}}">Delete</a></td>
                <td><a href="{{url('/updateGame/'.$products[$i]->id)}}">Edit</a></td><br>
            </tr>
        @endfor
    </div>
    @include('footer')
</body>
</html>
