<?php

    require '../../models/productModel.php';     

    if($_POST){
        $persona = new Producto();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($persona->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($persona->ConsultarPorId($_POST["idProducto"]));
            break;
            case "GUARDAR":
                $nombreProducto = $_POST["nombreProducto"];
                $existencia = $_POST["existencia"];
                $marca = $_POST["marca"];
                $precio = $_POST["precio"];
                $ultimoCosto = $_POST["ultimoCosto"];

                if($nombreProducto == ""){
                    echo json_encode("Debe ingresar el nombre del producto");
                    return;
                }

                if($existencia == ""){
                    echo json_encode("Debe ingresar la existencia");
                    return;
                }

                if($marca == ""){
                    echo json_encode("Debe ingresar la marca del producto");
                    return;
                }

                if($precio == ""){
                    echo json_encode("Debe ingresar el precio del producto");
                    return;
                }

                if($ultimoCosto == ""){
                    echo json_encode("Debe ingresar el ultimo costo");
                    return;
                }

                $respuesta = $persona->Guardar($nombreProducto, $existencia, $marca, $precio, $ultimoCosto);
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $nombreProducto = $_POST["nombreProducto"];
                $existencia = $_POST["existencia"];
                $marca = $_POST["marca"];
                $precio = $_POST["precio"];
                $ultimoCosto = $_POST["ultimoCosto"];
                $idProduto = $_POST["idProducto"];

                if($nombreProducto == ""){
                    echo json_encode("Debe ingresar el nombre del producto");
                    return;
                }

                if($existencia == ""){
                    echo json_encode("Debe ingresar la existencia");
                    return;
                }

                if($marca == ""){
                    echo json_encode("Debe ingresar la marca del producto");
                    return;
                }

                if($precio == ""){
                    echo json_encode("Debe ingresar el precio del producto");
                    return;
                }

                if($ultimocosto == ""){
                    echo json_encode("Debe ingresar el ultimo costo");
                    return;
                }

                $respuesta = $persona->Modificar($nombreProducto, $existencia, $marca, $precio, $ultimoCosto, $idProducto);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $idProducto = $_POST["idProducto"];
                $respuesta = $persona->Eliminar($idProducto);
                echo json_encode($respuesta);
            break;
        }
    }

?>