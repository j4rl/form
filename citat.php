<!DOCTYPE html>
<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "brad";
$conn = mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['btnLogin'])){
    $user=$_POST['username'];
    $pass=md5($_POST['password']);
    $sql = "SELECT * FROM tbluser WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        $rad=mysqli_fetch_assoc($result);
        $_SESSION['name']=$rad['realname'];
        $_SESSION['level']=$rad['level'];
    }else{
        $_SESSION['name']="";
        $_SESSION['level']="";
    }
}

function isLevel($level){
    if(isset($_SESSION['level'])){
        if(intval($_SESSION['level'])>=$level){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

if(isset($_POST['edt'])){
    $id = intval($_POST['id']);
    $in_date=$_POST['date'];
    $citat=$_POST['txtcitat'];
    $sagtav=$_POST['txtsagtav'];
    $sql = "UPDATE tblcitat SET id=$id,citat='$citat',sagtav='$sagtav',in_date='$in_date' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    header("Location: citat.php");
}

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
    <section class="logo">
    <div class="logo_text">Citat</div>
    <div class="login">
        <?php
            if(isLevel(1)){
                echo "Välkommen<br>" . $_SESSION['name'];
            }else{
        ?>
        <form action="citat.php" method="post" id="frmLogin">
            <input type="text" name="username" id="login_username" placeholder="Username">
            <input type="password" name="password" id="login_password" title="Enter your password.">
            <input type="submit" name="btnLogin" id="btnLogin" value="Login">
        </form>
        <?php } ?>
    </div>    </section>
    <section class="form">
        <?php
    if(isset($_GET['a'])){
    if($_GET['a']=='d'){
        $sql = "DELETE FROM tblcitat WHERE id=" . $_GET['id'];
        $result = mysqli_query($conn, $sql);  
    }
    if($_GET['a']=='e'){
        $sql="SELECT * FROM tblcitat WHERE id=" . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        $raden = mysqli_fetch_assoc($result); ?>
        <form action="citat.php" method="POST" id="frmCitat">
            <input type="hidden" value="<?=$raden['id']?>" name="id">
            <input type="hidden" value="<?=$raden['in_date']?>" name="date">
            <textarea name="txtcitat" rows=3><?=$raden['citat']?></textarea>
            <input type="text" name="txtsagtav" value="<?=$raden['sagtav']?>">
            <input type="submit" name="edt" value="Ändra citat">
        </form>  
 <?php       
    }

}else{ 
    
    if(isLevel(1)){
    ?>
        <form action="citat.php" method="POST" id="frmCitat">
            <textarea name="txtcitat" rows=3></textarea>
            <input type="text" placeholder="Vem sade det?" name="txtsagtav">
            <input type="submit" name="btn" value="Lägg in citat">
        </form> 
        <?php
    }
} ?>   
    </section>
    <section class="showCitat">
        <?php
        $sql = "SELECT * FROM tblcitat ORDER BY in_date DESC";
        $result = mysqli_query($conn, $sql);
        while($rad=mysqli_fetch_assoc($result)){ ?>
            <p class="actualCitat"><?=$rad['citat']?></p>
            <p class="who">- <?=$rad['sagtav']?><a href="citat.php?a=d&id=<?=$rad['id']?>" class="a_del">&nbsp;<i class="gg-close-r"></i></a><a href="citat.php?a=e&id=<?=$rad['id']?>" class="a_edit">&nbsp;<i class="gg-keyboard"></i></a></p>
        <?php } ?>
    </section>
</body>
</html>