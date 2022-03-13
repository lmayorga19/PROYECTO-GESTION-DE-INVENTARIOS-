<?php
    require 'conexion.php';

    class Login{
        public function IniciarSesion($usuario, $clave){
            $sql = "SELECT * FROM iniciarsesion WHERE usuario = '$usuario'";
            $conexion = new Conexion();
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $obj_usuario = $stmt->fetch(PDO::FETCH_OBJ);

            if(!$obj_usuario){
                // retornar mensaje indicando que el usuario no existe
                return "El usuario no existe";
            }else{
                //validar la contraseña
                
                if($obj_usuario->clave !== $clave){
                    // retornamos mensaje que la contraseña no coincide
                    return "La contraseña ingresada no coincide";
                }

                session_start();
                $_SESSION["idUsuario"] = $obj_usuario->idUsuario;
                $_SESSION["usuario"] = $obj_usuario->usuario;
                return "OK";
            }
        }
    }

?>