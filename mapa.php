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

$sql = "SELECT cidade, lat, log FROM aeroportos WHERE inau > '2000-00-00'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a = "id: " . $row["cidade"]. " - Name: " . $row["lat"]. " " . $row["log"]. "<br>";
    }
} else {
    echo "0 results";
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
$conn->close();
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amMap example</title>

        <link rel="stylesheet" href="mapa/ammap/ammap.css" type="text/css">
        <script src="mapa/ammap/ammap.js" type="text/javascript"></script> 
		    <script src="mapa/ammap/maps/js/brazilHigh.js" type="text/javascript"></script>
        <script> 
            var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
            var planeSVG = "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47";

            
var worldDataProvider = {
    map: "brazilHigh",
    getAreasFromMap: true, 
};
 
			var map = AmCharts.makeChart("mapdiv", {
				type: "map", 
        mouseWheelZoomEnabled: true, 
				balloon: {
					color: "#000000"
				},

				dataProvider: {
					map: "brazilHigh",
                    getAreasFromMap: true,
                    
    areas: [{
        id: "BR-AC",
        url: "estado/acre.php",  
    }],
 
                    images: [  
                        

<?php
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

$sql = "SELECT nome, icao, cidade, lat, log FROM aeroportos WHERE capital = 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 

        echo '{svgPath: targetSVG, title:"';
        echo $row["cidade"]; 
        echo '", latitude: ';
        echo $row["lat"];
        echo ', longitude:';
        echo $row["log"];
        echo ', scale: 0.6'; 
        echo ', url: "aeroporto.php?icao='. $row["icao"].'"},'; 
    }
} else { 
    echo 'error';
}


   
$sql = "SELECT nome, icao, cidade, lat, log FROM aeroportos WHERE capital = 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 

        echo '{svgPath: targetSVG, title:"';
        echo $row["cidade"]; 
        echo '", latitude: ';
        echo $row["lat"];
        echo ', longitude:';
        echo $row["log"];
        echo ', scale: 0.4'; 
        echo ', url: "aeroporto.php?icao='.$row["icao"].'"},'; 
    }
} else { 
    echo 'error';
} 
$conn->close();
?>
                    ]},
                     
                imagesSettings: {
                    color: "#CC0000", 
                    selectedColor: "#000000"  
                },

                linesSettings: {
                    color: "#585869",  
                    alpha: 0.3,
                    bringForwardOnHover: false, 
                },


				areasSettings: {
					autoZoom: false,
					selectedColor: "#CC0000"
				},
 
			});
        </script>
    </head>
</html>


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
<!--/.Navbar -->



<div id="mapdiv" style="background-color:#EEEEEE; height: 92vh;"></div> 

  </div>
  <!-- Start your project here-->

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
