
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
 
  <div class="modal fade right" id="airbus" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="airbus">Sandbox</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 
            <form method="POST" action="mapa.php" class="">  
                <button value="br" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Brasil<h4><span class="badge badge-primary">155</span></h4></button>
                <button value="eu" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Europa<h4><span class="badge badge-primary">215</span></h4></button>
                <button value="us" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> América<h4><span class="badge badge-primary">501</span></h4></button>
                <button value="wl" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Mundo<h4><span class="badge badge-primary">415</span></h4></button>
                <!-- FAZER A VERIFICAÇÃO EM UMA PAGINA SEPARADA E REDIRECIONAR BASEADO NO MUNDO -->
            </form>

          <?php /*

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
          */  ?> 
      
       </ul>
        </div> 
      </div>
    </div>
  </div>  
 
 
<div class="modal fade right" id="antonov" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">         
          <h5 class="modal-title" id="antonov">Realistico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group">  
            <form method="POST" action="mapa.php" class="">  
                <button value="rbr" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Brasil<h4><span class="badge badge-primary">98</span></h4></button>
                <button value="reu" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Europa<h4><span class="badge badge-primary">75</span></h4></button>
                <button value="rus" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> América<h4><span class="badge badge-primary">68</span></h4></button>
                <button value="rwl" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Mundo<h4><span class="badge badge-primary">61</span></h4></button>
                <!-- FAZER A VERIFICAÇÃO EM UMA PAGINA SEPARADA E REDIRECIONAR BASEADO NO MUNDO -->
            </form>

          <?php 
/*
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
          */  ?> 
      
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
          <h5 class="modal-title" id="atr">Histórico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group"> 
            <form method="POST" action="redireciona.php" class="">  
                <button value="hbr" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Brasil<h4><span class="badge badge-primary">55</span></h4></button>
                <button value="heu" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Europa<h4><span class="badge badge-primary">45</span></h4></button>
                <button value="hus" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> América<h4><span class="badge badge-primary">35</span></h4></button>
                <button value="hwl" disabled="" type="submit" class="btn-block list-group-item d-flex justify-content-between align-items-center"> Mundo<h4><span class="badge badge-primary">28</span></h4></button>
                <!-- FAZER A VERIFICAÇÃO EM UMA PAGINA SEPARADA E REDIRECIONAR BASEADO NO MUNDO -->
            </form>

          <?php /*

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
          */  ?> 
      
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
  <link href="autocomplete.css" rel="stylesheet">
  <script src="airport.js"></script>
  <script src="autocomplete.js"></script>
  <script src="paises.js"></script> 
  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
  <script type="text/javascript" src="js/popper.min.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="js/mdb.min.js"></script>
</head>

<body>   

      
<div class="card" style="width: 70vw; margin-left: 15vw; margin-top: 2vh; height: 75vh;">
<form class="text-center" method="POST" action="logar.php"> 

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Servidores</strong>
    </h5> 
    <div class="card-body px-lg-4 pt-5">
  
<!-- Section: Products v.2 -->
<section class="text-center">

  <!-- Section heading --> 
  <div class="row my-4">
    <!-- Grid column -->
    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card card-cascade wider card-ecommerce"  data-toggle="modal" data-target="#airbus">
        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSWwYy9moD2Tll2RAqTD8fPf0b7gwIsCRVER1C3OqG7N4ft4b3NQ" class="card-img-top"
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
            <h4>Sandbox</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Modo incial, recomendado para novatos, há uma crescente demanda de passageiros por novos voos.</p>  
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
          <img src="https://globalonealliance.com/unique/wp-content/uploads/2017/06/gallery-full-1-314x160.jpg" class="card-img-top"
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
            <h4>Realístico</h4>
            </strong>
          </h4>
          <!-- Description -->
          <p class="card-text">Modo realístico, nesse modo a demanda de passageiros é constante e baseado em dados reais.<p> 
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
          <img src="https://thumbs.dreamstime.com/t/air-force-one-panorama-air-force-one-display-ronald-regan-presidential-library-simi-valley-california-99183141.jpg" class="card-img-top"
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
            <h4>Histórico</h4>
            </strong>
          </h4>
          <p class="card-text">Modo histórico, jogue com aeronaves históricas e uma demanda que varia ao longo do tempo.</p> 
        </div>
      </div>
    </div>  

</section> 
 
</div>
 
    </div>     
</body>
</html>
   
  </div>
 
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
  <script type="text/javascript" src="js/popper.min.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
