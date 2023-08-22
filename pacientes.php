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

            $query = "SELECT * from pacientes ORDER BY apellido";
            $consulta = mysqli_query($conn,$query);
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
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;">
        <div class="container-fluid">
            <img src="./img/children-80.png" alt="" style="width:50px">
          <p class="navbar-brand"></p>
          <form class="d-flex" role="search" style="margin-top: 10px;">
            <input id="inputSearch" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit" title="Buscar" onclick="" id="searchBtn1"><i class="fa fa-search" aria-hidden="true"></i></button>  
          </form>
          </div>
          </nav>
          <div class="b-example-divider" style="margin-left:10px;margin-top:10px">
              <a href="./form_pacientes.php" class="btn btn-success" title="Ingresar Nuevo Paciente"><i class="fa fa-user-plus"></i></a>
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
              <th scope="col"></th>
              <th scope="col">Apellido</th>
              <th scope="col">Nombre</th>
              <th scope="col">Edad</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Grupo Sanguineo</th>
              <th scope="col">Obra Social</th>
              <th scope="col">Antecedentes Personales</th>
            </tr>
          </thead>
          <?php
            while($mostrar = mysqli_fetch_array($consulta)){
            ?>
          <tbody>
            <tr id="lista">
              <td>
                  <div class="container-fluid">
                  <a type="button" href="./resultado_pacientes.php?id_paciente=<?php echo $mostrar['id_paciente']?>" class="btn btn-secondary" style="width:50px;margin:2px" title="Ficha"><i class="fa fa-address-card"></i></a>
                  <a type="button" href="./resultado_consultas.php?id_paciente=<?php echo $mostrar['id_paciente']?>" class="btn btn-secondary" style="width:50px;margin:2px" title="Consultas"><i class="fa fa-stethoscope"></i></a>
                  </div>
               </td>
              <td><?php echo $mostrar['apellido']?></td>
              <td><?php echo $mostrar['nombre']?></td>
              <td><?php echo $mostrar['edad']?></td>
              <td><?php echo $mostrar['telefono']?></td>
              <td><?php echo $mostrar['grupo_sanguineo']?></td>
              <td><?php echo $mostrar['obra_social']?></td>
              <td><?php echo $mostrar['ant_personales']?></td>
            </tr>
          </tbody>
          <?php  
            }
                ?>
        </table>
        </div> 
     <!-- Modal -->
  <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  Necesita confirmar antes de eliminar este paciente!
                </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="spinner-border text-danger" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a type="button" href="./edicion/pacientes_eliminar.php?id_paciente=<?php echo $id_paciente?>" id="editBtn" class="btn btn-danger">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
        <script src="./time.js"></script>
        <script src="./search.js"></script>
        <script src="./confirmacion.js"></script>
</body>
</html>