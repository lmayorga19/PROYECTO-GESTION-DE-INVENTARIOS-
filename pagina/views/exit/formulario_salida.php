<?php  include("conexion.php");
    $consulta = "SELECT * FROM salida";
    $resultado = mysqli_query($conn,$consulta);

    $row = mysqli_fetch_array($resultado);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="menu.html">Regresar</a>
        </nav>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h4>Salida:</h4>
                <form action="salida.php" method="POST">

                    <input class="form-control mb-3" type="date" name="fechaSalida"
                        placeholder="fecha de salida " required>
                    <input class="form-control mb-3" type="number" name="cantidad" 
                        placeholder="cantidad">
                    <input class="form-control mb-3" type="number" name="precio" 
                        placeholder="precio" required>
                        <input class="form-control mb-3" type="number" name="precioTotal" 
                        placeholder="precio Total" required>
            
                        <select class="form-control mb-3" name="idCliente" id="" require>
                        <option value="0">Seleccione cliente</option>
                        <?php include("conexion.php");
                         $proveedor="SELECT idCliente, nombresClientes, apellidosClientes FROM cliente;";
                         $res = mysqli_query($conn, $proveedor);
                        while($valores=mysqli_fetch_array($res)){
                          echo '<option value= "'.$valores[0].'">'.$valores[1].' '.$valores[2].'</option>';
                          }
                         ?>
                        </select>

                        <select class="form-control mb-3" name="idProducto" id="" require>
                          <option value="">Seleccione producto</option>
                            <?php 
                              $producto="SELECT idProducto, nombreProducto FROM producto;                              ";
                              $ress = mysqli_query($conn, $producto);
                             while($valore=mysqli_fetch_array($ress)){
                               echo '<option value= "'.$valore[0].'">'.$valore[1].'</option>';
                               }
                            ?>
                           </select>
                    <br>
                    <input class="btn btn-primary" type="submit" name="BtnRegistrar" value="Registrar">
                   

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <th>idSalida</th>
                        <th>fecha Salida</th>
                        <th>cantidad</th>
                        <th>precio</th>
                        <th>precio Total</th>
                        <th>idCliente</th>
                        <th>idProducto</th>
                        <th></th>
                        <th></th>
                       
                    </thead>
                    <tbody>
                        <form action="salida.php" method="POST">
                        <?php
                            while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                          
                            <td><?php echo $row['idSalida'] ?></td>
                            <th><?php echo $row['fechaSalida'] ?></th>
                            <th><?php echo $row['cantidad'] ?></th>
                            <th><?php echo $row['precio'] ?></th>
                            <th><?php echo $row['precioTotal'] ?></th>
                            <th><?php echo $row['idCliente'] ?></th>
                            <th><?php echo $row['idProducto'] ?></th>
                            

                         
                            <input type="hidden" name="fechaSalida" value = "<?php echo $row['fechaSalida']; ?>">
                            <input type="hidden" name="cantidad" value = "<?php echo $row['cantidad']; ?>">
                            <input type="hidden" name="precio" value = "<?php echo $row['precio']; ?>">
                            <input type="hidden" name="precioTotal" value = "<?php echo $row['precioTotal']; ?>">
                            <input type="hidden" name="idCliente" value = "<?php echo $row['idCliente']; ?>">
                            <input type="hidden" name="idProducto" value = "<?php echo $row['idProducto']; ?>">
                            

                            <th><a  href="actualizarSalida.php?id=<?php echo $row['idSalida']?>" class="btn btn-info">Editar</a></th>
                            <th><a onclick="return confirm('Estas seguro de eliminar?');" href="salida.php?id=<?php echo $row['idSalida']?>" class="btn btn-danger">Eliminar</a></th>
                        </tr>
                        <?php
                            }
                        ?>
                        </form>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
