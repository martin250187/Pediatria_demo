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

            $id_paciente = $_GET["id_paciente"] ;
            $query = "SELECT * FROM pacientes WHERE id_paciente = '$id_paciente'";
            $consulta = mysqli_query($conn,$query);
            while($mostrar = mysqli_fetch_array($consulta)){
            ?>
 
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="../img/medical-app-64.png" type="image/png" style="border-radius: 50px;">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./formEdicion.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="cursor:arrow">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px; background-color:#ffc107">
        <div class="container-fluid" style="">
            <p class="navbar-brand"><?php echo strtoupper($mostrar['apellido']); echo " ";echo strtoupper($mostrar['nombre'])?>--> Modo Edición [&#128397]</p>
            <!--<img src="../img/children.png" alt="" style="width:50px">-->
          </div>
          </nav>
          <div class="b-example-divider" style="margin-left:10px;margin-top:10px">
              <button type="button" title="Volver" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
              <a type="button" href="../indexApp.php" title="Volver" class="btn btn-secondary"><i class="fa fa-home"></i></a>
          </div>
          <hr>
     <!--DATOS GENERALES-->
      <div class="container-fluid" style="display:flex; justify-content:center;">
      <form action="./registro-pacientes_editar.php" method="post" style="max-width:500px">
          <div class="input-group" style="display:none;">
        <span class="input-group-text">ID Paciente</span>
        <input class="form-control" type="text" placeholder="--" value="<?php echo $mostrar['id_paciente']?>" name="id_paciente" id="id_paciente">
    </div>
        <div class="input-group">
        <span class="input-group-text" style="background-color:#6c757d; color:#FFFFFF" >Fecha de Registro</span>
        <input class="form-control" placeholder="--" id="fecha_reg" name="fecha_reg" value="<?php echo $mostrar['fecha_reg']?>" readonly>
        </div>  <hr>
        <div class="input-group">
            <span class="input-group-text">Nombre y Apellido</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['nombre']?>" class="form-control" name="nombre" id="nombre">
            <input type="text" placeholder="--" value="<?php echo $mostrar['apellido']?>" class="form-control" name="apellido" id="apellido">
        </div>
    
    <div class="input-group">
        <span class="input-group-text">Fecha de Nacimiento</span>
        <input class="form-control" type="date" placeholder="--" value="<?php echo $mostrar['fecha_nac']?>" name="fecha_nac" id="fecha_nac">
    </div>
    <div class="input-group">
        <span class="input-group-text">Sexo</span>
        <input class="form-control" type="text" placeholder="--" value="<?php echo $mostrar['sexo']?>" name="sexo" id="sexo">
    </div>
    <div class="input-group">
        <span class="input-group-text">Edad</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['edad']; echo " ";echo $mostrar['uni_edad']?>" name="edad" id="edad" readonly>
    </div>
    <div class="input-group" style="display:none">
        <span class="input-group-text">Unidad Edad</span>
        <input class="form-control" type="text" placeholder="--" value="<?php echo $mostrar['uni_edad']?>" name="uni_edad" id="uni_edad">
    </div>
    <div class="input-group">
        <span class="input-group-text">DNI</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['dni']?>" name="dni" id="dni">
    </div>
    <div class="input-group">
        <span class="input-group-text">Domicilio</span>
        <input type="text" placeholder="--" value="<?php echo $mostrar['calle']?>" class="form-control" name="calle" id="calle">
        <input type="text" placeholder="--" value="<?php echo $mostrar['calle_nro']?>" class="form-control" name="calle_nro" id="calle_nro">
    </div>
    <div class="input-group">
        <span class="input-group-text">Localidad</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['localidad']?>" name="localidad" id="localidad">
    </div>
    <div class="input-group">
        <span class="input-group-text">Obra Social</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['obra_social']?>" name="obra_social">
    </div>
    <div class="input-group">
        <span class="input-group-text">Nro Afiliado</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['afiliado_nro']?>" name="afiliado_nro">
    </div>
    <div class="input-group">
        <span class="input-group-text">Contacto</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['telefono']?>" name="telefono">
    </div>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['email']?>" name="email">
      </div>
    <div class="input-group">
        <span class="input-group-text">Grupo Sanguíneo</span>
        <input type="text" class="form-control" placeholder="--" value="<?php echo $mostrar['grupo_sanguineo']?>" name="grupo_sanguineo">
    </div>
    
    <div class="form-floating">
        <span class="input-group-text">Antecedentes Personales</span>
        <textarea class="form-control" style="height: 100px" name="ant_personales"><?php echo $mostrar['ant_personales']?></textarea>
    </div>
    <div class="form-floating" style="margin-bottom:20px">
        <span class="input-group-text">Antecedentes Familiares</span>
        <textarea class="form-control" style="height: 100px" name="ant_familiares"><?php echo $mostrar['ant_familiares']?></textarea>
    </div>
    
<?php
}
?>
    <div class="" style="margin-bottom:20px">
        <input type="button" class="btn btn-secondary" value="Cancelar" onClick="history.go(-1);">
        <!-- Button trigger modal -->
        <button type="button" id="btn-guardar" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Guardar</button>
    </div>
    
    <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  Necesita confirmar antes de modificar los datos!
                </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="spinner-border text-warning" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  </form> 
    </div>
</body>
<script src="../form-pacientes.js"></script>
</html>