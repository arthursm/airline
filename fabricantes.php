
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
<!--/.Navbar -->
  <!-- Start your project here-->

  
    <!-- Button trigger modal -->

<!-- Modal --> 
 
  <div class="modal fade right" id="airbus" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="airbus">Airbus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 2 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  


<!-- Modal --> 
 
<div class="modal fade right" id="bombardier" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="bombardier">Bombardier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 3 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  
  
<!-- Modal --> 
 
<div class="modal fade right" id="comac" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="comac">Comac</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 8 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  
  
<!-- Modal --> 
 
<div class="modal fade right" id="embraer" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="embraer">Embraer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 4 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  
  
<!-- Modal --> 
 
<div class="modal fade right" id="sukhoi" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="sukhoi">Sukhoi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 7 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  
  
<!-- Modal --> 
 
<div class="modal fade right" id="tupolev" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="tupolev">Tupolev</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 6 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  
<!-- Modal --> 
 
<div class="modal fade right" id="antonov" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="antonov">Antonov</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 5 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>


<!-- Modal --> 
 
<div class="modal fade right" id="atr" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="atr">ATR</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 9 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'Não há aviões disponíveis.';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>
  
<!-- Modal --> 
 
<div class="modal fade right" id="boeing" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="boeing">Boeing</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 

          <?php 

              $sql = "SELECT id, model, pax FROM planes WHERE emp = 1 ORDER BY `model` ASC";
              $result = $conn->query($sql);

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                          echo '<form method="POST" action="aeronave.php" class="">'; 
                          echo '<input name="codigo" type="text" value="'.$row["id"].'" hidden=""/>';
                          echo '<button href="a" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center">'.$row["model"].
                          '<h4><span class="badge badge-primary">'.$row["pax"].'</span></h4></button>'; 
                          echo '</form>';
                        }
                    } else { 
                        echo 'error';
                    }  
            ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div> 
<div style="width: 70vw; margin-Left: 15vw;"> 
<!-- Section: Products v.2 -->
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h3-responsive font-weight-bold text-center my-5">Fabricantes</h2> 
  <div class="row">
    <!-- Grid column -->
    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#airbus">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://www.ifn.news/wp-content/uploads/2019/08/Isleofsilhouette-e1564684893200-326x245.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title -->
          <a href="" class="text-muted"> 
          </a>
          <h4 class="card-title">
            <strong> 
            <h4>Airbus</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Narrow Body - Wide Body</p> 
          <!-- Card footer --> 
        </div>
        <!-- Card content -->
      </div>
      <!-- Card -->
      
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce" data-toggle="modal" data-target="#antonov">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://polet.me/wp-content/uploads/2017/11/moscow-domodedovo-petrozavodsk-saratov-airlines-antonov-148-326x245.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Antonov</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Regional Jet</p> 
        </div>
      </div>
    </div>
    <!-- Grid column -->


    <!-- Grid column -->
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#atr">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://polet.me/wp-content/uploads/2018/02/nizhniy-novgorod-ufa-utair-atr-72-500-326x245.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>ATR</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Regional Jet</p> 
        </div>
      </div>
    </div> 
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#boeing">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://forbes.uol.com.br/wp-content/uploads/2019/03/forbeslife-norwegian-180319-divulgacao-326x245.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Boeing</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Narrow Body - Wide Body</p> 
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#bombardier">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://i0.wp.com/ukaviation.news/wp-content/uploads/2018/12/cityjet-crj900-sas.jpeg?resize=326%2C245&ssl=1" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Bombardier</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Regional Jet</p> 
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#comac">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://i.ibb.co/prznztM/Webp-net-resizeimage-1.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Comac</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Regional Jet</p> 
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#embraer">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://polet.me/wp-content/uploads/2019/04/novosibirsk-voronezh-s7-airlines-embraer-erj-170su-326x245.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Embraer</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Regional Jet</p> 
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#sukhoi">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="http://www.aeropolis.it/wp-content/uploads/2019/02/superjet-tessera-326x245.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Sukhoi</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Regional Jet</p> 
        </div>
      </div>
    </div>


    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#tupolev">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://i.ibb.co/9bLsY1k/Tupolev-Tu-204-100-RA-64047-1.jpg" class="card-img-top"
            alt="sample photo">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <!-- Category & Title --> 
          <h4 class="card-title">
            <strong> 
            <h4>Tupolev</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Narrow Body</p> 
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
