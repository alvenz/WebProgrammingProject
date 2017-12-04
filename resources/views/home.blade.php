<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{asset("/css/style.css")}}">
        <title>Home</title>
    </head>
    <body>
    @include('header')
    <div class="contentContainer">
        <div class="contentHead">
            <h2>Lowest Price Game</h2>
        </div>
        @for($i=0; $i<3; $i++)
            <tr>
                <td><img widht="100px" height="100px" src="{{asset('uploads/'.$products[$i]->picture)}}"></td><br>
                <td>{{ $products[$i]->name }}</td><br>
                <td>{{ $products[$i]->price }}</td><br>
            </tr>
        @endfor
    </div>
    @include('footer')
    </body>
</html>
