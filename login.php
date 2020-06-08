<?php
 header("Content-type: text/html; charset=utf-8");
 
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
    
$cidade = [];
$iata = [];
$sql = "SELECT cidade, iata FROM aeroportos ORDER BY `cidade` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {  
          $i = 0;
          while($row = $result->fetch_assoc()) {  
            
            $cidade[$i] = $row["cidade"];
            $iata[$i] = $row["iata"]; 
            $i++;
          }
      } else { 
          echo 'error';
      }   
      $i = $i -1;
      while($i > 0){ 
        $aeroportos[$i] = $cidade[$i] .' - '. $iata[$i];        
        $i--;
      }  

      function js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}

function js_array($aeroportos)
{
    $temp = array_map('js_str', $aeroportos);
    return '[' . implode(',', $temp) . ']';
}

echo '<script charset="UTF-8">var dados = ', js_array($aeroportos), ';</script>';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title> 

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet"> 
  <link href="css/mdb.min.css" rel="stylesheet"> 
  <link href="css/style.css" rel="stylesheet">
  <link href="autocomplete.css" rel="stylesheet">
  <script src="airport.js"></script>
  <script src="autocomplete.js"></script>
  <script src="paises.js"></script> 
  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
  <script type="text/javascript" src="js/popper.min.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="js/mdb.min.js"></script>
</head>

<body>   

      
<div class="card" style="width: 40vw; margin-left: 30vw; margin-top: 2vh;">
<form class="text-center" method="POST" action="logar.php"> 

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Login</strong>
    </h5> 
    <div class="card-body px-lg-4 pt-5">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">
 

            <!-- E-mail -->
            <div class="md-form mt-0">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" required=""> 
                    </div> 
            </div> 
  
            <!-- E-mail -->
            <div class="md-form mt-0">
                    <!-- First name -->
                    <div class="md-form">
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required=""> 
                    </div> 
            </div> 
  
  
 
            <!-- Sign up button -->
            <div class="col">
            <a href="cadastro.php"><button class="btn btn-outline-info btn-rounded btn-lg my-4 waves-effect z-depth-0" type="button">Cadastrar</button></a>
            <button type="submit" class="btn btn-info btn-rounded btn-lg my-4 waves-effect z-depth-0" value="entrar" name="entrar">Fazer login</button>
            </div>
        </form>
        <!-- Form -->

    </div>     
</body>
</html>
   