<?php

    require 'conexion.php';

    class Producto{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM producto");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idProveedor){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM producto where idProducto = :idProducto");
            $stmt->bindValue(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($nombreProducto, $existencia, $marca, $precio, $ultimoCosto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `producto`
                                                (`nombreProducto`,
                                                `existencia`,
                                                `marca`,
                                                `precio`,
                                                `ultimoCosto`)
                                    VALUES (:nombreProducto,
                                            :existencia,
                                            :marca,
                                            :precio,
                                            :ultimoCosto,);");
            $stmt->bindValue(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $stmt->bindValue(":existencia", $existencia, PDO::PARAM_STR);
            $stmt->bindValue(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindValue(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindValue(":ultimoCosto", $ultimoCosto, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al guardar la información";
            }

        }

        public function Modificar($nombreProducto, $existencia, $marca, $precio, $ultimoCosto, $idProducto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `producto`
                                        SET `nombreProducto` = :nombreProducto,
                                        `existencia` = :existencia,
                                        `marca` = :marca,
                                        `precio` = :precio,
                                        `ultimoCosto` = :ultimoCosto
                                        WHERE `idProducto` = :idProducto;");
            $stmt->bindValue(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $stmt->bindValue(":existencia", $existencia, PDO::PARAM_STR);
            $stmt->bindValue(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindValue(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindValue(":ultimoCosto", $ultimoCosto, PDO::PARAM_STR);
            $stmt->bindValue(":idProducto", $idProducto, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al modificar la información";
            }

        }

        public function Eliminar($idProducto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM producto WHERE idProducto = :idProducto");
            $stmt->bindValue(":idProducto", $idProducto, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al eliminar la información";
            }

        }

    }

?>