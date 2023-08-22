<?php
$servername = "mapgeogis.com";
$username = "u862590154_ana";
$password = "Martin1234";
$dbname = "u862590154_hcd_Ana";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//else {echo "Conexión Realizada";};

$id_paciente= $_GET["id_paciente"] ;

$sql = "DELETE FROM turnos WHERE id_paciente='$id_paciente'";

if ($conn->query($sql) === TRUE) {
 echo '<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
     <meta name="mobile-web-app-capable" content="yes">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <link rel="shortcut icon" href="../img/date.png" type="image/png" style="border-radius: 50px;">
     <title>Paciente eliminado</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body style="background-color: #212529;">
  <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Se eliminó el turno!</h4><hr>
    <a href="https://mapgeogis.com/hiemi_hematologia/pacientes_turnos.php" type="button" class="btn btn-danger">Aceptar</a>
  </div>
</body>
</html>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>              