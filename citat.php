<?php session_start(); ?>
<!DOCTYPE html>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "brad";
$conn = mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['btnLogin'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql = "SELECT * FROM tbluser WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)==1){
        $rad=mysqli_fetch_assoc($result);
        $_SESSION['name']=$rad['realname'];
        $_SESSION['level']=$rad['level'];
        $_SESSION['id']=$rad['id'];
    }else{
        $_SESSION['name']="";
        $_SESSION['level']="";
        $_SESSION['id']="";
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

function btnEdit($id, $uid){
    if(isset($_SESSION['level'])){
        $level=intval($_SESSION['level']);
    }else{
        $level=0;
    }
    $strOut="";
    if($level>=100 AND $_SESSION['id']==$uid){
        $strOut="<a href='citat.php?a=d&id=$id&uid=$uid' class='a_del'>&nbsp;<i class='gg-close-r'></i></a><a href='citat.php?a=e&id=$id&uid=$uid' class='a_edit'>&nbsp;<i class='gg-keyboard'></i></a>";
    }
   /* if($level>=500){
        $strOut="<a href='citat.php?a=e&id=$id&uid=$uid' class='a_edit'>&nbsp;<i class='gg-keyboard'></i></a>";
    }
    if($level>=1000){
        $strOut="<a href='citat.php?a=d&id=$id&uid=$uid' class='a_del'>&nbsp;<i class='gg-close-r'></i></a><a href='citat.php?a=e&id=$id&uid=$uid' class='a_edit'>&nbsp;<i class='gg-keyboard'></i></a>";
    } */
    if($level<100){
        $strOut="";
    }
    return $strOut;
}

if(isset($_POST['edt'])){
    $id = intval($_POST['id']);
    $in_date=$_POST['date'];
    $citat=$_POST['txtcitat'];
    $sagtav=$_POST['txtsagtav'];
    $uid=intval($_POST['uid']);
    $sql = "UPDATE tblcitat SET id=$id,citat='$citat',sagtav='$sagtav',in_date='$in_date', userid=$uid WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    header("Location: citat.php");
}

if(isset($_POST['btn'])){
    $citat = $_POST['txtcitat'];
    $av = $_POST['txtsagtav'];
    $uid=intval($_SESSION['id']);
    $sql = "INSERT INTO tblcitat (citat, sagtav, userid) VALUES ('$citat', '$av', $uid)";
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
                echo "Välkommen<br>" . $_SESSION['name']; ?>
                <a href="citat.php?a=logout" id="btnLogout">Logga ut</a>
        <?php }else{ ?>
        
        <form action="citat.php" method="post" id="frmLogin" name="frmLogin">
            <input type="text" name="username" id="login_username" placeholder="Username">
            <input type="password" name="password" id="login_password" title="Enter your password.">
            <input type="submit" name="btnLogin" id="btnLogin" value="Login">
        </form>
        <?php  } ?>
    </div>  

</section>
    <section class="form">
        <?php
    if(isset($_GET['a'])){
    if($_GET['a']=='d'){
        $sql = "DELETE FROM tblcitat WHERE id=" . $_GET['id'];
        $result = mysqli_query($conn, $sql);  
    }
    if($_GET['a']=='logout'){
        session_destroy();
        header("Location: citat.php");
    }
    if($_GET['a']=='e'){
        $sql="SELECT * FROM tblcitat WHERE id=" . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        $raden = mysqli_fetch_assoc($result); ?>
        <form action="citat.php" method="POST" id="frmCitat">
            <input type="hidden" value="<?=$raden['userid']?>" name="uid">
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
        //echo $_SESSION['name']."<br>".$_SESSION['level']."<br>".$_SESSION['id']."<br>";
        ?>
        <?php
        $sql = "SELECT * FROM tblcitat ORDER BY in_date DESC";
        $result = mysqli_query($conn, $sql);
        if(isset($_SESSION['id'])){
            $user=$_SESSION['id'];
        }else{
            $user=0;
        }
        while($rad=mysqli_fetch_assoc($result)){ ?>
            <p class="actualCitat"><?=$rad['citat']?></p>
            <p class="who">- <?=$rad['sagtav']?><?=btnEdit($rad['id'], $user)?></p>
        <?php } ?>
    </section>
</body>
</html>