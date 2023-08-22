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

$busqueda = '';
          if (empty($_REQUEST['search'])){
              header("location: pacientes_turnos.php");
          }
          if (!empty($_REQUEST['search'])){
              $busqueda= strtolower($_REQUEST['search']);
              $where = "apellido LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR edad LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR fecha_turno LIKE '%$busqueda%' OR hora_turno LIKE '%$busqueda%'";
          }
            
            $query = "SELECT pacientes.apellido, pacientes.nombre, pacientes.edad, pacientes.uni_edad, pacientes.telefono, turnos.fecha_turno, turnos.hora_turno FROM pacientes JOIN turnos ON pacientes.id_paciente=turnos.id_paciente WHERE $where";
            $consulta = mysqli_query($conn,$query);
            
            //echo $busqueda
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
    <title>Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;">
        <div class="container-fluid">
            <img src="./img/checklist-64.png" alt="" style="width:50px">
          <p class="navbar-brand"></p>
          <form class="d-flex" role="search" style="margin-top: 10px;">
            <input id="inputSearch" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit" title="Buscar" onclick="" id="searchBtn2"><i class="fa fa-search" aria-hidden="true"></i></button>   
          </form>
          </div>
          </nav>
          <div class="b-example-divider" style="margin-left:10px;margin-top:10px">
              <a type="button" href="./calendario/calendar.php" class="btn btn-success" title="Nuevo Turno"><i class="fa fa-calendar-plus-o"></i></a>
              <a href="./indexApp.php" class="btn btn-secondary" title="Volver"><i class="fa fa-home" aria-hidden="true"></i></a>
              <a href="javascript:location.reload()" class="btn btn-secondary" title="Actualizar"><i class="fa fa-refresh" aria-hidden="true"></i></a><br>
              <div class="container-fluid">
              <a type="text" id="hoy" class="nav-link disabled" style="margin-top:10px"> </a>
              </div>
          </div>
          <hr>
          <div style="overflow-x:auto;">
          <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Apellido</th>
              <th scope="col">Nombre</th>
              <th scope="col">Edad</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <?php
            while($mostrar = mysqli_fetch_array($consulta)){
            ?>
          <tbody>
            <tr id="lista">
              <td style="color:red"><?php echo $mostrar['apellido']?></td>
              <td style="color:red"><?php echo $mostrar['nombre']?></td>
              <td style="color:red"><?php echo $mostrar['edad'];echo " ";echo $mostrar['uni_edad']?></td>
              <td style="color:red"><?php echo $mostrar['telefono']?></td>
              <td style="color:red"><?php echo $mostrar['fecha_turno']?></td>
              <td style="color:red"><?php echo $mostrar['hora_turno']?></td>
              <td>
                  <a type="button" href="./resultado_pacientes.php?id_paciente=<?php echo $mostrar['id_paciente']?>" class="btn btn-secondary" title="Ficha"><i class="fa fa-address-card"></i></a>
                  </td>
            </tr>
          </tbody>
          
          <?php  
            }
                ?>
        </table>
        </div> 
     
        <script src="./time.js"></script>
        <script src="./search.js"></script>
        <script src="./confirmacion.js"></script>
</body>
</html>