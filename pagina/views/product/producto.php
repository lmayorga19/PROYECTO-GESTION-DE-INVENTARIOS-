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
          <h3 class="text-white">Gestion de Producto</h3>
        </div>
        <div class="card-body">
          <input type="hidden" name="idProducto" id="idProducto" />

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
              <label for="nombres">Nombres de Producto:</label>
              <input
                type="text"
                name="nombreProducto"
                id="nombreProducto"
                placeholder="Por favor digite el nombre del producto"
                class="form-control"
                autofocus
              />
            </div>
            <div class="col-md-6">
              <label for="existencia">Existencia:</label>
              <input
                type="number"
                name="existencia"
                id="existencia"
                placeholder="Por favor digite la existencia"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="marca">Marca:</label>
              <input
                type="text"
                name="marca"
                id="marca"
                placeholder="Por favaro digite el nombre de la marca"
                class="form-control"
              />
            </div>
            <div class="col-md-6">
              <label for="precio">Precio:</label>
              <input
                type="number"
                name="precio"
                id="precio"
                placeholder="Por favor digite el precio"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="ultimoCosto">Ultimo costo::</label>
              <input
                type="number"
                name="ultimoCosto"
                id="ultimoCosto"
                placeholder="Por favor digite el precio de ultimo costo"
                class="form-control"
              />
            </div>
          </div>
        </div>
        <div class="card-footer">
          <table class="table table-striped" id="tablaProducto">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Existencia</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Ultimo costo</th>
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
  <script src="../../js/producto.js"></script>
  <script src="../../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
</html>
