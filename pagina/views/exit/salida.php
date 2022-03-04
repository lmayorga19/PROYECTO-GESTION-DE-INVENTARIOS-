<?php
    
    include("conexion.php");

    $fechaSalida = $_POST['fechaSalida'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $precioTotal = $_POST['precioTotal'];
    $idCliente = $_POST["idCliente"];
    $idProducto = $_POST["idProducto"];
    

    
    $idSalida = $_POST["idSalida"];
    

    if(isset($_POST["BtnRegistrar"])){
        $sqlgrabar = "INSERT INTO salida (fechaSalida,cantidad,precio,PrecioTotal,idCliente,idProducto)
         values ('$fechaSalida','$cantidad' ,'$precio','$precioTotal','$idCliente','$idProducto')";
        if(mysqli_query($conn,$sqlgrabar)){
            echo "<script> alert('Usuario registrado con exito: $fechaSalida'); window.location='../formulario/formulario_salida.php' </script>";
        }
        else{
            echo "ERROR: ".$sql."<br>".mysqli_error($conn);
        }

    }
  

    if(isset($_GET['id'])){
        $consulta = "DELETE FROM salida WHERE idSalida = '$id'";
       mysqli_query($conn,$consulta);

       
        header("Location: formulario_salida.php");
          
    }
    if(isset($_POST['BtnActualizar'])){
      

        $consulta = "UPDATE salida SET fechaSalida = '$fechaSalida', cantidad='$cantidad',precio='$precio', precioTotal = '$precioTotal',
        idCliente = '$idCliente', idProducto = '$idProducto' WHERE idSalida = '$idSalida' ";
        $query = mysqli_query($conn,$consulta);
        

        if($query){
        header("Location:formulario_salida.php");
        }
    }

    

?>
