<?php

    require '../../models/entryModel.php';     

    if($_POST){
        $persona = new Entrada();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($persona->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($persona->ConsultarPorId($_POST["idEntrada"]));
            break;
            case "GUARDAR":
                $fechaEntrada = $_POST["fechaEntrada"];
                $cantidad = $_POST["cantidad"];
                $precio = $_POST["precio"];
                $precioTotal = $_POST["precioTotal"];
                $idProveedor = $_POST["idProveedor"];
                $idProducto = $_POST["idProducto"];

                if($fechaEntrada == ""){
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
                    echo json_encode("Debe ingresar el precio total");
                    return;
                }

                if($idProveedor == ""){
                    echo json_encode("Debe seleccionar un proveedor");
                    return;
                }
                
                if($idProducto == ""){
                    echo json_encode("Debe seleccionar un producto");
                    return;
                }

                $respuesta = $persona->Guardar($fechaEntrada, $cantidad, $precio, $precioTotal, $idProveedor, $idProducto);
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $fechaEntrada = $_POST["fechaEntrada"];
                $cantidad = $_POST["cantidad"];
                $precio = $_POST["precio"];
                $precioTotal = $_POST["precioTotal"];
                $idProveedor = $_POST["idProveedor"];
                $idProducto = $_POST["idProducto"];
                $idEntrada = $_POST["idEntrada"];

                if($fechaEntrada == ""){
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
                    echo json_encode("Debe ingresar el precio total");
                    return;
                }

                if($idProveedor == ""){
                    echo json_encode("Debe seleccionar un proveedor");
                    return;
                }
                
                if($idProducto == ""){
                    echo json_encode("Debe seleccionar un producto");
                    return;
                }

                $respuesta = $persona->Modificar($fechaEntrada, $cantidad, $precio, $precioTotal, $idProveedor, $idProducto, $idEntrada);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $idEntrada = $_POST["idEntrada"];
                $respuesta = $persona->Eliminar($idEntrada);
                echo json_encode($respuesta);
            break;
        }
    }

?>