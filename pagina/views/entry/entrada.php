<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
          <h3 class="text-white">Gestion de Entrada</h3>
        </div>
        <div class="card-body">
          <input type="hidden" name="idEntrada" id="idEntrada" />

          <div class="row">
            <div class="btn-group-sm">
              <button class="btn btn-outline-info" onclick="Consultar();">
                <span class="fa fa-search"></span> Consultar
              </button>
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
              <label for="nombres">Fecha de Entrada:</label>
              <input
                type="date"
                name="fechaEntrada"
                id="fechaEntrada"
                placeholder="Por favor digite una fecha"
                class="form-control"
                autofocus
              />
            </div>
            <div class="col-md-6">
              <label for="cantidad">Cantidad:</label>
              <input
                type="number"
                name="cantidad"
                id="cantidad"
                placeholder="Por favor digite una cantidad"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
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
            <div class="col-md-6">
              <label for="precioTotal">Precio total:</label>
              <input
                type="number"
                name="precioTotal"
                id="precioTotal"
                placeholder="Por favor digite el total de la compra"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="nombreProveedor">Nombre del Proveedor::</label>
              <input
                type="number"
                name="idProveedor"
                id="idProveedor"
                placeholder="Por favor seleccione el nombre del proveedor"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="nombreProducto">Nombre del Producto:</label>
              <input
                type="number"
                name="idProducto"
                id="idProducto"
                placeholder="Por favor seleccione el nombre del producto"
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
                <th>Fecha de Entrada</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Precio Total</th>
                <th>Nombre del Proveedor</th>
                <th>Nombre del Producto</th>
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
  <script src="../../js/entrada.js"></script>
  <script src="../../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
</html>
