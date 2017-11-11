<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <title></title>
</head>
<body>
    <div class="footer">
       <br>@ 2017 Orizon<br><br>
        <?php
            date_default_timezone_set('Asia/Bangkok');
            $date = date("D, j F Y H:i", time());
            echo $date
        ?>
        <br><br>
        Created by Alven, Michael, Bagaskara, Jesclyn
    </div>
</body>
</html>
