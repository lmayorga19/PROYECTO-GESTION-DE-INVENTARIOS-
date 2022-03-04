<?php
    
    include("conexion.php");

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $documento = $_POST["documento"];
    $tipodocumento = $_POST["tipoDocumento"];

    $id = $_GET["id"];
    $idCliente = $_POST["idCliente"];
    

    if(isset($_POST["BtnRegistrar"])){
        $sqlgrabar = "INSERT INTO cliente(nombresClientes,apellidosClientes,direccion,telefono,correo,documento,tipoDocumento)
         values ('$nombre','$apellido' ,'$direccion','$telefono','$correo','$documento','$tipodocumento')";
        if(mysqli_query($conn,$sqlgrabar)){
            echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='../formulario/formulario_cliente.php' </script>";
        }
        else{
            echo "ERROR: ".$sql."<br>".mysqli_error($conn);
        }

    }
  

    if(isset($_GET['id'])){
        $consulta = "DELETE FROM cliente WHERE idCliente = '$id'";
       mysqli_query($conn,$consulta);

       
        header("Location: formulario_cliente.php");
          
    }
    if(isset($_POST['BtnActualizar'])){
      

        $consulta = "UPDATE cliente SET nombresClientes = '$nombre', apellidosClientes='$apellido',direccion='$direccion', telefono = '$telefono',
        correo = '$correo', documento = '$documento', tipoDocumento='$tipodocumento' WHERE idCliente = '$idCliente' ";
        $query = mysqli_query($conn,$consulta);
        

        if($query){
        header("Location:formulario_cliente.php");
        }
    }

    

?>
