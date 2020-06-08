<?php
 
$ceo = $_POST['ceo'];
$server = $_POST['server'];
$email = $_POST['email'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];
$empresa = $_POST['empresa'];
$cod = $_POST['cod'];
$aero = $_POST['aero'];
$cod = strtoupper($cod);
$status = 0;

if(strlen($ceo)< 4 OR strlen($ceo)> 12 ){
    $status = 1;
    echo '<script>alert("Nome de CEO inválido");</script>';   
}

if($server != 1 ){
    $status = 1;
    echo '<script>alert("Servidor inválido para este usuário");</script>';  
}
/*
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo '<script>alert("Email inválido");</script>'; 
}
*/
if($senha1 != $senha2){
    $status = 1;
    echo '<script>alert("As senhas não são iguais");</script>'; 
}

if(strlen($empresa)< 3 OR strlen($empresa)> 16 ){
    $status = 1;
    echo '<script>alert("Nome da empresa inválido");</script>'; 
}

if(strlen($cod)< 2 OR strlen($cod)> 3 ){
    $status = 1;
    echo '<script>alert("Código da empresa inválido");</script>';  
}
 
/* VERIFICAR O AEROPORT ESCOLHIDO */ 
$tamanho = strlen($aero);
$inicio = $tamanho - 3; 
$aeroiata = substr($aero, $inicio, $tamanho); 
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";
 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
     
$sql = "SELECT * FROM aeroportos WHERE iata = '$aeroiata'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
          while($row = $result->fetch_assoc()) { 
            $cidade = $row["cidade"];   
            $iata = $row["iata"];   
            $icao = $row["icao"];   
            $cidade = $row["cidade"];   
          }
      } else { 
        $status = 1;
        echo '<script>alert("HUB da empresa inválido");</script>'; 
      }  
/* FIM DA VERIFICAÇÃO */ 
 
    if($status == 1){ 
        echo '<a href="../cadastro.php"> Retornar ao cadastro </a>';
        }else{ 
            
            $inserir = "INSERT INTO usuario VALUES('','$email','$senha1','$server','$cod')";
            if (mysqli_query($conn, $inserir)) {
                
                    $inserir = "INSERT INTO enterprises VALUES('','$email', '$server','$ceo','$empresa','$cod', 10000000,0,'$aeroiata')";
                    if (mysqli_query($conn, $inserir)) {$inseriu = 1;} else {echo "Error 015" . mysqli_error($conn);}
  
                    $sql = "SELECT icao FROM aeroportos WHERE iata = '$aeroiata'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) { 
                              while($row = $result->fetch_assoc()) {  
                                $icao = $row["icao"];
                              }
                          } else { 
                            $status = 1;
                            echo '<script>alert("ERROR6");</script>'; 
                          }    
                          
                    $inserir = "INSERT INTO stations VALUES('','$cidade','$iata','$icao','50','$email','',1,50)";
                    if (mysqli_query($conn, $inserir)) {$inseriu = 1;} else {echo "Error 015" . mysqli_error($conn);}        
                    $ativa = "SET GLOBAL event_scheduler = ON"; 
                    if (mysqli_query($conn, $ativa)) {echo "";} else {echo "Error 201" . mysqli_error($w);}
                    setcookie("login",$email); 
                    
                            if($inseriu == 1){ 
                                    header("Location:mundos.php");        
                            }
            } else {echo "Error 015" . mysqli_error($conn);}
 
    }  
?>