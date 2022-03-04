<?php  include("conexion.php");
    $consulta = "SELECT * FROM entrada";
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                <h4>Entrada:</h4>
                <form action="" method="POST">

                    <input class="form-control mb-3" type="date" name="fechaEntrada"
                        placeholder="fecha de entrada " required>
                    <input class="form-control mb-3" type="number" name="cantidad" 
                        placeholder="cantidad">
                    <input class="form-control mb-3" type="number" name="precio" 
                        placeholder="precio" required>
                        <input class="form-control mb-3" type="number" name="precioTotal" 
                        placeholder="precio Total" required>

                    <select class="form-control mb-3" name="idProveedor" id="" require>
                    <option value="">Seleccione Proveedor</option>
                    <?php include("conexion.php");
                    $proveedor="SELECT idProveedor, nombres from proveedor; ";
                    $res = mysqli_query($conn, $proveedor);
                    while($valores=mysqli_fetch_array($res)){
                        echo '<option value= "'.$valores[0].'">'.$valores[1].'</option>';
                    }
                    ?>
                    </select>


                    <select class="form-control mb-3" name="idProducto" id="" require>
                    <option value="">Seleccione producto</option>
                    <?php 
                    $producto="SELECT idProducto,nombreProducto from producto; ";
                    $ress = mysqli_query($conn, $producto);
                    while($valore=mysqli_fetch_array($ress)){
                        echo '<option value= "'.$valore[0].'">'.$valore[1].'</option>';
                    }
                    ?>
                    </select>
                    <button id="btn" class="btn btn-primary" type="submit" name="BtnRegistrar" value="Registrar">Registrar</button>
                </form>

                <?php 
                        if(isset($_POST['fechaEntrada'])||isset($_POST['cantidad'])||isset($_POST['precio'])||isset($_POST['precioTotal'])||isset($_POST['idProveedor'])||isset($_POST['idProducto']) ){
                            $fechaEntrada = $_POST['fechaEntrada'];
                            $cantidad = $_POST['cantidad'];
                            $precio = $_POST['precio'];
                            $precioTotal = $_POST['precioTotal'];
                            $idProveedor = $_POST['idProveedor'];
                            $idProducto = $_POST['idProducto'];

                            $sqlgrabar = "INSERT INTO entrada (fechaEntrada,cantidad,precio,PrecioTotal,idProveedor,idProducto)
                             values ('$fechaEntrada','$cantidad' ,'$precio','$precioTotal','$idProveedor','$idProducto')";

                            if($conn->query($sqlgrabar)==true){
                                
                            }
                        }
                ?>
             
               
               <script>
                    $('#btn').on('click',function(){
                        Swal.fire(
                            'Good job!',
                             'You clicked the button!',
                            'success'
                            )
                        });
                </script>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <th>idEntrada</th>
                        <th>fecha Entrada</th>
                        <th>cantidad</th>
                        <th>precio</th>
                        <th>precio Total</th>
                        <th>idProveedor</th>
                        <th>idProducto</th>
                        <th></th>
                        <th></th>
                       
                    </thead>
                    <tbody>
                        <form action="entrada.php" method="POST">
                        <?php
                            while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                          
                            <td><?php echo $row['idEntrada'] ?></td>
                            <th><?php echo $row['fechaEntrada'] ?></th>
                            <th><?php echo $row['cantidad'] ?></th>
                            <th><?php echo $row['precio'] ?></th>
                            <th><?php echo $row['precioTotal'] ?></th>
                            <th><?php echo $row['idProveedor'] ?></th>
                            <th><?php echo $row['idProducto'] ?></th>
                            

                         
                            <input type="hidden" name="fechaEntrada" value = "<?php echo $row['fechaEntrada']; ?>">
                            <input type="hidden" name="cantidad" value = "<?php echo $row['cantidad']; ?>">
                            <input type="hidden" name="precio" value = "<?php echo $row['precio']; ?>">
                            <input type="hidden" name="precioTotal" value = "<?php echo $row['precioTotal']; ?>">
                            <input type="hidden" name="idProveedor" value = "<?php echo $row['idProveedor']; ?>">
                            <input type="hidden" name="idProducto" value = "<?php echo $row['idProducto']; ?>">
                            

                            <th><a  href="actualizarEntrada.php?id=<?php echo $row['idEntrada']?>" class="btn btn-info">Editar</a></th>
                            <th><a onclick="return confirm('Estas seguro de eliminar?');" href="entrada.php?id=<?php echo $row['idEntrada']?>" class="btn btn-danger">Eliminar</a></th>
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
