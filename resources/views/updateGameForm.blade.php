<!DOCTYPE html>
<html>
<head>
    <title>Update Game</title>
</head>
<body>
@include('header')
<div class="contentBody">
    <h2>Update Game</h2>
    <div class="contentForm">
        <form action="{{url('')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="txtOldGameId" value="">
            <b>Game Name : <br></b>
            <input style="width: 100%" type="text" name="txtGameName" placeholder="Type here..." value=""><br><br>
            <b>Price : <br></b>
            <input style="width: 100%" type="text" name="txtPrice" placeholder="Type here..." value=""><br><br>
            <b>Release Date : <br></b>
            <input style="width: 100%" type="text" name="txtDoB" placeholder="MM/DD/YYYY" value=""><br><br>
            <b>Genre : <br></b>

            <b>Picture<br></b>
            <form enctype="multipart/form-data" action="{{url('')}}" method="post">
                {{csrf_field()}}
                <input type="file" name="fileUpload"><br><br>
            </form>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Update Game">
        </form>
    </div>
</div>
@include('footer')
</body>
</html>
