<?php

    require '../../models/exitModel.php';     

    if($_POST){
        $persona = new Salida();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($persona->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($persona->ConsultarPorId($_POST["idSalida"]));
            break;
            case "GUARDAR":
                $fechaSalida = $_POST["fechaSalida"];
                $cantidad = $_POST["cantidad"];
                $precio = $_POST["precio"];
                $precioTotal = $_POST["precioTotal"];
                $idCliente = $_POST["idCliente"];
                $idProduto = $_POST["idProducto"];

                if($fechaSalida == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($cantidad == ""){
                    echo json_encode("Debe ingresar los apellidos de la persona");
                    return;
                }

                if($precio == ""){
                    echo json_encode("Debe ingresar un telefono");
                    return;
                }

                if($precioTotal == ""){
                    echo json_encode("Debe ingresar el correo electronico");
                    return;
                }

                if($idCliente == ""){
                    echo json_encode("Debe ingresar el numero de documento");
                    return;
                }
                
                if($idProduto == ""){
                    echo json_encode("Debe ingresar el tipo de documento");
                    return;
                }

                $respuesta = $persona->Guardar($fechaSalida, $cantidad, $precio, $precioTotal, $idCliente, $idProduto);
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $fechaSalida = $_POST["fechaSalida"];
                $cantidad = $_POST["cantidad"];
                $precio = $_POST["precio"];
                $precioTotal = $_POST["precioTotal"];
                $idCliente = $_POST["idCliente"];
                $idProduto = $_POST["idProducto"];
                $idSalida = $_POST["idSalida"];

                if($fechaSalida == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($cantidad == ""){
                    echo json_encode("Debe ingresar los apellidos de la persona");
                    return;
                }

                if($precio == ""){
                    echo json_encode("Debe ingresar un telefono");
                    return;
                }

                if($precioTotal == ""){
                    echo json_encode("Debe ingresar el correo electronico");
                    return;
                }

                if($idCliente == ""){
                    echo json_encode("Debe ingresar el numero de documento");
                    return;
                }
                
                if($idProduto == ""){
                    echo json_encode("Debe ingresar el tipo de documento");
                    return;
                }

                $respuesta = $persona->Modificar($fechaSalida, $cantidad, $precio, $precioTotal, $idCliente, $idProduto, $idSalida);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $idSalida = $_POST["idSalida"];
                $respuesta = $persona->Eliminar($idSalida);
                echo json_encode($respuesta);
            break;
        }
    }

?>