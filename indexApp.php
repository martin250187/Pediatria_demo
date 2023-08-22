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
            //PACIENTES
            $query1 = "SELECT count(*) AS total_pacientes FROM pacientes";
            $total1 = mysqli_query($conn,$query1);
            $totalPacientes = mysqli_fetch_array($total1);
            
            //CONSULTAS
            $query2 = "SELECT count(*) AS total_consultas FROM consultas";
            $total2 = mysqli_query($conn,$query2);
            $totalConsultas = mysqli_fetch_array($total2);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/socicon/css/styles.css">
    <link href="./indexApp.css" rel="stylesheet">
</head>

<body>
    <nav id="title" class="navbar navbar-dark bg-dark">
        <div class="container-fluid" style="justify-content: center">
            <img src="https://mapgeogis.com/pediatria_demo/img/medical-app-64.png" alt="" style="margin-top: 0px;">
            <p class="navbar-brand" style="margin-left:20px;margin-top:10px">CONSULTORIO PEDIATRICO</p>
            <a class="btn btn-warning" href="https://mapgeogis.com/pediatria_demo/login/login.html" role="button"
                title="Pacientes">Acceder &#128272</a>
        </div>
    </nav>

    <div class="container-fluid" id="containerBtn" style="justify-content: center">
        <div class="container-fluid">
            <a id="menuBtn" class="btn btn-secondary" href="./pacientes.php" role="button">Pacientes<img src="./img/children-80.png"></a>
            <a id="menuBtn" class="btn btn-secondary" href="./form_pacientes.php" role="button">Nuevo Paciente<img style="margin-top: 0px;" src="./img/add-user-80.png"></a>
            <a id="menuBtn" class="btn btn-secondary" href="./calendario/calendar.php" role="button">Calendario<img src="./img/calendar-100.png"></a>
            <a id="menuBtn" class="btn btn-secondary" href="./pacientes_turnos.php" role="button">Turnos<img src="./img/pass-fail-100.png"></a>
            <a id="menuBtn" class="btn btn-secondary" href="#" role="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">Estadísticas<img
                    src="./img/graph-66.png"></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDocumentos">
                Documentos<img src="https://mapgeogis.com/pediatria_demo/img/file-64.png">
            </button>

            <a id="menuBtn" class="btn btn-secondary" href="#" role="button" title="Soporte  Técnico" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Soporte<img
                    src="./img/app-64.png"></a>
        </div>
    </div>


    <!-- Modal Documentos-->
    <div class="modal fade" id="modalDocumentos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Documentos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <a href="./img/calendario_vacunacion.jpg" id="listBtn" class="list-group-item list-group-item-action list-group-item-dark">Calendario de Vacunación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Estadisticas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <ul class="list-group">
                  <li class="list-group-item">Pacientes registrados: <?php echo $totalPacientes['total_pacientes'] ?></li>
                  <li class="list-group-item">Consultas Realizadas: <?php echo $totalConsultas['total_consultas'] ?></li>
              </ul>
          </div>
        </div>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom"
            aria-labelledby="offcanvasBottomLabel">
            <div class="container-sm">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    mapgeogis.com <a href="https://mapgeogis.com" target="_blank" type="button"
                        class="btn btn-light"><img style="height:30px;width:30px;margin:0;border-radius:50%"
                            src="https://mapgeogis.com/pediatria_demo/img/logo.png"></a>
                </p>
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    +54 2284-693672 <a href="https://t.me/mapgeogis" target="_blank" type="button"
                        class="btn btn-light"><img style="height:30px;width:30px;margin:0"
                            src="https://mapgeogis.com/pediatria_demo/img/telegram-app-96.png"></a>
                </p>
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    contacto@mapgeogis.com <a href="mailto:contacto@mapgeogis.com" target="_blank" type="button"
                        class="btn btn-light"><img style="height:30px;width:30px;margin:0"
                            src="https://mapgeogis.com/pediatria_demo/img/gmail-logo-96.png"></a>
                </p>
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    &copy Copyright 2022 MapGeo GIS - All Rights Reserved
                </p>
            </div>
        </div>
    </footer>
</body>

</html>