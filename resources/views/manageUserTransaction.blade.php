<!DOCTYPE html>
<html>
<head>
    <title>Manage User Transaction</title>
</head>
<body>
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
            <h2>Manage User Transaction</h2>
        </div>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Transaction Date</th>
            <th colspan="1">Action</th><br>
        </tr>
        @for($i=0; $i<count($transactions); $i++)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{ $transactions[$i]->getUserId->name }}</td>
                <td>{{ $transactions[$i]->transactionDate }}</td>
                <td><a href="{{url('/doDeleteTransaction/'.$transactions[$i]->id)}}">Delete</a></td><br>
            </tr>
        @endfor
    </div>
@include('footer')
</body>
</html>
