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
 
<!-- Modal -->
<div class="modal fade" id="aeroportos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aeroportos recomendados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">São Paulo - GRU / CGH</li> 
            <li class="list-group-item">Brasilia - BSB</li>
            <li class="list-group-item">Rio de Janeiro - GIG / SDU</li> 
            <li class="list-group-item">Belo Horizonte - CNF</li>  
            <li class="list-group-item">Campinas - VCP</li> 
            <li class="list-group-item">Recife - REC</li> 
            <li class="list-group-item">Porto Alegre - POA</li> 
            <li class="list-group-item">Salvador - SSA</li> 
            <li class="list-group-item">Fortaleza - FOR</li> 
            <li class="list-group-item">Curitiba - CWB</li> 
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="regras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Regras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">É PERMITIDO a utilização de letras e numeros, sendo o mínimo 3 e o máximo 16 caracteres.<br><br> É PROIBIDOS qualquer nome que apresente conteúdo chulo, impróprio, ofensivo, rude, obsceno, agressivo ou imoral.</li>  
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="casosemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">O Email será utilizado quando:<br><br>
            1 - O usuário perder o login; <br>
            2 - O usuário perder a senha; <br>
            3 - O usuário consiga por meio de experiencia ter acesso aos outros modos de jogo.</li>  
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
      </div>
    </div>
  </div>
</div>

      
<div class="card" style="width: 70vw; margin-left: 15vw; margin-top: 2vh;">
<form class="text-center" method="POST" action="cadastrar.php"> 

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Cadastro</strong>
    </h5> 
    <div class="card-body px-lg-4 pt-5">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="ceo" name="ceo" class="form-control" placeholder="CEO" minlength="4" maxlength="12" required=""> 
                        <small id="passwordHelpBlock" class="form-text text-muted">O nick do CEO deve conter de 4 a 12 <strong>letras e sem espaços</strong>.<br> </small>
                    </div>
                </div>                
                <div class="col">                
                    <div class="md-form">  
                        <select id="server" name="server" class="browser-default custom-select mb-4" required="">
                            <option value="1" >Servidor Eos</option>
                            <option value="2" disabled>Servidor Alfeu</option>
                            <option value="3" disabled>Servidor Deméter</option>
                            <option value="4" disabled>Servidor Hipnos</option>
                            <option value="5" disabled>Servidor Hefesto</option>
                            <option value="6" disabled>Servidor Crato</option>
                        </select>
                    </div>
                    
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" required=""> 
                        <small id="passwordHelpBlock" class="form-text text-muted">O email será utilizado em <a href="" target="_blank" data-toggle="modal" data-target="#casosemail">determinados casos.</a></small>
                    </div> 
            </div> 
  
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="password" id="senha1" name="senha1" class="form-control" placeholder="Senha" required=""> 
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="password" id="senha2" name="senha2" class="form-control" placeholder="Repita a senha" required=""> 
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="empresa" name="empresa" class="form-control" placeholder="Empresa" required="" minlength="3" maxlength="16"> 
                        <small id="passwordHelpBlock" class="form-text text-muted">Atenção as <a href="" target="_blank" data-toggle="modal" data-target="#regras">regras </a> para nomes de empresas.</small>                   
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="cod" name="cod" class="form-control" placeholder="Código" minlength="2" maxlength="3" required=""> 
                        <small id="passwordHelpBlock" class="form-text text-muted">O código da empresa deverá ter 2 ou 3 <strong>letras</strong>.</small>
                    </div>
                </div>
            </div>

            
            <div class="md-form">
              <input type="text" name="aero" id="aero" name="aero" class="form-control mdb-autocomplete" placeholder="Hub" required="">
                <script>autocomplete(document.getElementById("aero"), dados);</script> 
            </div>    
            <small id="passwordHelpBlock" class="form-text text-muted">O Hub é o <strong>principal centro de operação da empresa, </strong> é recomendado um  <a href="" target="_blank" data-toggle="modal" data-target="#aeroportos">aeroporto com grande movimentação.</a> </small>
                 
 
            <div class="col">
            <a href="login.php"><button class="btn btn-outline-info btn-rounded btn-lg my-4 waves-effect z-depth-0" type="button">Login</button></a>
            <button class="btn btn-info btn-rounded btn-lg my-4 waves-effect z-depth-0" type="submit">Cadastrar</button> 
            </div> 
  

        </form>
        <!-- Form -->

    </div>     
</body>
</html>
   