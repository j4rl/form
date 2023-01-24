<!DOCTYPE html>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "brad";
$conn = mysqli_connect($host, $user, $pass, $db);
$sql = "SELECT * FROM tbluser";
$result = mysqli_query($conn, $sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        while($rad=mysqli_fetch_assoc($result)){
            echo "<h1>" . $rad['realname'] . "</h1>";
        }
    ?>
</body>
</html>