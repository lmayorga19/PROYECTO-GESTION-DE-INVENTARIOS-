<?php
  $dbhost ="localhost";
    $dbuser = "root";
    $dbpass = "angeles-32";
    $dbname = "johanstyle";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
?>

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
          <h3 class="text-white">Gestion de Salida</h3>
        </div>
        <div class="card-body">
          <input type="hidden" name="idSalida" id="idSalida" />

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
              <label for="fechaSalida">Fecha de Salida:</label>
              <input
                type="date"
                name="fechaSalida"
                id="fechaSalida"
                placeholder=""
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
                placeholder="Por favor digite la cantidad"
                class="form-control"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="precio">precio:</label>
              <input
                type="number"
                name="precio"
                id="precio"
                placeholder="Por favor digite el precio"
                class="form-control"
              />
            </div>
            <div class="col-md-6">
              <label for="precioTotal">precio Total:</label>
              <input
                type="number"
                name="precioTotal"
                id="precioTotal"
                placeholder="Por favor digite su precio total"
                class="form-control"
              />
            </div>
          </div>


        <select class="form-control mb-3" name="idCliente" id="idCliente" require>
        <option value="0">Seleccione cliente</option>
        <?php 
        $proveedor="SELECT idCliente, nombresClientes, apellidosClientes FROM cliente;";
                         $res = mysqli_query($conn, $proveedor);
                        while($valores=mysqli_fetch_array($res)){
                          echo '<option value= "'.$valores[0].'">'.$valores[1].' '.$valores[2].'</option>';
                          }
                         ?>
        </select>
         <select class="form-control mb-3" name="idProducto" id="idProducto" require>
                          <option value="">Seleccione producto</option>
                            <?php 
                              $producto="SELECT idProducto, nombreProducto FROM producto;                              ";
                              $ress = mysqli_query($conn, $producto);
                             while($valore=mysqli_fetch_array($ress)){
                               echo '<option value= "'.$valore[0].'">'.$valore[1].'</option>';
                               }
                            ?>
                           </select>

        </div>
        <div class="card-footer">
          <table class="table table-striped" id="tablaSalida">
            <thead>
              <tr>
                <th>Fecha de Salda</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Precio total</th>
                <th>Cliente</th>
                <th>Producto</th>
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
  <script src="../../js/salida.js"></script>
  <script src="../../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
</html>
