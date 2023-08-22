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
//else {echo "Conexión Realizada";};

$id_paciente = $_POST["id_paciente"] ;
$fecha_turno = $_POST["fecha_turno"] ;
$hora_turno = $_POST["hora_turno"] ;
$color_turno = $_POST["color_turno"] ;
$observaciones = $_POST["observaciones"] ;

$query = "SELECT * from pacientes WHERE id_paciente = '$id_paciente'";
$consulta = mysqli_query($conn,$query);
if ($mostrar = mysqli_fetch_array($consulta)){
    $apellido = $mostrar['apellido'];
};

$sql = "INSERT INTO turnos (id_paciente, fecha_turno, hora_turno, color_turno, observaciones)
VALUES ('$id_paciente', '$fecha_turno', '$hora_turno', '$color_turno', '$observaciones')";


if ($conn->query($sql) === TRUE) {
    
  echo '<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
     <meta name="mobile-web-app-capable" content="yes">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <link rel="shortcut icon" href="./img/medical-app-64.png" type="image/png" style="border-radius: 50px;">
     <title>Paciente guardado</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body style="background-color: #212529;">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">El turno se guardó correctamente!</h4><hr>
    <a href="https://mapgeogis.com/pediatria_demo/calendario/calendar.php" type="button" class="btn btn-success">Aceptar</a>
  </div>
</body>
</html>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//echo($outp);
?>              