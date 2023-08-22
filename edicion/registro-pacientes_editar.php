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

$id_paciente= $_POST["id_paciente"] ;
$apellido = $_POST["apellido"] ;
$nombre = $_POST["nombre"] ;
$fecha_nac = $_POST["fecha_nac"] ;
$sexo = $_POST["sexo"] ;
$edad = $_POST["edad"] ;
$uni_edad = $_POST["uni_edad"] ;
$dni = $_POST["dni"] ;
$calle = $_POST["calle"] ;
$calle_nro = $_POST["calle_nro"] ;
$localidad = $_POST["localidad"] ;
$obra_social = $_POST["obra_social"] ;
$afiliado_nro = $_POST["afiliado_nro"] ;
$telefono = $_POST["telefono"] ;
$email = $_POST["email"] ;
$grupo_sanguineo = $_POST["grupo_sanguineo"] ;
$ant_personales = $_POST["ant_personales"] ;
$ant_familiares = $_POST["ant_familiares"] ;
$fecha_reg = $_POST["fecha_reg"] ;

$sql = "UPDATE pacientes SET id_paciente='$id_paciente', apellido='$apellido', nombre='$nombre', fecha_nac='$fecha_nac', edad='$edad', uni_edad='$uni_edad', dni='$dni', calle='$calle', calle_nro='$calle_nro', localidad='$localidad', obra_social='$obra_social', afiliado_nro='$afiliado_nro', telefono='$telefono', email='$email', grupo_sanguineo='$grupo_sanguineo', ant_personales='$ant_personales', ant_familiares='$ant_familiares', fecha_reg='$fecha_reg' WHERE id_paciente = '$id_paciente'";

if ($conn->query($sql) === TRUE) {
 echo '<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
     <meta name="mobile-web-app-capable" content="yes">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <link rel="shortcut icon" href="../img/medical-app-64.png" type="image/png" style="border-radius: 50px;">
     <title>Paciente modificado</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body style="background-color: #212529;">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Los datos se modificaron correctamente!</h4><hr>
    <a href="https://mapgeogis.com/pediatria_demo/indexApp.php" type="button" class="btn btn-success">Aceptar</a>
  </div>
</body>
</html>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>              