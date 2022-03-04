<?php
include("conexion.php");
    $id = $_GET['id'];

    $consulta = "SELECT * FROM salida WHERE idSalida = '$id'";
    $resultado = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Actualizar</title>
</head>
<body>

<div class="container mt-5">
    <form action="salida.php" method = "POST">
        <input type="hidden" name="idSalida" value="<?php echo $row['idSalida'] ?>">

        <input type="text" class="form-control mb-3" name="fechaSalida" value="<?php echo $row['fechaSalida'] ?>">
        <input type="text" class="form-control mb-3" name="cantidad" value="<?php echo $row['cantidad'] ?>">
        <input type="text" class="form-control mb-3" name="precio" value="<?php echo $row['precio'] ?>">
        <input type="text" class="form-control mb-3" name="precioTotal" value="<?php echo $row['precioTotal'] ?>">
        
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

        <input type="submit" class="btn btn-primary btn-block" name="BtnActualizar" value = "Actualizar">
    </form>

</div>
    q
</body>
</html>