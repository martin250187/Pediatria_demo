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
                    
                    $queryturnos = "SELECT pacientes.nombre, pacientes.apellido, pacientes.id_paciente, turnos.id_paciente, turnos.fecha_turno, turnos.hora_turno, turnos.color_turno FROM turnos JOIN pacientes ON pacientes.id_paciente=turnos.id_paciente";
                    $results = mysqli_query($conn,$queryturnos);

    $events = array(); //creamos un array

while($row = mysqli_fetch_array($results)) 
{ 
    $title=$row['apellido'].' '.$row['nombre'];
    $start=$row['fecha_turno'].'T'.$row['hora_turno'];
    $color=$row['color_turno'];
    

    $events[] = array('title'=> $title, 'start'=> $start, 'color'=> $color);

}
    
//desconectamos la base de datos
/*$close = mysqli_close($conn) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  */

//Creamos el JSON
$json_string = json_encode($events);
//echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:

$file = 'events.json';
file_put_contents($file, $json_string);

                   
                    //$id_paciente = $_GET["id_paciente"] ;
                    $query = "SELECT * from pacientes ORDER BY apellido";
                    $consulta = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="../img/calendar-100.png" type="image/png" style="border-radius: 50px;">
    <title>Calendario</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href='./calendar.css' rel='stylesheet'>
    <link href='./lib/main.css' rel='stylesheet'>
    <script src='https://code.jquery.com/jquery-3.6.1.min.js'></script>
    <script src='./lib/main.js'></script>
    <script src='./lib/locales/es.js'></script>
    
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;">
        <div class="container-fluid">
          <p class="navbar-brand">Calendario de Turnos</p>
            <img src="../img/calendar-100.png" alt="" style="width:50px">
          </div>
    </nav>
    <div class="b-example-divider">
        <div class="conteiner-fluid" style="margin-left:10px;margin-top:10px">
            <a href="#" class="btn btn-secondary" title="Imprimir" onClick="window.print()"><i class="fa fa-print"></i></a>
            <button type="button" title="Volver" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
              <a type="button" href="../indexApp.php" title="Volver" class="btn btn-secondary"><i class="fa fa-home"></i></a>
              <a href="javascript:location.reload()" class="btn btn-secondary" title="Actualizar"><i class="fa fa-refresh" aria-hidden="true"></i></a><br>
        </div>
              <div class="container-fluid">
              <a type="text" id="hoy" class="nav-link disabled" style="margin-top:10px"> </a>
              </div>
    </div><hr>
    <div class="container">
        <div class="col-md-10 offset-md-1">
          <div id="calendario"></div>
        </div>
    </div>
      
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Turno</h1>
        </div>
        <form action="../registro-turnos.php" method="post">
            <div class="modal-body">
              <div class="input-group">
                <span class="input-group-text">Paciente</span>
                <select id="id_paciente" class="form-select" name="id_paciente" required>
                    <option value="">Seleccione un paciente</option>
                    <?php
                    while($mostrar = mysqli_fetch_array($consulta)){
                    ?>
                    <option value="<?php echo $mostrar['id_paciente']?>"><?php echo $mostrar['apellido']; echo " ";echo $mostrar['nombre']?></option>
                    <?php
                }
                ?>
                </select>
            </div>
            <div class="input-group">
              <span class="input-group-text">Fecha</span>
              <input class="form-control" type="date" id="fecha_turno" name="fecha_turno" required>
            </div>
            <div class="input-group">
              <span class="input-group-text">Hora Turno</span>
              <input type="time" class="form-control" id="hora_turno" value="08:00:00" name="hora_turno" required>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Observaciones" name="observaciones" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Observaciones</label>
            </div>
              <label for="color" class="form-label">Color</label>
              <input type="color" class="form-control form-control-color" id="color_turno" value="#CB20B4" name="color_turno">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar Turno</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  
   

  <script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
    document.addEventListener('DOMContentLoaded', function () {
       var calendarEl = document.getElementById('calendario');

       var calendar = new FullCalendar.Calendar(calendarEl, {
       themeSystem: 'bootstrap5',
       headerToolbar: {
           left: 'prev,next,today',
           center: 'title',
           right: 'dayGridMonth,timeGridWeek,timeGridDay',//listMonth'
       },
       dateClick: function(info) {
           //alert('Clicked on: ' + info.dateStr);
           //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
           //alert('Current view: ' + info.view.type);
           // change the day's background color just for fun
           //info.dayEl.style.backgroundColor = 'blue';
           document.getElementById("fecha_turno").value = info.dateStr;
           myModal.show();
           //console.log(info.dateStr)
       },
       
       selectable: true,
       editable: false,
       nowIndicator: true,
       businessHours: true,
       selectMirror: true,
       weekNumbers: false,
       weekends:false,
       dayMaxEvents: true, // allow "more" link when too many events
       events: 'events.json'
     })
       //calendar.getEvents();
       calendar.setOption('locale', 'es');
       calendar.render();
       
   });
</script>
<script src="../time.js"></script>
</body>
</html>