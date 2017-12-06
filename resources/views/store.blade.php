<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <title>Store</title>
</head>
<body>
    @include('header')
    <div class="contentContainer">
        <div class="contentHead">
            <h2>Browse</h2>
        </div>
        <div class="contentLeftBody">
            <form action="{{ url('/store') }}" method = "get">
                <input type="text" name ="doSearching">
                <input type="submit" value="Search">
            </form>
            Genres
            @foreach($genres->all() as $genre)
                <li><a href="{{url('/store/'.$genre->id.'$doSearching='.$search)}}">{{$genre->genreTypeName}}</a></li>
            @endforeach
        </div>
        <div class="contentMiddleBody">
            @for($i=0; $i<count($products); $i++)
                <tr>
                    <td><img widht="100px" height="100px" src="{{asset('uploads/'.$products[$i]->picture)}}"></td>
                    <td>{{ $products[$i]->name }}</td>
                    <td>{{ $products[$i]->price }}</td>
                    @if(Auth::check())
                        @if(Auth::user()->role == 'Member')
                            <a href="{{url('store/gamesDetail/'.$products[$i]->id)}}">Show Game Detail</a>
                            <a href="{{url('/addToCart/'.$products[$i]->id)}}"><input type="button" value="Add to Cart"></a><br>
                        @endif
                    @else
                        <br>
                    @endif
                </tr>
            @endfor
            @for($i = 0; $i < $products->lastPage(); $i++)
                <a href="{{url($products->url($i+1).'&doSearching='.$search)}}">{{ $i+1 }}</a>
            @endfor
        </div>
    </div>
    @include('footer')
</body>
</html>
