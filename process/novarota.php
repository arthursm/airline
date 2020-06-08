<?php

$login_cookie = $_COOKIE['login'];if(isset($login_cookie)){}else{header('Location:login.php');}
session_start(); # Deve ser a primeira linha do arquivo

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
    

$plane = $_POST["plane"];
$voo = $_POST['voo'];
$origem = $_POST["origem"];
$via = '';
$destino = $_POST["destino"]; 
 

    if($via != ''){
      $results = $conn->query("SELECT id_aviao FROM buylea WHERE id = '$plane'");
      while($row = $results->fetch_assoc()) {$id_aviao  = $row["id_aviao"];} 
   
      $results = $conn->query("SELECT * FROM planes WHERE id = '$id_aviao'");
      while($row = $results->fetch_assoc()) {$range  = $row["range"]; $speed  = $row["speed"]; $ground  = $row["ground"];} 
  
      $results = $conn->query("SELECT nome, cidade, runway, lat, log FROM aeroportos WHERE iata = '$origem'");
      while($row = $results->fetch_assoc()) {$onome  = $row["nome"]; $ocity = $row["cidade"]; $orunway  = $row["runway"]; $olat  = $row["lat"]; $olog  = $row["log"];} 
          
      $results = $conn->query("SELECT nome, cidade, runway, lat, log FROM aeroportos WHERE iata = '$destino'");
      while($row = $results->fetch_assoc()) {$dnome  = $row["nome"]; $dcity = $row["cidade"]; $drunway  = $row["runway"]; $dlat  = $row["lat"]; $dlog  = $row["log"];} 
  
          $distancia = distancia($olat, $olog, $dlat, $dlog);


    } else { 
         
    $results = $conn->query("SELECT id_aviao FROM buylea WHERE id = '$plane'");
    while($row = $results->fetch_assoc()) {$id_aviao  = $row["id_aviao"];} 
 
    $results = $conn->query("SELECT * FROM planes WHERE id = '$id_aviao'");
    while($row = $results->fetch_assoc()) {$range  = $row["range"]; $speed  = $row["speed"]; $ground  = $row["ground"];} 

    $results = $conn->query("SELECT nome, cidade, runway, lat, log FROM aeroportos WHERE iata = '$origem'");
    while($row = $results->fetch_assoc()) {$onome  = $row["nome"]; $ocity = $row["cidade"]; $orunway  = $row["runway"]; $olat  = $row["lat"]; $olog  = $row["log"];} 
        
    $results = $conn->query("SELECT nome, cidade, runway, lat, log FROM aeroportos WHERE iata = '$destino'");
    while($row = $results->fetch_assoc()) {$dnome  = $row["nome"]; $dcity = $row["cidade"]; $drunway  = $row["runway"]; $dlat  = $row["lat"]; $dlog  = $row["log"];} 

        $distancia = distancia($olat, $olog, $dlat, $dlog);
    }
 

function distancia($lat1, $lon1, $lat2, $lon2) {

    $lat1 = deg2rad($lat1);
    $lat2 = deg2rad($lat2);
    $lon1 = deg2rad($lon1);
    $lon2 = deg2rad($lon2);
    
    $dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
    $dist = number_format($dist, 2, '.', '');
    return $dist;
    }
   
    
if($distancia < 30){ 
    $linked = 'Location:../aviso/index.php?warn=1&d='.$distancia.'&q=0';
    header($linked);

}else{
    if($distancia > $range){ 
        $linked = 'Location:../aviso/index.php?warn=2&d='.$distancia.'&q=0';
        header($linked);
    }else{
        if($ground > $drunway or $ground > $orunway){  
          $linked = 'Location:../aviso/index.php?warn=3&d='.$ground.'&q=0';
          header($linked);
        }else{

            $precoy = round($distancia / 13); 
            $precoc = round($distancia / 7); 
            $precof = round($distancia / 4); 
            
            $tempo = $distancia / $speed; 
            
            $horas = floor($tempo);
            $voohoras = $horas; 
            $frac = substr(strpbrk($tempo, '.,'), 1);
            $floates = '0.'.$frac;
            $mintuos =  $floates*0.6;
            $minutosreal = number_format($mintuos, 2, '.',','); 
            $minutos = substr($minutosreal, 2, 4); 
            $voominutos = $minutos;

            /* TOTAL  TOTAL  TOTAL */
            $tempoaero = 120;
            $minutosfake = $minutos * 2;
            $minutostotal = ($minutosfake + $tempoaero)/60; 
              
            $horastotais = floor($minutostotal);
            $fracionado = substr(strpbrk($minutostotal, '.,'), 1);
            $floatestotal = '0.'.$fracionado;
              
            $minutostotais =  $floatestotal*0.6;
            $minutosrealtotal = number_format($minutostotais, 2, '.',','); 
            $totalminutos = substr($minutosrealtotal, 2, 4); 
 
            $totalhora = $horastotais + ($horas*2);

            if($horas == 0){
                $horas = '';
            }elseif($horas == 1 ){
                $horas = $horas . ' hora e';
            }else{
                $horas = $horas . ' horas e';
            } 
        }
    }
}

    /* DIGITAR NUMERO DE VOO 
    PISTA DE AMBOS 
    AERONAVE? */
 

    $_SESSION['distancia'] = $distancia;
    
// header('Location:../rota.php');

?>

<?php

$login_cookie = $_COOKIE['login'];if(isset($login_cookie)){}else{header('Location:../login.php');}

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
   
      
$sql = "SELECT empresa, cod, money FROM enterprises WHERE email = '$login_cookie'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $empresa = $row["empresa"];
            $money = $row["money"]; 
            $cod = $row["cod"]; 
          }
      } else { 
          echo 'error';
      }  
 
      $vooida = $cod.' '.$voo;  
      $voovolta = $cod.' '.($voo +1); 
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="inputnumber.css" rel="stylesheet">
  <link href="../autocomplete.css" rel="stylesheet">
  <script src="../airport.js"></script>
  <script src="../autocomplete.js"></script>
  <script src="../paises.js"></script>  
</head>

<body>

  <!-- Start your project here-->
  <div style="height: 100vh">
    <!--Navbar -->
<nav class="mb-1 navbar navbar-light navbar-expand-lg default-color">
  <a class="navbar-brand" href="mapa.php"><?php echo $empresa; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      
        <li class="nav-item">
            <a class="nav-link" href="#"> $ <?php echo number_format($money, 0,'', ' ');?></a>
          </li> 
      <li class="nav-item dropdown">
        <a class="nav-link " id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Comercial
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="voos.php">Nº de voos</a>
          <a class="dropdown-item" href="precos.php">Preços</a>
          <a class="dropdown-item" href="lotacao.php">Lotação</a>
          <a class="dropdown-item" href="cabines.php">Cabines</a>
          <a class="dropdown-item" href="servicos.php">Serviços</a>
          <a class="dropdown-item" href="alianca.php">Aliança</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
          <a class="nav-link " id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Operações
          </a>
          <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="frota.php">Frota</a>
            <a class="dropdown-item" href="rotas.php">Rotas</a>
            <a class="dropdown-item" href="manutencao.php">Manutenção</a>
            <a class="dropdown-item" href="aeroportos.php">Aeroportos</a> 
          </div>
        </li>
        
      <li class="nav-item dropdown">
          <a class="nav-link " id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Gestão
          </a>
          <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="fabricantes.php">Fabricantes</a>
            <a class="dropdown-item" href="pessoal.php">Pessoal</a>
            <a class="dropdown-item" href="subsidiaria.php">Subsidiária</a>
            <a class="dropdown-item" href="financas.php">Finanças</a>
            <a class="dropdown-item" href="caixa.php">Caixa</a>
            <a class="dropdown-item" href="locacao.php">Locação</a>
          </div>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons"> 

      <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-globe-americas"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="#">Países</a>
            <a class="dropdown-item" href="#">Empresas</a>
            <a class="dropdown-item" href="#">Alianças</a>
            <a class="dropdown-item" href="#">Estatisticas</a>
          </div>
        </li>
        
      <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="#">Empresa</a>
            <a class="dropdown-item" href="#">Player</a>
          </div>
        </li>

      <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Empresas</a>
          <a class="dropdown-item" href="#">Perfil</a>
          <a class="dropdown-item" href="#">Geral</a> 
        </div>
      </li>
    </ul>
  </div>
</nav>
 


 

<div class="card" style="width: 80vw; margin-left: 10vw; margin-top: 5vh;">
  <div class="card-body">
    <h5 class="font-weight-bold mb-3">Novo Voo</h5>  
  </div> 
 
<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col" colspan="2"> <?php echo $onome. ' - '.$ocity. ' - '.$origem; ?></th> 
      <th scope="col" colspan="2"> <?php echo $dnome. ' - '.$dcity. ' - '.$destino; ?></th>  
    </tr>
    <tr>
      <th scope="col">Operação</th>
      <th scope="col">Tempo</th>  
      <th scope="col">Operação</th>
      <th scope="col">Tempo</th>  
    </tr>
  </thead> 

  <tbody> 
 
            <tr>
                <th scope="row">Tempo do embarque <?php echo '('.$vooida. ')' ; ?></th><td> 25 minutos</td>
                <th scope="row">Tempo do embarque  <?php echo '('.$voovolta.')'; ?></th><td> 25 minutos</td>
            </tr>
            <tr>
                <th scope="row">Taxiamento  <?php echo '('.$vooida.')'; ?></th><td> 4 minutos</td>
                <th scope="row">Taxiamento  <?php echo '('.$voovolta.')'; ?></th><td> 4 minutos</td>
            </tr>
            <tr>
                <th scope="row">Decolagem  <?php echo '('.$vooida.')'; ?></th><td> 1 minuto</td>
                <th scope="row">Decolagem  <?php echo '('.$voovolta.')'; ?></th><td> 1 minuto</td>
            </tr>
            <tr>
                <th scope="row">Duração do Voo  <?php echo '('.$vooida.')'; ?></th><td> <?php echo $horas.' '.$minutos.' minutos'; ?></td>
                <th scope="row">Duração do Voo <?php echo '('.$voovolta.')'; ?></th><td> <?php echo $horas.' '.$minutos.' minutos'; ?></td>
            </tr>
            <tr>
                <th scope="row">Pouso  <?php echo '('.$vooida.')'; ?></th><td> 1 minuto</td>
                <th scope="row">Pouso  <?php echo '('.$voovolta.')'; ?></th><td> 1 minuto</td>
            </tr>
            <tr>
                <th scope="row">Taxiamento  <?php echo '('.$vooida.')'; ?></th><td> 4 minutos</td>
                <th scope="row">Taxiamento  <?php echo '('.$voovolta.')'; ?></th><td> 4 minutos</td>
            </tr> 
            <tr>
                <th scope="row">Tempo do desembarque  <?php echo '('.$vooida.')'; ?></th><td> 25 minutos</td>
                <th scope="row">Tempo do desembarque  <?php echo '('.$voovolta.')'; ?></th><td> 25 minutos</td>
            </tr> 
<?php
    echo '<form method="POST" action="voo.php"><thead class="black white-text">';
    echo '<input type="text" name="vooida" value="'.$vooida.'" hidden="">';
    echo '<input type="text" name="voovolta" value="'.$voovolta.'" hidden="">';
    echo '<input type="text" name="ocity" value="'.$ocity.'" hidden="">';
    echo '<input type="text" name="origem" value="'.$origem.'" hidden="">';
    echo '<input type="text" name="dcity" value="'.$dcity.'" hidden="">';
    echo '<input type="text" name="destino" value="'.$destino.'" hidden="">';
    echo '<input type="text" name="totalhora" value="'.$totalhora.'" hidden="">';
    echo '<input type="text" name="totalminutos" value="'.$totalminutos.'" hidden="">'; 
    echo '<input type="text" name="distancia" value="'.$distancia.'" hidden="">'; 
    echo '<input type="text" name="voominutos" value="'.$voominutos.'" hidden="">'; 
    echo '<input type="text" name="voohoras" value="'.$voohoras.'" hidden="">';  
    
    echo '<tr>
    <th scope="col" colspan="3" style="text-align:center;">Duração total<br>'.$totalhora.' horas e '.$totalminutos.' minutos</th> 
    <th scope="col" colspan="1">Horario de decolagem<br><input class="form-control-sm" type="time" name="decolagem" required></th> 
    ';
    echo '<tr>
    <th scope="col" colspan="1" style="text-align:center;">Preço Classe Y<br><br><input type="number" name="yp" value="'.$precoy.'" min="1" max="9999"></th>
    <th scope="col" colspan="1" style="text-align:center;">Preço Classe B<br><br><input type="number" name="cp" value="'.$precoc.'" min="1" max="9999"></th>
    <th scope="col" colspan="1" style="text-align:center;">Preço Classe F<br><br><input type="number" name="fp" value="'.$precof  .'" min="1" max="9999"></th>
    <th scope="col" colspan="1" style="text-align:center;"><button type="submit" class="btn btn-teal btn-sm">Criar voo</button></th>
    ';
    echo ' 
      </form>';
?>
 
  </tbody>
</table>   
</div>

</section> 

</div>
</div>


  </div>

  
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>
