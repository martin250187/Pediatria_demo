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
            $queryChart = "SELECT pacientes.nombre, pacientes.apellido, pacientes.sexo, pacientes.id_paciente, consultas.id_paciente, consultas.edad, consultas.peso, consultas.talla, consultas.per_cef FROM pacientes JOIN consultas ON pacientes.id_paciente=consultas.id_paciente AND pacientes.id_paciente = '$id_paciente'";
            $totalConsultas = "SELECT count(*) AS total_consultas FROM consultas WHERE id_paciente = '$id_paciente'";
            
            
                    $consulta = mysqli_query($conn,$query);
                    $consultas_total = mysqli_query($conn,$totalConsultas);
                    $mostrar = mysqli_fetch_array($consulta);
                    
                    
                    $results = mysqli_query($conn,$queryChart);
                    
                    $total = mysqli_fetch_array($consultas_total);
                    
                    if ($mostrar['sexo'] == "Masculino"){
                        $color = "'rgb(88, 133, 197)'";
                        $imgPeso = "'./img/Peso_niño.png'";
                        $imgTalla = "'./img/Talla_niño.png'";
                        $imgPC = "'./img/PC_niño2.png'";
                    }
                    elseif ($mostrar['sexo'] == "Femenino") {
                        $color = "'rgb(213, 136, 176)'";
                        $imgPeso = "'./img/Peso_niña.png'";
                        $imgTalla = "'./img/Talla_niña.png'";
                        $imgPC = "'./img/PC_niña.png'";
                    }
                    
                   
$data_peso = array();//creamos un array
$data_talla = array();
$data_per_cef= array();

while($row = mysqli_fetch_array($results)) 
{ 
    $apellido=$row['apellido'];
    $nombre=$row['nombre'];
    $sexo=$row['sexo'];
    $edad=$row['edad'];
    $peso=$row['peso'];
    $talla=$row['talla'];
    $per_cef=$row['per_cef'];
    

    $data_peso[] = array('x'=> intval ($edad), 'y'=> intval ($peso), 'r'=> intval ('5'));
    $data_talla[] = array('x'=> intval ($edad), 'y'=> intval ($talla), 'r'=> intval ('5'));
    $data_per_cef[] = array('x'=> intval ($edad), 'y'=> intval ($per_cef), 'r'=> intval ('5'));

};
    
//desconectamos la base de datos
/*$close = mysqli_close($conn) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  */

//Creamos el JSON
$json_peso = json_encode($data_peso);
$json_talla = json_encode($data_talla);
$json_per_cef = json_encode($data_per_cef);

//Si queremos crear un archivo json, sería de esta forma:
/*
$file1 = 'peso.json';
$file2 = 'talla.json';
$file3 = 'per_cef.json';
file_put_contents($file1, $json_string1);
file_put_contents($file2, $json_string2);
file_put_contents($file3, $json_string3);*/

            ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="../img/graph-64.png" type="image/png" style="border-radius: 50px;">
    <title>Curvas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./chart.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;">
        <div class="container-fluid">
            <p class="navbar-brand"><?php echo strtoupper($mostrar['apellido']); echo " ";echo strtoupper($mostrar['nombre'])?></p><br>
            <p class="navbar-brand" id="countConsultas" style="display:none"><?php echo "(Consultas Realizadas: ";echo strtoupper($total['total_consultas']); echo ")"?></p>
            <img src="../img/graph-58.png" alt="" style="width:50px">
          </div>
          </nav>
          <div class="b-example-divider" style="margin-left:10px;margin-top:10px">
              <a href="#" class="btn btn-secondary" title="Imprimir" onClick="window.print()"><i class="fa fa-print"></i></a>
              <button type="button" title="Volver" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
              <a href="../indexApp.php" class="btn btn-secondary" title="Volver"><i class="fa fa-home" aria-hidden="true"></i></a>
              <a href="javascript:location.reload()" class="btn btn-secondary" title="Actualizar"><i class="fa fa-refresh" aria-hidden="true"></i></a><br>
              <div class="container-fluid">
              <a type="text" id="hoy" class="nav-link disabled" style="margin-top:10px"> </a>
              </div>
          </div>
          <hr>
          <div>
              <canvas id="ChartPeso" class="chart"></canvas>
          </div><hr>
          <div>
              <canvas id="ChartTalla" class="chart"></canvas>
          </div><hr>
          <div>
              <canvas id="ChartPC" class="chart"></canvas>
          </div><hr>

<script>
//PESO
  const peso = document.getElementById('ChartPeso');
  const dataPeso = {
  datasets: [{
    label: 'Curva de crecimiento (Peso)',
    data: <?php echo $json_peso?>,
    backgroundColor: <?php echo $color?>
  }]
};
  new Chart(peso, {
    type: 'bubble',
    data: dataPeso,
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                  display: true,
                  text: 'meses'
                },
                suggestedMin: 0,
                suggestedMax: 36,
                ticks: {
                stepSize: 1
            }
            },
            y: {
                title: {
                  display: true,
                  text: 'kg.'
                },
                suggestedMin: 1,
                suggestedMax: 25,
                ticks: {
                stepSize: 1
            }
            }
        }
    },
    plugins: [{
    beforeDraw: chart => {
      var ctx = chart.ctx;
      ctx.save();
      const image = new Image();
      image.src = <?php echo $imgPeso?>;
      ctx.drawImage(image, chart.chartArea.left, chart.chartArea.top, chart.chartArea.width, chart.chartArea.height);
      ctx.restore();
    }
  }],
      });
      
//TALLA
  const talla = document.getElementById('ChartTalla');
  const dataTalla = {
  datasets: [{
    label: 'Curva de crecimiento (Talla)',
    data: <?php echo $json_talla?>,
    backgroundColor: <?php echo $color?>
  }]
};

  new Chart(talla, {
    type: 'bubble',
    data: dataTalla,
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                  display: true,
                  text: 'meses'
                },
                suggestedMin: 0,
                suggestedMax: 36,
                ticks: {
                stepSize: 1
            }
            },
            y: {
                title: {
                  display: true,
                  text: 'cm.'
                },
                suggestedMin: 45,
                suggestedMax: 120,
                min:45,
                ticks: {
                stepSize: 5
            }
            }
    }
      },
      plugins: [{
    beforeDraw: chart => {
      var ctx = chart.ctx;
      ctx.save();
      const image = new Image();
      image.src = <?php echo $imgTalla?>;
      ctx.drawImage(image, chart.chartArea.left, chart.chartArea.top, chart.chartArea.width, chart.chartArea.height);
      ctx.restore();
    }
  }],
      });
      
//PC
  const pc = document.getElementById('ChartPC');
  const dataPC = {
  datasets: [{
    label: 'Curva de crecimiento (PC)',
    data: <?php echo $json_per_cef?>,
    backgroundColor: <?php echo $color?>
  }]
};

  new Chart(pc, {
    type: 'bubble',
    data: dataPC,
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                  display: true,
                  text: 'meses'
                },
                suggestedMin: 0,
                suggestedMax: 36,
                ticks: {
                stepSize: 1
            }
            },
            y: {
                title: {
                  display: true,
                  text: 'cm.'
                },
                suggestedMin: 31,
                suggestedMax: 53,
                ticks: {
                stepSize: 1
            }
            }
    }
      },
    plugins: [{
    beforeDraw: chart => {
      var ctx = chart.ctx;
      ctx.save();
      const image = new Image();
      image.src = <?php echo $imgPC?>;
      ctx.drawImage(image, chart.chartArea.left, chart.chartArea.top, chart.chartArea.width, chart.chartArea.height);
      ctx.restore();
    }
  }],
      });
</script>
<script src="../time.js"></script>

</body>
</html>