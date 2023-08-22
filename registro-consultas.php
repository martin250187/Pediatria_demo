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
$fecha_consulta = $_POST["fecha_consulta"] ;
$motivo_consulta = $_POST["motivo_consulta"] ;
$edad = $_POST["edad"] ;
$uni_edad = $_POST["uni_edad"] ;
$peso = $_POST["peso"] ;
$talla = $_POST["talla"] ;
$imc = $_POST["imc"] ;
$per_cef = $_POST["per_cef"] ;
$tension = $_POST["tension"] ;
$interconsultas = $_POST["interconsultas"] ;
$estudios = $_POST["estudios"] ;
$observaciones = $_POST["observaciones"] ;

$query = "SELECT * from pacientes WHERE id_paciente = '$id_paciente'";
$consulta = mysqli_query($conn,$query);
if ($mostrar = mysqli_fetch_array($consulta)){
    $apellido = $mostrar['apellido'];
};
$ruta_destino = "files/consultorio/".$id_paciente.'/'.$_FILES["file"]["name"];
$ruta_desde = ($_FILES["file"]["tmp_name"]);

//$file = $ruta_base ; 

//print_r($_FILES);
if(!file_exists("files/consultorio/".$id_paciente.'/')){
    mkdir("files/consultorio/".$id_paciente.'/',0777,true);
    move_uploaded_file($ruta_desde, $ruta_destino);
}
else {
    move_uploaded_file($ruta_desde, $ruta_destino);
}

$sql = "INSERT INTO consultas (id_paciente, fecha_consulta, motivo_consulta, edad, uni_edad, peso, talla, imc, per_cef, tension, interconsultas, estudios, observaciones, file)
VALUES ('$id_paciente', '$fecha_consulta', '$motivo_consulta', '$edad', '$uni_edad', '$peso', '$talla', '$imc', '$per_cef', '$tension', '$interconsultas', '$estudios', '$observaciones', '$ruta_destino')";

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
    <h4 class="alert-heading">Los datos se guardaron correctamente!</h4><hr>
    <a href="./pacientes.php" type="button" class="btn btn-success">Aceptar</a>
  </div>
</body>
</html>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>              