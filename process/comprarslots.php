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


$iata = $_GET['i'];
$quantidade = ($_GET[$iata]/194);
 

$sql = "SELECT cidade, icao, slots FROM slotsaero WHERE iata = '$iata'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $city = $row["cidade"];  
            $icao = $row["icao"]; 
            $slots = $row["slots"]; 
          }
      } else { 
          echo 'Erro ao selecionar slots disponiveis';
      }   


$sql = "SELECT slots_disponivel FROM stations WHERE iata = '$iata' AND email = '$login_cookie'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
              $slots_disponiveis = $row["slots_disponivel"]; 
              $slots_disponiveis = $slots_disponiveis + $quantidade;
          }
      } else { 
          $slots_disponiveis = 0;
      }   
 


$sql = "SELECT COUNT(cidade) from stations WHERE email = '$login_cookie' AND iata = '$iata'";
$result = $conn->query($sql); 

$rtsaf = mysqli_fetch_assoc($result);      
foreach ($rtsaf as $aeroportostacao){ 
}   


    if($slots > $quantidade){
        if($slots_disponiveis > 50){ 
            header('Location:../aviso/index.php?warn=7&d=0&q=0');
        }else{
            if($aeroportostacao == 0){
            $confirm = 0;
            $d = "UPDATE slotsaero SET slots = slots - '$quantidade' WHERE iata = '$iata'";
            mysqli_query($conn,$d)or die($confirm = 1);
                if($confirm == 0){
                    $inserir = "INSERT INTO stations VALUES('','$city', '$iata','$icao','$quantidade','$login_cookie',0,0,'$quantidade')";
                    if (mysqli_query($conn, $inserir)) {$inseriu = 1;} else {echo "Error 015" . mysqli_error($conn);}
                    
                    $linked = 'Location:../aviso/index.php?warn=6&d='.$city.'&q='.$quantidade;
                    header($linked);
                }else{
                    echo 'Não foi possivel completar esta operação.';  
                }

            }else{        
                $confirm = 0;        
                $d = "UPDATE slotsaero SET slots = slots - '$quantidade' WHERE iata = '$iata'";
                mysqli_query($conn,$d)or die($confirm = 1);
                    if($confirm == 0){
                        $inserir = "UPDATE stations SET slots_empresa = slots_empresa + '$quantidade', slots_disponivel = slots_disponivel + '$quantidade' WHERE iata = '$iata' AND email = '$login_cookie'";
                        if (mysqli_query($conn, $inserir)) {$inseriu = 1;} else {echo "Error 015" . mysqli_error($conn);}

                        
                    $linked = 'Location:../aviso/index.php?warn=6&d='.$city.'&q='.$quantidade;
                    header($linked);
                    }else{
                        echo 'Não foi possivel completar esta operação.';  
                    }            
            }
        }     
    }else{
        echo 'Não há essa quantidade de slots livres.';
    }
 
?>