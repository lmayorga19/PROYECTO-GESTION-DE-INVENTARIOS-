<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="../../img/logo_login.png">
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
          <h3 class="text-white">Gestion de Cliente</h3>
        </div>
        <div class="card-body">
          <input type="hidden" name="idCliente" id="idCliente" />

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
              <label for="nombresClientes">Nombres de Cliente:</label>
              <input
                type="text"
                name="nombresClientes"
                id="nombresClientes"
                placeholder="Por favor digite sus nombres"
                class="form-control"
                autofocus
              />
            </div>
            <div class="col-md-6">
              <label for="apellidosClientes">Apellidos de Clientes:</label>
              <input
                type="text"
                name="apellidosClientes"
                id="apellidosClientes"
                placeholder="Por favor digite sus apellidos"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="direccion">Direccion:</label>
              <input
                type="text"
                name="direccion"
                id="direccion"
                placeholder="Por favor digite una direccion"
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
              <label for="telefono">Telefono:</label>
              <input
                type="number"
                name="telefono"
                id="telefono"
                placeholder="Por favor digite un numero de telefono"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="documento">Documento:</label>
              <input
                type="number"
                name="documento"
                id="documento"
                placeholder="Por favor digite su numero de documento"
                class="form-control"
                autofocus
              />
            </div>
          </div>
             <div class="row">
            <div class="col-md-6">
              <label for="tipoDocumento">tipo de documento:</label>
              <select class="col-md-6" name="tipoDocumento" id="tipoDocumento" required>
                        <option name="cc" value="C.C">C.C</option>
                        <option name="ti" value="T.I">T.I</option>
                        <option name="ce" value="C.E">C.E</option>
                        <option name="rc" value="R.C">R.C</option>
             </select>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <table class="table table-striped" id="tablaCliente">
            <thead>
              <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>correo</th>
                <th>Telefono</th>
                <th>Documento</th>
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
  <script src="../../js/cliente.js"></script>
  <script src="../../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
</html>
