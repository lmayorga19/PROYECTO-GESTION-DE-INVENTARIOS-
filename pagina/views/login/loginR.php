<?php

    include("./../../utilities/conexion.php");
    $usuario = $_POST["usuario"];
    $contraseña =$_POST["clave"];
    
    //login 
    if(isset($_POST['ingresar']))
    {
        $query = mysqli_query($conn,"SELECT usuario, clave from iniciarsesion where usuario ='$usuario' and clave = '$contraseña '");
        $nr = mysqli_num_rows ($query);
    
        if($nr==1){
        
            echo"<script> alert('Bienvenido $usuario'); window,location = './../menu/menu.html'</script>";
    
         } else{
        
            echo "<script> alert('Usuario no existe'); window.location = './../../formulario/login.php' </script>";
        
        }
    }
    if(isset($_POST["btnRegistrar"]))
    {
      $sqlgrabar = "INSERT INTO iniciarsesion (usuario,contraseña) values ('$usuario','$contraseña')";
      if(mysqli_query($conn,$sqlgrabar))
      {
          echo "<script> alert('Usuario registrado con exito : $nombre'); window.location= 'index.html' </script>";
      } 
      else
      {
          echo "Error:".$sql."<br>".mysqli_error($conn);
      }
    
    
    
    }
    

?>