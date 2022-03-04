<?php  include("conexion.php");
    $consulta = "SELECT * FROM producto";
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
                <h4>Producto</h4>
                <form action="producto.php" method="POST">

                    <input class="form-control mb-3" type="text" name="nombreProducto"
                        placeholder="Ingrese el nombre del producto" required>
                    <input class="form-control mb-3" type="text" name="existencia" 
                        placeholder="ingrese su existencia">
                    <input class="form-control mb-3" type="text" name="marca" 
                        placeholder="ingrese su marca" required>
                    <input class="form-control mb-3" type="number" name="precio" 
                        placeholder="ingrese el precio" required>
                        <input class="form-control mb-3" type="number" name="ultimoCosto" 
                        placeholder="ingrese el ultimo costo" required>
                    <br>
                    <input class="btn btn-primary" type="submit" name="BtnRegistrar" value="Registrar">
                   

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <th>idProducto</th>
                        <th>nombreProducto</th>
                        <th>existencia</th>
                        <th>marca</th>
                        <th>precio</th>
                        <th>ultimoCosto</th>
                        <th></th>
                        <th></th>
                       
                    </thead>
                    <tbody>
                        <form action="producto.php" method="POST">
                        <?php
                            while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                          
                            <td><?php echo $row['idProducto'] ?></td>
                            <th><?php echo $row['nombreProducto'] ?></th>
                            <th><?php echo $row['existencia'] ?></th>
                            <th><?php echo $row['marca'] ?></th>
                            <th><?php echo $row['precio'] ?></th>
                            <th><?php echo $row['ultimoCosto'] ?></th>
                         
                            <input type="hidden" name="nombreProducto" value = "<?php echo $row['nombreProducto']; ?>">
                            <input type="hidden" name="existencia" value = "<?php echo $row['existencia']; ?>">
                            <input type="hidden" name="marca" value = "<?php echo $row['marca']; ?>">
                            <input type="hidden" name="precio" value = "<?php echo $row['precio']; ?>">
                            <input type="hidden" name="ultimoCosto" value = "<?php echo $row['ultimoCosto']; ?>">
                            

                            <th><a  href="actualizarProducto.php?id=<?php echo $row['idProducto']?>" class="btn btn-info">Editar</a></th>
                            <th><a onclick="return confirm('Estas seguro de eliminar?');" href="producto.php?id=<?php echo $row['idProducto']?>" class="btn btn-danger">Eliminar</a></th>
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
