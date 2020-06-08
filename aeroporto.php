<?php
 
$login_cookie = $_COOKIE['login'];if(isset($login_cookie)){}else{header('Location:login.php');} 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";
$aeroselecionado = $_GET['icao'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM aeroportos WHERE icao = '$aeroselecionado'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $nome = $row["nome"];
            $cidade = $row["cidade"];
            $pais = $row["pais"];
            $iata = $row["iata"];
            $icao = $row["icao"];
            $slotsdefault = $row["slots"];
            $runway = $row["runway"]; 
          }
      } else { 
          echo 'error';
      }   
      
$sql = "SELECT SUM(total) from slots WHERE icao = '$aeroselecionado'";
$result = $conn->query($sql);
$slots = mysqli_fetch_assoc($result);      
foreach ($slots as $conteudo){
    $slots = $conteudo;
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


      $sql = "SELECT icao FROM stations WHERE email = '$login_cookie' AND hub_empresa = 1 AND icao = '$aeroselecionado'";
      $result = $conn->query($sql);
      
            if ($result->num_rows > 0) {  
                while($row = $result->fetch_assoc()) {  
                  $hubs = $row["icao"]; 
                  if($hubs = $aeroselecionado){
                      $hubs = '';
                  }else{
                      $hubs = '<button class="btn btn-sm btn-outline-default m-0 px-5 py-1" type="button" data-toggle="modal" data-target="#hub">HUB</button>';
                  }
                }
            } else { 
                $hubs = '<button class="btn btn-sm btn-outline-default m-0 px-5 py-1" type="button" data-toggle="modal" data-target="#hub">HUB</button>';                 
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
        <link rel="stylesheet" href="mapa/ammap/ammap.css" type="text/css">
        <script src="mapa/ammap/ammap.js" type="text/javascript"></script> 
    	<script src="mapa/ammap/maps/js/brazilHigh.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
        <script type="text/javascript" src="js/popper.min.js"></script> 
        <script type="text/javascript" src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </head>
<body> 
  <div style="height: 100vh"> 
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
 

<script>
        function arthur(iata){
            var quantidad = $("#quantidade option:selected").val();
            var variata = iata; 
            var redireciona = 'process/comprarslots.php?i='+variata+'&'+variata+'='+(quantidad*194); 
            window.location.href=redireciona;
        };  
         </script>




<form method="POST" action="process/criarhub.php">
<div class="modal fade" id="hub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar HUB</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">  
  <li class="list-group-item">Ao criar HUB sua empresa ganhará permissão de decolagens para qualquer outro aeroporto<br>  
  <li class="list-group-item">O custo para fazer hub neste aeroporto é de $ <?php echo number_format(($slotsdefault*$runway), 0,'', ' '); ?>
</li>

</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        <button type="submit" class="btn btn-teal">Criar hub</button>
      </div>
    </div>
  </div>
</div> 
</form>


<!-- Modal --> 
<div class="modal fade" id="encomendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comprar</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">  
  <li class="list-group-item">Quantidade:<br>  
    <select name="quantidade" id="quantidade" class="browser-default custom-select"> 
        <option value="20">20</option>
        <option value="10">10</option>
        <option value="5">5</option> 
        <option value="1">1</option> 
    </select> 
</li>

</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        <button type="submit" class="btn btn-teal" onclick="arthur('<?php echo $iata; ?>');" >Comprar</button>
      </div>
    </div>
  </div>
</div> 

<div class="card" style="width: 70vw; margin-left: 15vw; margin-top: 5vh;">
  <div class="card-body">
     
        <script> 
            var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
            var planeSVG = "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47";

            
var worldDataProvider = {
    map: "brazilHigh",
    getAreasFromMap: true, 
};
 
			var map = AmCharts.makeChart("mapdiv", {
				type: "map",  
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

$sql = "SELECT * FROM aeroportos WHERE icao = '";
$codigo = $icao."'";
$sql = $sql.$codigo;

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
        echo '},'; 
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
 
			});
        </script> 
 

 

    <div class="container">
            <div class="row"> 
            <div class="col-sm list-group-item">
                    <div id="mapdiv" style="background-color:#EEEEEE; height: 70vh; justify-content-end"></div>   
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                Nome: <?php echo $nome;?>
            </div>
            <div class="col-sm list-group-item">
                IATA: <?php echo $iata;?>
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                ICAO: <?php echo $icao;?>
            </div>
            <div class="col-sm list-group-item">
                Cidade: <?php echo $cidade;?> 
            </div> 
        </div>
        <div class="row">
            <div class="col-sm list-group-item">
                País: <?php echo $pais;?> 
            </div>
            <div class="col-sm list-group-item">
                Pista: <?php echo $runway;?> metros
            </div> 
        </div> 
        <div class="row">
            <div class="col-sm list-group-item">
                Slots: <?php echo $slots;?> restantes
            </div>
            <div class="col-sm list-group-item">
      <div class="input-group">
<div class="input-group">     
            <?php echo $hubs; ?>
    <button class="btn btn-sm btn-default m-0 ml-2 px-5 py-1" type="button" data-toggle="modal" data-target="#encomendar">Comprar</button>   
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
</body>

</html>
