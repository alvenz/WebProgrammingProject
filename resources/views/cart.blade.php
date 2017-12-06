<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
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
            <h2>Shopping Cart</h2>
        </div>
        Your Order Details<br>
        <tr>
            {{$totalQty = 0, $totalPrice = 0, $sessionCartId = 0}}
            @for($i=0; $i<count($carts); $i++)
                <div class="contentLeftBody">
                    <tr>
                        <td><img widht="100px" height="100px" src="{{asset('uploads/'.$carts[$i]->carts->picture)}}"></td><br>
                        <td>{{$carts[$i]->carts->name }}</td><br>
                        <td>Rp. {{$carts[$i]->carts->price }} (x{{$carts[$i]->qty}})</td><br>
                        <td>Pc/Mac Download</td><br>
                        <td><a href="{{url('/doDeleteCart/'.$carts[$i]->id)}}"><input type="button" value="Delete From Cart"></a></td><br>
                    </tr>
                </div>
                {{$totalPrice += $carts[$i]->carts->price * $carts[$i]->qty}}
                {{$totalQty+=$carts[$i]->qty}}
                {{$sessionCartId = $carts[$i]->cartId}}
            @endfor
        </tr>
        <div class="contentMiddleBody">
            <form action="{{url('/doCheckOut/'.$sessionCartId)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{$totalQty}} Item in Your cart Rp. {{$totalPrice}} <br><br><br><br>
                Total Rp. {{$totalPrice}}<br>
                <input type="hidden" name="txtPrice" value="{{$totalPrice}}">
                <input type="submit" value="Check Out">
            </form>
        </div>

    </div>
    @include('footer')
</body>
</html>
