<?php

$login_cookie = $_COOKIE['login'];if(isset($login_cookie)){}else{header('Location:login.php');} 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$quantidade = $_POST['quantidade'];
$compralugar = $_POST['encomendar'];
$plane = $_POST['plane'];  


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
$sql = "SELECT id, emp, price FROM planes WHERE model = '$plane'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $id = $row["id"];
            $emp = $row["emp"];
            $price = $row["price"]; 
          }
      } else { 
          echo 'error';
      }  

      
$sql = "SELECT empresa, id, money FROM enterprises WHERE email = '$login_cookie'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $id_empresa = $row["id"];
            $empresa = $row["empresa"];
            $money = $row["money"]; 
          }
      } else { 
          echo 'error';
      }  
 
      
$sql = "SELECT id FROM buylea WHERE id_empresa = '$id_empresa'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {   

if($compralugar == 1 ){ 
    $precoaluguel = $price/200;
    $manu = $precoaluguel * 0.16;
    $depositoaluguel = $price/20;
    $depositoaluguel = $depositoaluguel * $quantidade;  
    $i = 0;
    $hour = 0;
    if($money > $depositoaluguel){
        while($i < $quantidade){ 
            
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
$prefixo = $rand;
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];
$sufixo = $rand;

$codigo = $prefixo.'-'.$sufixo;

            $inserir = "INSERT INTO fabrica VALUES('','$emp', '$id', '$id_empresa','$codigo','$precoaluguel','$manu','1')";      
            mysqli_query($conn, $inserir);               
            $i++; 
        }
        
            $d = "UPDATE enterprises SET money = money - '$depositoaluguel' WHERE email = '$login_cookie'";
            mysqli_query($conn,$d)or die(mysqli_error());
            
            $d = "UPDATE planes SET build = build + '$quantidade'";
            mysqli_query($conn,$d)or die(mysqli_error());
            
            $linked = 'Location:aviso/index.php?warn=4&d='.$plane.'&q='.$quantidade;
            header($linked);

    }else{
        echo 'Você não tem dinheiro suficiente para alugar';
    }

    
}elseif($compralugar == 2){
    $precoaluguel = $price/200;
    $manu = $precoaluguel * 0.16;
    
    $depositocompra = $price;
    $depositocompra = $depositocompra * $quantidade; 
    $i = 0; 
    if($money > $depositocompra){ 
        while($i < $quantidade){
            
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
$prefixo = $rand;
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];
$sufixo = $rand;

$codigo = $prefixo.'-'.$sufixo;

            $inserir = "INSERT INTO fabrica VALUES('','$emp', '$id', '$id_empresa','$codigo','0','$manu','0')";   
            mysqli_query($conn, $inserir);         
            $i++;          
        } 
            $d = "UPDATE enterprises SET money = money - '$depositocompra' WHERE email = '$login_cookie'";
            mysqli_query($conn,$d)or die(mysqli_error());
            
            $d = "UPDATE planes SET build = build + '$quantidade'";
            mysqli_query($conn,$d)or die(mysqli_error());
        
            $linked = 'Location:aviso/index.php?warn=5&d='.$plane.'&q='.$quantidade;
            header($linked);
    }else{
        echo 'Você não tem dinheiro suficiente para comprar';
    }   

}else{
    echo 'PILANTRA!!';
} 



} else {


if($compralugar == 1 ){ 
    $precoaluguel = $price/200;
    $manu = $precoaluguel * 0.16;
    $depositoaluguel = $price/20;
    $depositoaluguel = $depositoaluguel * $quantidade;  
    $i = 0;
    $hour = 0;
    if($money > $depositoaluguel){
        while($i < $quantidade){ 
            
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
$prefixo = $rand;
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];
$sufixo = $rand;

$codigo = $prefixo.'-'.$sufixo;
  
            $inserir = "INSERT INTO buylea VALUES('', '$id', '$codigo','0','$id_empresa','1','$precoaluguel','$manu')";    
            mysqli_query($conn, $inserir);               
            $i++; 
        }
        
            $d = "UPDATE enterprises SET money = money - '$depositoaluguel' WHERE email = '$login_cookie'";
            mysqli_query($conn,$d)or die(mysqli_error());
            
            $d = "UPDATE planes SET build = build + '$quantidade'";
            mysqli_query($conn,$d)or die(mysqli_error());
            
            $linked = 'Location:aviso/index.php?warn=4&d='.$plane.'&q='.$quantidade;
            header($linked);

    }else{
        echo 'Você não tem dinheiro suficiente para alugar';
    }

    
}elseif($compralugar == 2){
    $precoaluguel = $price/200;
    $manu = $precoaluguel * 0.16;
    
    $depositocompra = $price;
    $depositocompra = $depositocompra * $quantidade; 
    $i = 0; 
    if($money > $depositocompra){ 
        while($i < $quantidade){
            
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
$prefixo = $rand;
//Cofigo da aeronave aleatória
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];
$sufixo = $rand;

$codigo = $prefixo.'-'.$sufixo;

            $inserir = "INSERT INTO buylea VALUES('', '$id', '$codigo','0','$id_empresa','0','0','$manu')";   
            mysqli_query($conn, $inserir);         
            $i++;          
        } 
            $d = "UPDATE enterprises SET money = money - '$depositocompra' WHERE email = '$login_cookie'";
            mysqli_query($conn,$d)or die(mysqli_error());
            
            $d = "UPDATE planes SET build = build + '$quantidade'";
            mysqli_query($conn,$d)or die(mysqli_error());
        
            $linked = 'Location:aviso/index.php?warn=5&d='.$plane.'&q='.$quantidade;
            header($linked);
    }else{
        echo 'Você não tem dinheiro suficiente para comprar';
    }   

}else{
    echo 'PILANTRA!!';
} 

}  


?>