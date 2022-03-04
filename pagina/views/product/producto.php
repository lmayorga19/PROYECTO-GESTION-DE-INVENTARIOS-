<?php
    
    include("conexion.php");

    $nombreProducto = $_POST['nombreProducto'];
    $existencia = $_POST['existencia'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $ultimoCosto = $_POST["ultimoCosto"];
    
    

    $id = $_GET["id"];
    $idProducto = $_POST["idProducto"];
    

    if(isset($_POST["BtnRegistrar"])){
        $sqlgrabar = "INSERT INTO producto (nombreProducto,existencia,marca,precio,ultimoCosto)
         values ('$nombreProducto','$existencia','$marca','$precio','$ultimoCosto')";
        if(mysqli_query($conn,$sqlgrabar)){
            echo "<script> alert('Usuario registrado con exito: $nombreProducto'); window.location='../formulario/formulario_producto.php' </script>";
        }
        else{
            echo "ERROR: ".$sql."<br>".mysqli_error($conn);
        }

    }
  

    if(isset($_GET['id'])){
        $consulta = "DELETE FROM producto WHERE idProducto = '$id'";
       mysqli_query($conn,$consulta);

       
        header("Location: formulario_producto.php");
          
    }
    if(isset($_POST['BtnActualizar'])){
      

        $consulta = "UPDATE producto SET nombreProducto = '$nombreProducto', existencia='$existencia',marca='$marca', precio = '$precio',
        ultimoCosto = '$ultimoCosto' WHERE idProducto = '$idProducto' ";
        $query = mysqli_query($conn,$consulta);
        

        if($query){
        header("Location:formulario_producto.php");
        }
    }

    

?>
