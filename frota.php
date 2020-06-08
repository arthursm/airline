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
   
      
$sql = "SELECT id, empresa, money FROM enterprises WHERE email = '$login_cookie'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {  
            $empresa = $row["empresa"];
            $money = $row["money"];             
            $id_empresa = $row["id"]; 
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
  <script src="selectsearch.js"></script>
  <script src="paises.js"></script> 
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
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



<!-- METODO PALIATIVO HÁ NECESSIDADE DE CRIAR UM MODAL PARA CADA PLANE, FAZ ISSO COM A PASSAGEM DE PARAMETROS DO BOTAO P O MODAL -->
<!-- Modal -->


<?php


$sql = "SELECT SUM(hub_empresa) from stations WHERE email = '$login_cookie' ";
$result = $conn->query($sql);
$hubs = mysqli_fetch_assoc($result);      
foreach ($hubs as $quantidade){
    $hubs = $quantidade;
}   


$sql = "SELECT COUNT(cidade) from stations WHERE email = '$login_cookie' ";
$result = $conn->query($sql); 

$rtsaf = mysqli_fetch_assoc($result);      
foreach ($rtsaf as $qtdaero){ 
}   

/* ORIGEM */
$ocidade = [];
$oiata = [];

$sql = "SELECT cidade, iata FROM stations WHERE hub_empresa = 1 AND email = '$login_cookie' AND slots_disponivel > 0 ORDER BY `cidade` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {  
          $a = 0;
          while($row = $result->fetch_assoc()) {   
            $ocidade[$a] = $row["cidade"];
            $oiata[$a] = $row["iata"];   
            $a++;
          } 
          $a = 0; 
      while($a < $hubs){  
        $oaeroportos[$a] = $ocidade[$a] .' - '. $oiata[$a];    
        $a++;
      }  
      } else { 
        $oaeroportos[0] = 'Não há hubs com slots disponiveis'; 
      }     
      
/* DESTINO / VIAS */
$cidade = [];
$iata = [];
$sql = "SELECT cidade, iata FROM stations WHERE email = '$login_cookie' AND slots_disponivel > 0 ORDER BY `cidade` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {  
          $i = 0;
          while($row = $result->fetch_assoc()) {  
            
            $dcidade[$i] = $row["cidade"];
            $diata[$i] = $row["iata"]; 
            $daeroportos[$i] = $dcidade[$i] .' - '. $diata[$i];  
            $i++;
          }
      } else { 
        $daeroportos[0] = 'Não há aeroportos com slots disponiveis';
        $destinos = 1;
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
 
$sql = "SELECT id FROM buylea WHERE id_empresa = '$id_empresa'";
$result = $conn->query($sql);

/*
<div class="md-form">
Via: 
  <div class="col">    
    <select id="via" name="via" class="browser-default custom-select mb-4">';
    $index = 0;
      while($index < $qtdaero){                        
        echo '<option value="'.$diata[$index].'" >'.$daeroportos[$index].'</option>';
        $index++;
      } 
      echo '
  </select>
  </div>              
</div>  
*/
      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {   
echo '
<div class="modal fade" id="a'.$row["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo voo</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group"> 
 
  
            <form method="POST" action="process/novarota.php">
            <div class="md-form">
            
            Numero do voo: <input type="number" name="voo" minlength="1" maxlength="4" min="1" max="9999" required=""> 
            <br><br>
                Origem: 
                <div class="col">    
                  <select id="origem" name="origem" class="browser-default custom-select mb-4" required="">'; 
                    $index = 0;
                      while($index < $hubs){                        
                        echo '<option value="'.$oiata[$index].'" >'.$oaeroportos[$index].'</option>';
                        $index++;
                      } 
                      echo '
                  </select>
                </div>              
            </div>  

            <div class="md-form">
              Destino: 
                <div class="col">    
                  <select id="destino" name="destino" class="browser-default custom-select mb-4">';
                  $index = 0;
                    while($index < $qtdaero){                        
                      echo '<option value="'.$diata[$index].'" >'.$daeroportos[$index].'</option>';
                      $index++;
                    } 
                    echo '
                </select>
                </div>              
            </div>  
            
            
            <input type="number" value="'.$row["id"].'" name="plane" hidden="">
                
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-teal">Criar rota</button>
        
      </div>
            </form>  
  

 </ul>
      </div> 
    </div>
  </div>
</div>
';
}   
} else { 
echo '';
}  




?> 


<script>   
autocomplete(document.getElementById("origem"), dados);  
autocomplete(document.getElementById("via"), dados);  
autocomplete(document.getElementById("destino"), dados);  
</script>
 

<div class="card" style="width: 70vw; margin-left: 15vw; margin-top: 5vh;">
  <div class="card-body">
    <h5 class="font-weight-bold mb-3">Frotas</h5>  
  </div> 
             
           
<table class="table"> 
<thead class="black white-text">
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Aeronave</th>  
                <th scope="col">Cronograma</th>  
                <th scope="col"> </th> 
              </tr>
            </thead>
  <?php  

$sql = "SELECT buylea.id, buylea.cod, model FROM planes INNER JOIN buylea ON planes.id = buylea.id_aviao WHERE buylea.id_empresa = '$id_empresa'";
$result = $conn->query($sql);

      if ($result->num_rows > 0) {  
          while($row = $result->fetch_assoc()) {   
            echo '<tbody>';
            echo '<tr>'; 
            echo '<th scope="row">'.$row["cod"].'</th>';
            echo '<td>'.$row["model"].'</td>';   
            echo '<td>86%</td>'; 
            echo '<td class="d-flex justify-content-end">';   
            echo '<button type="button" class="btn btn-primary  btn-sm m-0 px-3 md-4" data-toggle="modal" data-target="#a'.$row["id"].'"><i class="fas fa-calendar-plus" aria-hidden="true"></i></button>';
            echo '<button type="button" class="btn btn-primary  btn-sm m-0 px-3 md-4"><i class="fas fa-book" aria-hidden="true"></i></button>';          
            echo '<button type="button" class="btn btn-primary  btn-sm m-0 px-3 md-4"><i class="far fa-list-alt" aria-hidden="true"></i></button>';          
            echo '</td>';  
            echo '</tr>';
          }
      } else {   
        echo '
        <thead>
          <tr>
            <th scope="col" colspan="4"><center><a href="fabricantes.php"><button type="button" class="btn btn-primary  btn-sm m-0 px-3 md-4">Clique para comprar seu primeiro avião</button></a></center></th> 
          </tr>
        </thead>
          
        <tbody>';
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
