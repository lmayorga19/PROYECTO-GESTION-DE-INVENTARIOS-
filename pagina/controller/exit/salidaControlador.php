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
                    echo json_encode("Debe ingresar la fecha de salida");
                    return;
                }

                if($cantidad == ""){
                    echo json_encode("Debe ingresar la cantidad del producto");
                    return;
                }

                if($precio == ""){
                    echo json_encode("Debe ingresar el precio del producto");
                    return;
                }

                if($precioTotal == ""){
                    echo json_encode("Debe ingresar el precio total");
                    return;
                }

                if($idCliente == ""){
                    echo json_encode("Debe ingresar el nombre del cliente");
                    return;
                }
                
                if($idProduto == ""){
                    echo json_encode("Debe ingresar el nombre del producto");
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
                    echo json_encode("Debe ingresar una fecha");
                    return;
                }

                if($cantidad == ""){
                    echo json_encode("Debe ingresar una cantidad");
                    return;
                }

                if($precio == ""){
                    echo json_encode("Debe ingresar un precio");
                    return;
                }

                if($precioTotal == ""){
                    echo json_encode("Debe ingresar el total");
                    return;
                }

                if($idCliente == ""){
                    echo json_encode("Debe seleccionar el nombre del cliente");
                    return;
                }
                
                if($idProduto == ""){
                    echo json_encode("Debe seleccionar el nombre del producto");
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