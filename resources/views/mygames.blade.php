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
    @include('header')
    <div class="contentContainer">
        <div class="contentHead">
            <h2>My Games</h2>
        </div>
        @for($i=0; $i<count($mygames); $i++)
            <tr>
                <td><img widht="100px" height="100px" src="{{asset('uploads/'.$mygames[$i]->games->picture)}}"></td>
                <td>{{ $mygames[$i]->games->name }}</td>
                <td></td><br>
            </tr>
        @endfor
        @for($i = 0; $i < $mygames->lastPage(); $i++)
            <a href="{{url($mygames->url($i+1))}}">{{ $i+1 }}</a>
        @endfor
    </div>
    @include('footer')
</body>
</html>
