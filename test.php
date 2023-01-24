<!DOCTYPE html>
<?php
function gText(){
    if (isset($_POST['btn'])) {
        return $_POST['ove'];
    }else{
        return "";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p></p>
    <form action="test.php" method="POST">
        <input type="text" name="ove" placeholder="Fyll i ditt namn" required value="<?=gText()?>">
        <input type="submit" name="btn" value="Skicka">
        <input type="reset" name="rst" value="Rensa">
    </form>
</body>
</html>