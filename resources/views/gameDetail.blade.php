<!DOCTYPE html>
<html>
<head>
    <title>Game Detail</title>
    @if(!Auth::check())
        <script>window.location = "/login";</script>
    @endif
</head>
<body>
    @include('header')
        <div class="contentContainer">
            <div class="contentHead">
                <h2>Detail Game</h2>
            </div>
            <tr>
                @for($i=0; $i<count($games); $i++)
                    <div class="contentLeftBody">
                        <tr>
                            <td><img widht="100px" height="100px" src="{{asset('uploads/'.$games[$i]->picture)}}"></td><br>
                            <td>{{$games[$i]->name }}</td><br>
                            <td>{{$games[$i]->rating }}</td><br>
                            <td>Genre : {{$games[$i]->genreType->genreTypeName}}</td><br>
                            <td>Pc/Mac Download</td><br>
                            <td>{{$games[$i]->price}}</td><br>
                            <td><a href="{{url('/addToCart/'.$games[$i]->id)}}"><input type="button" value="Add To Cart"></a></td><br>
                        </tr>
                    </div>
                    <div class="contentMiddleBody">
                        <form action="{{url('/doRating')}}" method="post">
                            <input type="hidden" name="txtOldGamesId" value="{{$games[$i]->id}}">
                            Rate This Game<br>
                            <input type="number" name="rating" min="0" max="5"><br>
                            Rate 0 - 5<br>
                            <input type="submit" value="Rate">
                        </form>
                    </div>
                @endfor
            </tr>
        </div>
    @include('footer')
</body>
</html>
