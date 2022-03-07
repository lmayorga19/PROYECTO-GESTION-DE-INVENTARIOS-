<?php

    require 'conexion.php';

    class Salida{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM salida");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idSalida){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM salida where idSalida = :idSalida");
            $stmt->bindValue(":idSalida", $idSalida, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($fechaSalida, $cantidad, $precio, $precioTotal, $idCliente, $idProduto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `salida`
                                                (`fechaSalida`,
                                                `cantidad`,
                                                `precio`,
                                                `precioTotal`,
                                                `idCliente`,
                                                `idProducto`)
                                    VALUES (:fechaSalida,
                                            :cantidad,
                                            :precio,
                                            :precioTotal,
                                            :idCliente,
                                            :idProducto);");
            $stmt->bindValue(":fechaSalida", $fechaSalida, PDO::PARAM_STR);
            $stmt->bindValue(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindValue(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindValue(":precioTotal", $precioTotal, PDO::PARAM_STR);
            $stmt->bindValue(":idCliente", $idCliente, PDO::PARAM_STR);
            $stmt->bindValue(":idProducto", $idProduto, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al guardar la información";
            }

        }

        public function Modificar($fechaSalida, $cantidad, $precio, $precioTotal, $idCliente, $idProduto, $idSalida){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `salida`
                                        SET `fechaSalida` = :fechaSalida,
                                        `cantidad` = :cantidad,
                                        `precio` = :precio,
                                        `precioTotal` = :precioTotal,
                                        `idCliente` = :idCliente,
                                        `idProducto`=:idProducto
                                        WHERE `idSalida` = :idSalida;");
            $stmt->bindValue(":fechaSalida", $fechaSalida, PDO::PARAM_STR);
            $stmt->bindValue(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindValue(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindValue(":precioTotal", $precioTotal, PDO::PARAM_STR);
            $stmt->bindValue(":idCliente", $idCliente, PDO::PARAM_STR);
            $stmt->bindValue(":idProducto", $idProduto, PDO::PARAM_STR);
            $stmt->bindValue(":idSalida", $idSalida, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al modificar la información";
            }

        }

        public function Eliminar($idSalida){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM salida WHERE idSalida = :idSalida");
            $stmt->bindValue(":idSalida", $idSalida, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al eliminar la información";
            }

        }

    }

?>