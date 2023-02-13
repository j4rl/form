<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
 </head>
<body>
    <div class="content">
    <!-- If someone tries to log in -->
    <?php
        $host="localhost";
        $user="root";
        $pass="";
        $db="brad";
        $conn=mysqli_connect($host,$user,$pass,$db);
        
        if(isset($_POST['btnLogin'])){
            $username=$_POST['username']; //Gotta make variable for the SQL
            $password=md5($_POST['password']);
            $strQuery="SELECT * FROM tbluser WHERE username='$username' AND password='$password';";  
            if($result=mysqli_query($conn,$strQuery)){ //Was it possible to question the database for this?
                if(!mysqli_num_rows($result)==1){   //It was, now check if it didn't was just one row
                   echo "Inte inloggad!";  //Batty boy!
                   $_SESSION['id']="";
                   $_SESSION['level']="";
                   $_SESSION['name']="";                   
                }else{  //You made it! you are authorized!
                    $raden=mysqli_fetch_assoc($result);   //Get the row with data
                    echo "Välkommen ".strtoupper($raden['username']); //use this to print name
                    $_SESSION['id']=$raden['id'];
                    $_SESSION['level']=$raden['level'];
                    $_SESSION['name']=$raden['realname'];
                    //$skrivutvariabeln=$_SESSION['name'];
                    echo "<br><div class='showname'>".$_SESSION['name']."</div><br>";
                    if(intval($_SESSION['level'])>100){
                        echo "Ohhh, admin!";
                    }
                }
            }   
        }else{  //else Show form   ?>
        <div class="formbox form">
            <form action="login.php" method="post" id="frmLogin">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" title="Enter your password.">
                <input type="submit" name="btnLogin" id="btnLogin" value="Login">
            </form>
        </div>
        <?php }   //Who dis? New phone ?>
    </div>   
</body>
</html>