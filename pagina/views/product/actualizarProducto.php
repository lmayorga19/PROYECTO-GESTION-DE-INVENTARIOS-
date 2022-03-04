<?php
include("conexion.php");
    $id = $_GET['id'];

    $consulta = "SELECT * FROM producto WHERE idProducto = '$id'";
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
    <form action="producto.php" method = "POST">
        <input type="hidden" name="idProducto" value="<?php echo $row['idProducto'] ?>">

        <input type="text" class="form-control mb-3" name="nombreProducto" value="<?php echo $row['nombreProducto'] ?>">
        <input type="text" class="form-control mb-3" name="existencia" value="<?php echo $row['existencia'] ?>">
        <input type="text" class="form-control mb-3" name="marca" value="<?php echo $row['marca'] ?>">
        <input type="text" class="form-control mb-3" name="precio" value="<?php echo $row['precio'] ?>">
        <input type="text" class="form-control mb-3" name="ultimoCosto" value="<?php echo $row['ultimoCosto'] ?>">
        
        

        <input type="submit" class="btn btn-primary btn-block" name="BtnActualizar" value = "Actualizar">
    </form>

</div>
    
</body>
</html>