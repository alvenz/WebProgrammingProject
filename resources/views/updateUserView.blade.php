<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
@include('header')
<div class="contentBody">
    <h2>Update User</h2>
    <div class="contentForm">
        <form action="{{url('')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="txtOldUserId" value="">
            <b>Name<br></b>
            <input style="width: 100%" type="text" name="txtFullname" placeholder="Type here..." value=""><br><br>
            <b>Email Address<br></b>
            <input style="width: 100%" type="text" name="txtEmail" placeholder="name@example.com" value=""><br><br>
            <b>Password<br></b>
            <input style="width: 100%" type="password" name="txtPassword" placeholder="password" value=""><br><br>
            <b>Password Confirmation<br></b>
            <input style="width: 100%" type="password" name="txtConfPassword" placeholder="confirm password" value=""><br><br>
            <b>Date of Birth<br></b>
            <input style="width: 100%" type="text" name="txtDoB" placeholder="MM/DD/YYYY" value=""><br><br>
            <b>Profile Picture<br></b>
            <form enctype="multipart/form-data" action="{{url('')}}" method="post">
                {{csrf_field()}}
                <input type="file" name="fileUpload"><br><br>
            </form>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Update User">
        </form>
    </div>
</div>
@include('footer')
</body>
</html>
