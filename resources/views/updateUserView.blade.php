<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
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
    <h2>Update User</h2>
    <div class="contentForm">
        <form action="{{url('/doUpdateUser')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="txtOldUserId" value="{{$data->id}}">
            <b>Name<br></b>
            <input style="width: 100%" type="text" name="txtFullname" placeholder="Type here..." value="{{$data->name}}"><br><br>
            <b>Email Address<br></b>
            <input style="width: 100%" type="text" name="txtEmail" placeholder="name@example.com" value="{{$data->email}}"><br><br>
            <b>Password<br></b>
            <input style="width: 100%" type="password" name="txtPassword" placeholder="password"><br><br>
            <b>Password Confirmation<br></b>
            <input style="width: 100%" type="password" name="txtConfPassword" placeholder="confirm password"><br><br>
            <b>Date of Birth<br></b>
            <input style="width: 100%" type="date" name="txtDoB" placeholder="MM/DD/YYYY" value="{{$data->dob}}"><br><br>
            <b>Profile Picture<br></b>
            <input type="file" name="fileUpload"><br><br>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Update User">
        </form>
    </div>
</div>
@include('footer')
</body>
</html>
