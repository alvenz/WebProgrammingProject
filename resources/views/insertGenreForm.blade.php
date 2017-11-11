<!DOCTYPE html>
<html>
<head>
    <title>Insert Genre</title>
</head>
<body>
@include('header')
<div class="contentBody">
    <h2>Insert Genre</h2>
    <div class="contentForm">
        <form action="{{url('')}}" method="post">
            {{csrf_field()}}
            <b>Genre Name : <br></b>
            <input style="width: 100%" type="text" name="txtGenreName" placeholder="Type here..."><br><br>
            <input style="background-color: dodgerblue; color:white" type="submit" value="Insert Genre">
        </form>
    </div>
</div>
@include('footer')
</body>
</html>
