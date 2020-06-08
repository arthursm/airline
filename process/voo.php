<?php 

$login_cookie = $_COOKIE['login'];if(isset($login_cookie)){}else{header('Location:login.php');} 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$vooida = $_POST["vooida"];
$voovolta = $_POST["voovolta"];
$ocity = $_POST["ocity"];
$origem = $_POST["origem"];
$dcity = $_POST["dcity"];
$totalhora = $_POST["totalhora"];
$totalminutos = $_POST["totalminutos"];
$decolagem = $_POST["decolagem"];
$distancia = $_POST["distancia"];
$destino = $_POST["destino"];
$voominutos = $_POST["voominutos"];
$voohoras = $_POST["voohoras"];
$yp = $_POST["yp"];
$cp = $_POST["cp"];
$fp = $_POST["fp"];
$voohoras = $voohoras+1;


/* DESCOBRIR O HORAIO DE POUSOOOOOOOOOOO */
$retorno = $voohoras.':'.$voominutos;

$inserir = "INSERT INTO routes VALUES('','','$login_cookie','$vooida','$ocity','$origem','$decolagem','$distancia','$dcity','$destino','','PREVISTO','0','0','0','$yp','$cp','$fp',0)";   
mysqli_query($conn, $inserir);  

$inserir = "INSERT INTO routes VALUES('','','$login_cookie','$voovolta','$dcity','$destino','$retorno','$distancia','$ocity','$origem','','PREVISTO','0','0','0','$yp','$cp','$fp',0)";   
mysqli_query($conn, $inserir); 
 
?> 