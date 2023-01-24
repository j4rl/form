<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<h1>Formulär</h1>
<?php
if(isset($_POST['btn'])){
    echo $_POST['user'];
    echo "<br>";
    echo $_POST['pass'];
    echo "<br>";
    echo $_POST['col'];  
    echo "<br>";
    echo $_POST['when'];  
    echo "<br>";
    echo $_POST['text'];    
}else{ 

?>
<form action="index.php" method="POST" id="form">
    <input type="text" name="user" placeholder="Ange användarnamn" required>
    <input type="date" name="when">
    <input type="color" name="col">
    <textarea name="text" rows=6></textarea>
    <input type="password" name="pass">
    <input type="submit" name="btn" value="Login">
</form>
<?php
}
?>
</body>