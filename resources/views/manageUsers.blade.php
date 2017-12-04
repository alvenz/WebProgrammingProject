<!DOCTYPE html>
<html>
<head>
    <title>Manage User</title>
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
            <h2>Manage User</h2>
        </div>
        <a href="{{url('/insertUser')}}">+ Add New User</a><br><br>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Picture</th>
            <th colspan="2">Action</th><br>
        </tr>
        @for($i=0; $i<count($users); $i++)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{ $users[$i]->name }}</td>
                <td>{{ $users[$i]->email }}</td>
                <td>{{ $users[$i]->dob }}</td>
                <td>{{ $users[$i]->picture }}</td>
                <td><a href="{{url('/doDeleteUser/'.$users[$i]->id)}}">Delete</a></td>
                <td><a href="{{url('/updateUser/'.$users[$i]->id)}}">Edit</a></td><br>
            </tr>
        @endfor
    </div>
    @include('footer')
</body>
</html>
