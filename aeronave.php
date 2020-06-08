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
   
$cod = $_POST["codigo"];


$sql = "SELECT * FROM planes WHERE id = $cod";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $codigo = $row["cod"];
            $fab = $row["fab"];
            $model = $row["model"];
            $img = $row["img"];
            $crew = $row["crew"];
            $pax = $row["pax"];
            $range = $row["range"];
            $speed = $row["speed"];
            $ground = $row["ground"];
            $price = $row["price"];
            $build = $row["build"];  
          }
      } else { 
          echo 'error';
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
<form action="encomendar.php" method="POST">
<div class="modal fade" id="encomendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Encomendar</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
  <li class="list-group-item">Nome: <?php echo $model;?></li>
  <input type="text" value="<?php echo $model;?>" name="plane" hidden="">
  <li class="list-group-item">Preço: $ <?php echo number_format($price, 0,'', ' ');?> </li> 
  <li class="list-group-item">Deposito para aluguel: $ <?php echo number_format(($price/20), 0,'', ' ');?> </li> 
  <li class="list-group-item">Aluguel por semana: $ <?php echo number_format(($price/200), 0,'', ' ');?> </li> 
  <li class="list-group-item">Quantidade:<br>
  
  <select name="quantidade" class="browser-default custom-select"> 
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option> 
</select> 
</li>
</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" name="encomendar" value="1">Alugar</button>
        <button type="submit" class="btn btn-teal" name="encomendar" value="2">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="card" style="width: 70vw; margin-left: 15vw; margin-top: 5vh;">
  <div class="card-body">
    <h5 class="font-weight-bold mb-3"><?php echo $model;?></h5>
    <img src="<?php echo $img;?>" class="img-fluid rounded mx-auto d-block " alt="Responsive image">
  </div> 
 

    <div class="container">
        <div class="row">
            <div class="col-sm list-group-item">
                Preço: $ <?php echo number_format($price, 0,'', ' ');?>
            </div>
            <div class="col-sm list-group-item">
                Fabricante: <?php echo $fab;?>
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                Código: <?php echo $codigo;?>
            </div>
            <div class="col-sm list-group-item">
                Tripulação: <?php echo $crew;?> pilotos
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                Passageiros: <?php echo $pax;?> Y
            </div>
            <div class="col-sm list-group-item">
                Alcance:  <?php echo number_format($range, 0,'', ' ');?> km
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                Velocidade: <?php echo $speed;?> km/h
            </div>
            <div class="col-sm list-group-item">
                Pista: <?php echo number_format($ground, 0,'', ' ');?> metros
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                Construidos: <?php echo $build;?> unidades
            </div>
            <div class="col-sm list-group-item">
      <div class="input-group">
<div class="input-group"> 
   
    <button class="btn btn-sm btn-outline-default m-0 px-5 py-1" type="button" id="button-addon2" data-toggle="modal" data-target="#encomendar">Encomendar</button>
 
</div>
                </div>
            </div> 
        </div>
    </div>
  
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
