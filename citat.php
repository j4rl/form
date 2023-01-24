<!DOCTYPE html>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "brad";
$conn = mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['btn'])){
    $citat = $_POST['txtcitat'];
    $av = $_POST['txtsagtav'];
    $sql = "INSERT INTO tblcitat (citat, sagtav) VALUES ('$citat', '$av')";
    $result = mysqli_query($conn, $sql);   
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Citat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="logo">Citat</section>
    <section class="form">
        <form action="citat.php" method="POST" id="frmCitat">
            <textarea name="txtcitat" rows=5></textarea>
            <input type="text" placeholder="Vem sade det?" name="txtsagtav">
            <input type="submit" name="btn" value="Lägg in citat">
        </form>    
    </section>
    <section class="showCitat">
        <?php
        $sql = "SELECT * FROM tblcitat ORDER BY in_date DESC";
        $result = mysqli_query($conn, $sql);
        while($rad=mysqli_fetch_assoc($result)){ ?>
            <p class="actualCitat"><?=$rad['citat']?></p>
            <p class="who">- <?=$rad['sagtav']?></p>
        <?php } ?>
    </section>
</body>
</html>