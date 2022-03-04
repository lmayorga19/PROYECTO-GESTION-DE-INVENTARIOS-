<?php  include("conexion.php");
    $consulta = "SELECT * FROM cliente";
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
                <h4>Cliente</h4>
                <form action="cliente.php" method="POST">

                    <input class="form-control mb-3" type="text" name="nombre"
                        placeholder="Ingrese un nombre " required>
                    <input class="form-control mb-3" type="text" name="apellido" 
                        placeholder="ingrese un apellido">
                    <input class="form-control mb-3" type="text" name="direccion" 
                        placeholder="ingrese su direccion" required>
                    <input class="form-control mb-3" type="email" name="correo" 
                        placeholder="ingrese su correo" required>
                        <input class="form-control mb-3" type="number" name="telefono" 
                        placeholder="ingrese su telefono" required>
                    <input class="form-control mb-3" type="number" name="documento" 
                        placeholder="ingrese su documento" required>
                    <select class="form-select" name="tipoDocumento" id="" required>
                        <option name="cc" value="C.C">C.C</option>
                        <option name="ti" value="T.I">T.I</option>
                        <option name="ce" value="C.E">C.E</option>
                        <option name="rc" value="R.C">R.C</option>
                    </select>
                    <br>
                    <input class="btn btn-primary" type="submit" name="BtnRegistrar" value="Registrar">
                   

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>direccion</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Documento</th>
                        <th>Tipo</th>
                        <th></th>
                        <th></th>
                       
                    </thead>
                    <tbody>
                        <form action="cliente.php" method="POST">
                        <?php
                            while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                          
                            <td><?php echo $row['idCliente'] ?></td>
                            <th><?php echo $row['nombresClientes'] ?></th>
                            <th><?php echo $row['apellidosClientes'] ?></th>
                            <th><?php echo $row['direccion'] ?></th>
                            <th><?php echo $row['correo'] ?></th>
                            <th><?php echo $row['telefono'] ?></th>
                            <th><?php echo $row['documento'] ?></th>
                            <th><?php echo $row['tipoDocumento'] ?></th>

                         
                            <input type="hidden" name="nombre" value = "<?php echo $row['nombresClientes']; ?>">
                            <input type="hidden" name="apellido" value = "<?php echo $row['apellidosClientes']; ?>">
                            <input type="hidden" name="direccion" value = "<?php echo $row['direccion']; ?>">
                            <input type="hidden" name="correo" value = "<?php echo $row['correo']; ?>">
                            <input type="hidden" name="telefono" value = "<?php echo $row['telefono']; ?>">
                            <input type="hidden" name="documento" value = "<?php echo $row['documento']; ?>">
                            <input type="hidden" name="tipoDocumento" value = "<?php echo $row['tipoDocumento']; ?>">

                            <th><a  href="actualizarCliente.php?id=<?php echo $row['idCliente']?>" class="btn btn-info">Editar</a></th>
                            <th><a onclick="return confirm('Estas seguro de eliminar?');" href="cliente.php?id=<?php echo $row['idCliente']?>" class="btn btn-danger">Eliminar</a></th>
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
