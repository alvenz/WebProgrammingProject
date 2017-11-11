<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
@if(Auth::check())
    return redirect('/');
@else
<body>
    @include('header')
        <div class="contentBody">
            <h2>Register</h2>
            <div class="contentForm">
                <form action="{{url('')}}" method="post">
                    {{csrf_field()}}
                    <b>Email Address<br></b>
                    <input style="width: 100%" type="text" name="txtEmail" placeholder="name@example.com"><br><br>
                    <b>Password<br></b>
                    <input style="width: 100%" type="password" name="txtPassword" placeholder="password"><br><br>
                    <b>Password Confirmation<br></b>
                    <input style="width: 100%" type="password" name="txtConfPassword" placeholder="confirm password"><br><br>
                    <b>Fullname<br></b>
                    <input style="width: 100%" type="text" name="txtFullname" placeholder="fullname"><br><br>
                    <b>Date of Birth<br></b>
                    <input style="width: 100%" type="text" name="txtDoB" placeholder="MM/DD/YYYY"><br><br>
                    <b>Profile Picture<br></b>
                    <form enctype="multipart/form-data" action="{{url('')}}" method="post">
                        {{csrf_field()}}
                        <input type="file" name="fileUpload"><br><br>
                    </form>
                    <input style="background-color: dodgerblue; color:white" type="submit" value="Sign Up">
                </form>
            </div>
        </div>
    @include('footer')
</body>
@endif
</html>
