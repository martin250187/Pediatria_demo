<?php
$servername = "mapgeogis.com";
$username = "u862590154_admin";
$password = "Martin1234";
$dbname = "u862590154_hc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

            $total = "SELECT count(*) AS total_pacientes FROM pacientes";
            $consulta_total = mysqli_query($conn,$total);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="./img/medical-app-64.png" type="image/png" style="border-radius: 50px;">
    <title>CONSULTORIO PEDIATRICO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./index.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
                
                <img src="./img/medical-app-64.png" class="logo" alt="">
               <span>  
          <h2 class="navbar-brand" >CONSULTORIO PEDIATRICO</h2></span>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a href="./pacientes.php" id="menuBtn" class="btn btn-secondary" type="button">
                    Pacientes
                  </a>
              </li>
              <li class="nav-item dropdown">
                <button id="menuBtn" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Turnos
                  </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="./calendario/calendar.php">Calendario</a></li>
                  <li><a class="dropdown-item" href="./pacientes_turnos.php">Ver Turnos</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                  <button id="menuBtn" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Vacunación
                  </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="./img/calendario_vacunacion.jpg">Ver Calendario</a></li>
                  <!--<li><a class="dropdown-item" href="./img/protocolo_anticuagulado.jpg">Anticuagulado</a></li>
                  <li><a class="dropdown-item" href="./img/protocolo_evw.jpg">Enfermedad de Von Willebrand</a></li>
                  <li><a class="dropdown-item" href="#">Hemoglobinopatía</a></li>
                  <li><a class="dropdown-item" href="#">Histiositosis</a></li>
                     <!-- Default dropend button -->
                            <!--<div class="btn-group dropend">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                PTI
                              </button>
                              <ul class="dropdown-menu dropdown-menu-dark">
                                  <li><a class="dropdown-item" href="./img/PTI/PTI_cronico.jpg">PTI Crónico</a></li>
                                  <li><a class="dropdown-item" href="./img/PTI/PTI_cronico_persistente.jpg">PTI Persistente y Crónico</a></li>
                                  <li><a class="dropdown-item" href="./img/PTI/PTI_reciente_diagnostico.jpg">PTI Reciente Diagnóstico</a></li>
                              </ul>
                            </div>-->
                </ul>
             </li>
                <button class="btn btn-primary" id="btnLogin" type="button" style="display:none">Login</button>
          </div>
        </div>

      </nav>
      <footer>
       <!--<img src="./HTetamanti_.jpg" alt="" class="img-fluid" style="width:100%; position: relative">-->
       <div class="container-fluid" style="background-color:#212529"><br>
              <?php
                          $total = mysqli_fetch_array($consulta_total);
                      ?>
            <span style="color:#FFFFFF">Pacientes Totales: <?php echo $total['total_pacientes']?></span>
        </div>
      </footer>
        <!--<a type="text" id="hoy" class="nav-link disabled" style="color: ivory;background-color:black">Actualización... </a>-->
        
    <script src="time.js"></script>
</body>
</html>