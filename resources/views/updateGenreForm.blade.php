<!DOCTYPE html>
<html>
<head>
    <title>Update Genre</title>
</head>
<body>
@include('header')
<div class="contentBody">
    <h2>Update Genre</h2>
    <div class="contentForm">
        <form action="{{url('')}}" method="post">
            {{csrf_field()}}
            <b>Genre Name : <br></b>
            <input type="hidden" name="txtOldGenreId" value="">
            <input style="width: 100%" type="text" name="txtGenreName" placeholder="Type here..." value=""><br><br>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Update Genre">
        </form>
    </div>
</div>
@include('footer')
</body>
</html>
