<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    @if(!Auth::check())
        <script>window.location = "/login";</script>
    @endif
</head>
<body>
    @include('header')
    <div class="contentBody">
        <h2>Profile</h2>
        <div class="contentForm">
            <img widht="100px" height="100px" src="{{asset('uploads/'.Auth::user()->picture)}}"><br>
            <form action="{{url('/doEditProfile')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <b>Fullname<br></b>
                <input style="width: 100%" type="text" name="txtFullname" placeholder="Type here..." value="{{Auth::user()->name}}"><br><br>
                <b>Date of Birth<br></b>
                <input style="width: 100%" type="date" name="txtDoB" placeholder="MM/DD/YYYY" value="{{Auth::user()->dob}}"><br><br>
                <b>Profile Picture<br></b>
                <input type="file" name="fileUpload"><br><br>
                <input style="background-color: dodgerblue; color:white" type="submit" value="Edit Profile">
            </form>
        </div>
    </div>
    @include('footer')
</body>
</html>
