<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="../../img/logo.johan.png">
    <title>CRUD PHP</title>

    <!--ESTILOS CSS BOOTSTRAP-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <!--ESTILOS CSS ICONOS FONTAWESOME-->
    <link rel="stylesheet" href="../../assets/css/all.min.css" />
    <!--ESTILOS Sweet Alert-->
    <link
      rel="stylesheet"
      href="../../assets/plugins/SweetAlert/dist/sweetalert2.min.css"
    />

    <link
      rel="stylesheet"
      href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"
    />
  </head>

  <body>
    <div class="container">
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="text-white">Gestion de Proveedor</h3>
        </div>
        <div class="card-body">
          <input type="hidden" name="idProveedor" id="idProveedor" />

          <div class="row">
            <div class="btn-group-sm">
              
              <button
                class="btn btn-outline-info"
                id="guardar"
                onclick="Guardar();"
              >
                <span class="fa fa-save"></span> Guardar
              </button>
              <button
                class="btn btn-outline-info"
                id="modificar"
                onclick="Modificar();"
                disabled="true"
              >
                <span class="fa fa-pencil-alt"></span> Modificar
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label for="nombres">Nombres:</label>
              <input
                type="text"
                name="nombres"
                id="nombres"
                placeholder="Por favor digite sus nombres"
                class="form-control"
                autofocus
              />
            </div>
            <div class="col-md-6">
              <label for="apellidos">Apellidos:</label>
              <input
                type="text"
                name="apellidos"
                id="apellidos"
                placeholder="Por favor digite sus apellidos"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="fechanacimiento">Telefono:</label>
              <input
                type="number"
                name="telefono"
                id="telefono"
                placeholder="Por favor digite su numero de telefono"
                class="form-control"
              />
            </div>
            <div class="col-md-6">
              <label for="correo">correo:</label>
              <input
                type="email"
                name="correo"
                id="correo"
                placeholder="Por favor digite su correo electronico"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="documento">documento:</label>
              <input
                type="number"
                name="documento"
                id="documento"
                placeholder="Por favor digite su numero de documento"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="tipoDocumento">tipo de documento:</label>
              <input
                type="text"
                name="tipoDocumento"
                id="tipoDocumento"
                placeholder="Por favor digite su tipo de documento"
                class="form-control"
                autofocus
              />
            </div>
          </div>
        </div>
        <div class="card-footer">
          <table class="table table-striped" id="tablaPersona">
            <thead>
              <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>correo</th>
                <th>documento</th>
                <th>tipo documento</th>
              </tr>
            </thead>
            <tbody id="datos"></tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
  <!-- JAVASCRIPT -->
  <script src="../../assets/js/all.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="../../js/proveedor.js"></script>
  <script src="../../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
</html>
