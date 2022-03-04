<?php
include("conexion.php");
    $id = $_GET['id'];

    $consulta = "SELECT * FROM proveedor WHERE idProveedor = '$id'";
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
    <form action="proveedor.php" method = "POST">
        <input type="hidden" name="idProveedor" value="<?php echo $row['idProveedor'] ?>">

        <input type="text" class="form-control mb-3" name="nombre" value="<?php echo $row['nombres'] ?>">
        <input type="text" class="form-control mb-3" name="apellido" value="<?php echo $row['apellidos'] ?>">
        <input type="text" class="form-control mb-3" name="telefono" value="<?php echo $row['telefono'] ?>">
        <input type="text" class="form-control mb-3" name="correo" value="<?php echo $row['correo'] ?>">
        <input type="text" class="form-control mb-3" name="documento" value="<?php echo $row['documento'] ?>">
        <select class="form-select" name="tipoDocumento" id="" required>
            <option name="cc" value="C.C">C.C</option>
            <option name="ti" value="T.I">T.I</option>
            <option name="ce" value="C.E">C.E</option>
            <option name="rc" value="R.C">R.C</option>
        </select>

        <input type="submit" class="btn btn-primary btn-block" name="BtnActualizar" value = "Actualizar">
    </form>

</div>
    
</body>
</html>