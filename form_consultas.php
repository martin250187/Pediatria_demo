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

            $query = "SELECT apellido, nombre from pacientes WHERE id_paciente='$id_paciente'";
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
    <link rel="shortcut icon" href="./img/medical-app-64.png" type="image/png" style="border-radius: 50px;">
    <title>Nueva consulta</title>
    <link href="./form.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;width:100%">
        <div class="container-fluid">
          <img src="./img/estetoscopio.png" alt="" style="width:50px">
          <p class="navbar-brand"><?php echo strtoupper($mostrar['apellido']); echo " ";echo strtoupper($mostrar['nombre'])?></p>
          <a type="button" href="./indexApp.php" class="btn btn-secondary"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
    </nav>
          
    <div class="container-fluid" style="display:flex; justify-content:center;">
      <form action="registro-consultas.php" method="post" style="max-width:500px" enctype="multipart/form-data">
    <div class="input-group" style="display:none">
        <span class="input-group-text">ID_Paciente</span>
        <input class="form-control" type="text"name="id_paciente" value="<?php echo $id_paciente?>" required>
    </div>    
    
    <div class="input-group" style="display:none">
        <span class="input-group-text">Fecha de consulta</span>
        <input class="form-control" type="text" id="fecha_consulta" name="fecha_consulta">
    </div>
    
    <div class="form-floating">
        <textarea class="form-control" placeholder="Motivo Consulta" id="motivo_consulta" name="motivo_consulta" style="height: 100px"></textarea>
        <label for="floatingTextarea">Motivo Consulta</label>
    </div>
    
    <div class="input-group">
        <div class="input-group" style="width: 70%;padding-right: 5%;">
        <span class="input-group-text">Edad</span>
        <input type="number" id="edad" class="form-control" name="edad">
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="uni_edad" value="Meses">
          <label class="form-check-label" for="inlineCheckbox1">Meses</label>
        </div>
    </div>
    
    <div class="input-group">
        <span class="input-group-text">Peso [kg]</span>
        <input class="form-control" type="number" step="0.1" min="0" id="peso" name="peso" required>
    </div>
        
    <div class="input-group">
        <span class="input-group-text">Talla [cm]</span>
        <input class="form-control" type="number" min="0" id="talla" name="talla" required>
    </div>
    
    <div class="input-group">
        <span class="input-group-text">IMC</span>
        <input class="form-control" type="number" min="0" step="0.001" id="imc" name="imc" required>
    </div>
    
    <div class="input-group">
        <span class="input-group-text">PC [cm]</span>
        <input class="form-control" type="number" min="0" id="per_cef" name="per_cef" required>
    </div>
    
    <div class="input-group">
        <span class="input-group-text">Tensión [mmHg]</span>
        <input class="form-control" type="text" id="tension" name="tension" required>
    </div>
    
    <div class="form-floating">
        <textarea class="form-control" placeholder="Interconsultas" id="interconsultas" name="interconsultas" style="height: 100px"></textarea>
        <label for="floatingTextarea">Interconsultas</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Estudios Solicitados" id="estudios" name="estudios" style="height: 100px"></textarea>
        <label for="floatingTextarea">Estudios Solicitados</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Observaciones" id="observaciones" name="observaciones" style="height: 100px"></textarea>
        <label for="floatingTextarea">Observaciones</label>
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label" style="padding-top:10px">Documentos adjuntos</label>
      <input class="form-control" type="file" id="formFileMultiple" name="file" multiple>
    </div>
    
    <div class="container-button">
        <button type="reset" id="btn-cancelar" class="btn btn-secondary">Cancelar</button>
        <!-- Button trigger modal -->
        <button type="button" id="btn-guardar" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Guardar</button>
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
                  Necesita confirmar antes de guardar los datos!
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
<?php
}
?>
</body>
<script src="./form-consultas.js"></script>
</html>