<?php

    require '../../models/clientModel.php';     

    if($_POST){
        $persona = new Proveedor();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($persona->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($persona->ConsultarPorId($_POST["idCliente"]));
            break;
            case "GUARDAR":
                $nombresClientes = $_POST["nombresClientes"];
                $apellidosClientes = $_POST["apellidosClientes"];
                $direccion = $_POST["direccion"];
                $correo = $_POST["correo"];
                $telefono = $_POST["telefono"];
                $documento = $_POST["documento"];
                $tipoDocumento = $_POST["tipoDocumento"];

                if($nombresClientes == ""){
                    echo json_encode("Debe ingresar los nombres del cliente");
                    return;
                }

                if($apellidosClientes == ""){
                    echo json_encode("Debe ingresar los apellidos del cliente");
                    return;
                }
                if($direccion == ""){
                    echo json_encode("Debe ingresar una direccion");
                    return;
                }
                
                if($correo == ""){
                    echo json_encode("Debe ingresar el correo electronico");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar un telefono");
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

                $respuesta = $persona->Guardar($nombresClientes, $apellidosClientes, $direccion , $correo, $telefono, $documento, $tipoDocumento);
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $nombresClientes = $_POST["nombresClientes"];
                $apellidosClientes = $_POST["apellidosClientes"];
                $direccion = $_POST["direccion"];
                $correo = $_POST["correo"];
                $telefono = $_POST["telefono"];
                $documento = $_POST["documento"];
                $tipoDocumento = $_POST["tipoDocumento"];
                $idCliente = $_POST["idCliente"];

                if($nombresClientes == ""){
                    echo json_encode("Debe ingresar los nombres del cliente");
                    return;
                }

                if($apellidosClientes == ""){
                    echo json_encode("Debe ingresar los apellidos del cliente");
                    return;
                }
                if($direccion == ""){
                    echo json_encode("Debe ingresar una direccion");
                    return;
                }
                
                if($correo == ""){
                    echo json_encode("Debe ingresar el correo electronico");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar un telefono");
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
                $respuesta = $persona->Modificar($nombresClientes, $apellidosClientes,$direccion ,$correo,$telefono,  $documento, $tipoDocumento,$idCliente);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $idCliente = $_POST["idCliente"];
                $respuesta = $persona->Eliminar($idCliente);
                echo json_encode($respuesta);
            break;
        }
    }

?>