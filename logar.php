<?php  

$email = $_POST['email']; 
$senha = $_POST['senha'];  
$entrar = $_POST['entrar']; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";
 
  $h = "localhost";$u = "root";$p = ""; $b = "airline";$l = mysqli_connect($h,$u,$p,$b); 
    if (isset($entrar)) {
      $verifica =  $l->query("SELECT id FROM usuario WHERE email = '$email' AND senha = '$senha'")or die("Erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
                echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
          die();
        }else{  
          setcookie('login', $email); 
        }
    }	
 
    header("Location:mundos.php");     
?>