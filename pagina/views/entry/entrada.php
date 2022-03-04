


<?php
    
    include("conexion.php");

    $fechaEntrada = $_POST['fechaEntrada'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $precioTotal = $_POST['precioTotal'];
    $idProveedor = $_POST["idProveedor"];
    $idProducto = $_POST["idProducto"];
    

    $id = $_GET["id"];
    $idEntrada = $_POST["idEntrada"];
    

    /*if(isset($_POST["BtnRegistrar"])){
        $sqlgrabar = "INSERT INTO entrada (fechaEntrada,cantidad,precio,PrecioTotal,idProveedor,idProducto)
         values ('$fechaEntrada','$cantidad' ,'$precio','$precioTotal','$idProveedor','$idProducto')";
        if(mysqli_query($conn,$sqlgrabar)){
          //echo "<script> alert('Usuario registrado con exito: $fechaEntrada '); window.location='../formulario/formulario_entrada.php' </script>";
            echo "guardado";
        }
        else{
            echo "ERROR: ".$sql."<br>".mysqli_error($conn);
        }

    }*/
  

    if(isset($_GET['id'])){
        $consulta = "DELETE FROM entrada WHERE idEntrada = '$id'";
       mysqli_query($conn,$consulta);

       
        header("Location: formulario_entrada.php");
          
    }
    if(isset($_POST['BtnActualizar'])){
      

        $consulta = "UPDATE entrada SET fechaEntrada = '$fechaEntrada', cantidad='$cantidad',precio='$precio', precioTotal = '$precioTotal',
        idProveedor = '$idProveedor', idProducto = '$idProducto' WHERE idEntrada = '$idEntrada' ";
        $query = mysqli_query($conn,$consulta);
        

        if($query){
        header("Location:formulario_entrada.php");
        }
    }

    

?>
