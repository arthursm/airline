<?php

$login_cookie = $_COOKIE['login'];if(isset($login_cookie)){}else{header('Location:login.php');}

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
   
      
$sql = "SELECT empresa, money FROM enterprises WHERE email = '$login_cookie'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $empresa = $row["empresa"];
            $money = $row["money"]; 
          }
      } else { 
          echo 'error';
      }  
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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link href="autocomplete.css" rel="stylesheet">
  <script src="airport.js"></script>
  <script src="autocomplete.js"></script>
  <script src="paises.js"></script> 
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







<!-- Modal -->
<div class="modal fade" id="newroute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova rota</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group"> 
 
  
            <form method="POST" action="process/novarota.php">
            
              <div class="md-form">
                Numero do voo: <input type="number" name="idv" id="idv" minlength="1" maxlength="4" min="1" max="9999" class="form-control mdb-autocomplete" required="">
              </div>

              <div class="md-form">
                Origem: <input type="search" name="origem" id="origem" class="form-control mdb-autocomplete" required="">
              </div>
              
              <div class="md-form">
                Via: <input type="search" name="via" id="via" class="form-control mdb-autocomplete">
              </div>
              
              <div class="md-form">
                Destino: <input type="search" name="destino" id="destino" class="form-control mdb-autocomplete" required="">
              </div> 
              
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-teal">Criar rota</button>
      </div>
            </form> 


<?php 

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
<script>   
autocomplete(document.getElementById("origem"), dados);  
autocomplete(document.getElementById("via"), dados);  
autocomplete(document.getElementById("destino"), dados);  
</script>
 

 </ul>
      </div> 
    </div>
  </div>
</div>








<div class="card" style="width: 70vw; margin-left: 15vw; margin-top: 5vh;">
  <div class="card-body">
    <h5 class="font-weight-bold mb-3">Rotas</h5>  
  </div> 
 
<table class="table"> 

  <tbody>
  
  <?php 

$sql = "SELECT * FROM routes WHERE email = '$login_cookie' ORDER BY `hrp` ASC";
$result = $conn->query($sql);

echo '
<thead class="black white-text">
  <tr>
    <th scope="col">N°</th>
    <th scope="col">Origem</th> 
    <th scope="col">Destino</th> 
    <th scope="col">Partida</th> 
    <th scope="col">Terminal</th> 
  </tr>
</thead>';
      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {   
            echo '<tr>'; 
            echo '<th scope="row">'.$row["voo"].'</th>';
            echo '<td>'.$row["partida"].' ('.$row["icaop"].')</td>'; 
            echo '<td>'.$row["chegada"].' ('.$row["icaoc"].')</td>';
            echo '<td>'.$row["hrp"].'</td>';
            echo '<td> T1 </td>';  
            echo '</tr>';
          }
      } else {  
          echo '
          <thead class="black white-text">
            <tr>
            <th scope="col" colspan="5"><center><a href="fabricantes.php"><button type="button" class="btn btn-primary  btn-sm m-0 px-3 md-4">Clique para abrir sua primeira rota</button></a></center></th> 
            </tr>
          </thead>';
      }  
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
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
