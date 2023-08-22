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
            $query2 = "SELECT * FROM consultas WHERE id_paciente = '$id_paciente' ORDER BY fecha_consulta DESC";
            $consulta = mysqli_query($conn,$query);
            $consulta2 = mysqli_query($conn,$query2);
            $totalConsultas = "SELECT count(*) AS total_consultas FROM consultas WHERE id_paciente = '$id_paciente'";
            $consultas_total = mysqli_query($conn,$totalConsultas);
            
                          $mostrar = mysqli_fetch_array($consulta);
                          $total = mysqli_fetch_array($consultas_total);
                      
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
    <title>Consultas</title>
    <link href="./form.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;">
        <div class="container-fluid">
            <p class="navbar-brand"><?php echo strtoupper($mostrar['apellido']); echo " ";echo strtoupper($mostrar['nombre'])?></p><br>
            <p class="navbar-brand" id="countConsultas" style="display:none"><?php echo "(Consultas Realizadas: ";echo strtoupper($total['total_consultas']); echo ")"?></p>
            <img src="./img/consulta.png" alt="" style="width:50px">
          </div>
          </nav>
          <div class="b-example-divider" style="margin-left:10px;margin-top:10px">
              <a href="./form_consultas.php?id_paciente=<?php echo $mostrar['id_paciente']?>" class="btn btn-success" title="Ingresar Nueva Consulta"><i class="fa fa-stethoscope"></i></a>
              <a href="./curvas/resultado_curvas.php?id_paciente=<?php echo $mostrar['id_paciente']?>" class="btn btn-warning" title="Curvas"><i class="fa fa-line-chart" disabled></i></a>
              <a href="#" class="btn btn-secondary" title="Imprimir" onClick="window.print()"><i class="fa fa-print"></i></a>
              <a type="button" href="./pacientes.php" title="Volver" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
              <a href="./indexApp.php" class="btn btn-secondary" title="Volver"><i class="fa fa-home" aria-hidden="true"></i></a>
              <a href="javascript:location.reload()" class="btn btn-secondary" title="Actualizar"><i class="fa fa-refresh" aria-hidden="true"></i></a><br>
              <div class="container-fluid">
              <a type="text" id="hoy" class="nav-link disabled" style="margin-top:10px"> </a>
              </div>
              <hr>
          </div>

      <!--DATOS GENERALES-->
      <div class="container" style="display: flex;justify-content: center;">
      <form id="form" action="" method="" style="">
       <?php
       if ($total['total_consultas'] == '0'){
                          echo 'No hay consultas para este paciente!';
                      }
                      else{
    while($mostrar = mysqli_fetch_array($consulta2)){
                ?>
    <div class="p-3 mb-2 bg-dark text-white" style="height: 50px">Registros de Consultas<img src="https://img.icons8.com/fluency/48/000000/down2.png"/></div>
    <div class="form-floating">
        <span class="input-group-text">Fecha y Hora de Registro</span>
        <textarea class="form-control" style="" readonly><?php echo $mostrar['fecha_consulta']?></textarea>
    </div>
    <div class="form-floating">
        <span class="input-group-text">Motivo de la Consulta</span>
        <textarea class="form-control" style="height: 100px" readonly><?php echo $mostrar['motivo_consulta']?></textarea>
    </div>
    <div class="input-group">
            <span class="input-group-text">Edad</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['edad'];echo ' ';echo $mostrar['uni_edad']?>" class="form-control" readonly>
    </div>
    <div class="input-group">
            <span class="input-group-text">Peso</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['peso'];echo ' kg.'?>" class="form-control" readonly>
    </div>
    <div class="input-group">
            <span class="input-group-text">Talla</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['talla'];echo ' cm.'?>" class="form-control" readonly>
    </div>
    <div class="input-group">
            <span class="input-group-text">IMC</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['imc']?>" class="form-control" readonly>
    </div>
    <div class="input-group">
            <span class="input-group-text">PC</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['per_cef'];echo ' cm.'?>" class="form-control" readonly>
    </div>
    <div class="input-group">
            <span class="input-group-text">Tensión</span>
            <input type="text" placeholder="--" value="<?php echo $mostrar['tension'];echo ' mmHg'?>" class="form-control" readonly>
    </div>
    <div class="form-floating">
        <span class="input-group-text">Interconsultas</span>
        <textarea class="form-control" style="height: 100px" readonly><?php echo $mostrar['interconsultas']?></textarea>
    </div>
    <div class="form-floating">
        <span class="input-group-text">Estudios</span>
        <textarea class="form-control" style="height: 100px" readonly><?php echo $mostrar['estudios']?></textarea>
    </div>
    <div class="form-floating">
        <span class="input-group-text">Observaciones</span>
        <textarea class="form-control" style="height: 100px" readonly><?php echo $mostrar['observaciones']?></textarea>
    </div>
    <div class="container" style="margin-top:10px; margin-bottom:10px">
    <a class="btn btn-secondary" href="<?php echo $mostrar['file']?>" role="button">Ver archivo adjunto <span><img src="./img/adjunto.png" alt="" style=""></span></a>
    </div>
    <hr>
<?php
}
}
?>

    </form> 
    </div>
   
        <script src="./time.js"></script>
        <script src="./confirmacion.js"></script>
</body>
</html>