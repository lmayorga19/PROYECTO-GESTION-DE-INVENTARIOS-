<?php

    require '../../models/supplierModel/supplierModel.php';     

    if($_POST){
        $persona = new Persona();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($persona->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($persona->ConsultarPorId($_POST["idProveedor"]));
            break;
            case "GUARDAR":
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $telefono = $_POST["telefono"];
                $correo = $_POST["correo"];
                $documento = $_POST["documento"];
                $tipoDocumento = $_POST["tipoDocumento"];

                if($nombres == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($apellidos == ""){
                    echo json_encode("Debe ingresar los apellidos de la persona");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar un telefono");
                    return;
                }

                if($correo == ""){
                    echo json_encode("Debe ingresar el correo electronico");
                    return;
                }

                if($documento == ""){
                    echo json_encode("Debe ingresar el numero de documento");
                    return;
                }
                
                if($tipoDocumento == ""){
                    echo json_encode("Debe ingresar el tipo de documento");
                    return;
                }

                $respuesta = $persona->Guardar($nombres, $apellidos, $telefono, $correo, $documento, $tipoDocumento);
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $telefono = $_POST["telefono"];
                $correo = $_POST["correo"];
                $documento = $_POST["documento"];
                $tipoDocumento = $_POST["tipoDocumento"];
                $idProveedor = $_POST["idProveedor"];

                if($nombres == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($apellidos == ""){
                    echo json_encode("Debe ingresar los apellidos de la persona");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar un telefono");
                    return;
                }

                if($correo == ""){
                    echo json_encode("Debe ingresar el correo electronico");
                    return;
                }

                if($documento == ""){
                    echo json_encode("Debe ingresar el numero de documento");
                    return;
                }
                
                if($tipoDocumento == ""){
                    echo json_encode("Debe ingresar el tipo de documento");
                    return;
                }
                $respuesta = $persona->Modificar($nombres, $apellidos, $telefono, $correo, $documento, $tipoDocumento,$idProveedor);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $idProveedor = $_POST["idProveedor"];
                $respuesta = $persona->Eliminar($idProveedor);
                echo json_encode($respuesta);
            break;
        }
    }

?>