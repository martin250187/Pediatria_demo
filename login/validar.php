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

$usuario = $_POST["usuario"] ;
$clave = $_POST["clave"] ;;

$sql = "SELECT * from usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
$mostrar = mysqli_query($conn, $sql);
$filas = mysqli_num_rows($mostrar);

if ($filas>0)  {
 echo'<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
     <meta name="mobile-web-app-capable" content="yes">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <link rel="shortcut icon" href="../img/encrypt-48.png" type="image/png" style="border-radius: 50px;">
     <title>Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body style="background-color: #212529">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Bienvenido ';echo $usuario; echo '!</h4><hr>
    <a href="../index.php" type="button" class="btn btn-success">Aceptar</a>
  </div>
</body>
</html>';
} else {
  echo '<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
     <meta name="mobile-web-app-capable" content="yes">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <link rel="shortcut icon" href="../img/encrypt-48.png" type="image/png" style="border-radius: 50px;">
     <title>Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body style="background-color: #212529">
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">No se pudieron validar las credenciales!</h4><hr>
    <input type="button" class="btn btn-danger" value="Reintentar" onClick="history.go(-1);">
  </div>
</body>
</html>';
}

$conn->close();
?>       