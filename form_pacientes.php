<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="./img/medical-app-64.png" type="image/png" style="border-radius: 50px;">
    <title>Nuevo Paciente</title>
    <link href="./form.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 80px;">
        <div class="container-fluid">
            <img src="./img/children-80.png" alt="" style="width:50px">
          <p class="navbar-brand">Nuevo Paciente</p>
          <a type="button" href="./indexApp.php" class="btn btn-secondary"><i class="fa fa-home" aria-hidden="true"></i></a>
          </div>
          </nav>
      <!--DATOS GENERALES-->
      <div class="container-fluid" style="display: flex;justify-content: center;">
      <form action="registro-pacientes.php" method="post" style="max-width:500px">
            <div class="input-group">
        <span class="input-group-text">Apellido</span>
        <input class="form-control" type="text" id="apellido" name="apellido" required>
    </div>
        <div class="input-group">
        <span class="input-group-text">Nombre</span>
        <input class="form-control" type="text" id="nombre" name="nombre" required>
    </div>
    <div class="input-group">
        <span class="input-group-text">Fecha de Nacimiento</span>
        <input class="form-control" type="date" id="fecha_nac" name="fecha_nac" required>
    </div>
    <div class="input-group">
        <span class="input-group-text">Sexo</span>
        <select id="sexo" class="form-select" name="sexo">
            <option value=""></option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
        </select>
    </div>
    <div class="input-group">
        <span class="input-group-text">Edad</span>
        <input type="text" class="form-control" id="edad" placeholder="--" name="edad">
    </div>
    <div class="input-group" style="display:none">
        <span class="input-group-text">Unidad Edad</span>
        <input type="text" class="form-control" id="uni_edad" name="uni_edad">
    </div>
    <div class="input-group">
        <span class="input-group-text">DNI</span>
        <input type="text" class="form-control" id="dni" name="dni">
    </div>
    <div class="input-group">
        <span class="input-group-text">Domicilio</span>
        <input type="text" id="calle" placeholder="Calle" class="form-control" name="calle">
        <input type="text" id="calle_nro" placeholder="Número" class="form-control" name="calle_nro">
    </div>
    <div class="input-group">
        <span class="input-group-text">Localidad</span>
        <input type="text" class="form-control" name="localidad">
    </div>
    <div class="input-group">
        <span class="input-group-text">Obra Social</span>
        <input type="text" id="obra_social" placeholder="Obra Social" class="form-control" name="obra_social">
        <input type="text" id="afiliado_nro" placeholder="Nro Afiliado" class="form-control" name="afiliado_nro">
    </div>
    <div class="input-group">
        <span class="input-group-text">Contacto</span>
        <input type="text" class="form-control" id="contacto" placeholder="Teléfono" name="telefono">
    </div>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email">
    </div>
    <div class="input-group">
        <span class="input-group-text">Grupo Sanguineo</span>
        <select id="grupo_sanguineo" class="form-select" name="grupo_sanguineo">
            <option value=""></option>
            <option value="A positivo (A+)">A positivo (A+)</option>
            <option value="A negativo (A-)">A negativo (A-)</option>
            <option value="B positivo (B+)">B positivo (B+)</option>
            <option value="B negativo (B-)">B negativo (B-)</option>
            <option value="AB positivo (AB+)">AB positivo (AB+)</option>
            <option value="AB negativo (AB-)">AB negativo (AB-)</option>
            <option value="O positivo (O+)">O positivo (O+)</option>
            <option value="O negativo (O-)">O negativo (O-)</option>
        </select>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Antecedentes Personales" id="ant_per" name="ant_personales" style="height: 100px"></textarea>
        <label for="floatingTextarea1">Antecedentes Personales</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Antecedentes Familiares" id="ant_fam" name="ant_familiares" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Antecedentes Familiares</label>
    </div>
    <div class="input-group" style="display: none;">
        <span class="input-group-text">Fecha de Registro</span>
        <input class="form-control" type="text" id="fecha_reg" name="fecha_reg" required>
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
</body>
<script src="./form-pacientes.js"></script>
</html>