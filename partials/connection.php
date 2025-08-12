<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP connect</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";
    $conn = mySqli_connect($servername, $username, $password, $dbname );

    if(!$conn){
        die("connection failed: ".mySqli_connect_error());
    }
    ?>
    
</body>
</html>