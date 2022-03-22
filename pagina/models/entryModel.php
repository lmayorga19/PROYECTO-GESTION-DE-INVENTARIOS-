<?php

    require 'conexion.php';

    class Entrada{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM entrada");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idEntrada){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM entrada where idEntrada = :idEntrada");
            $stmt->bindValue(":idEntrada", $idEntrada, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($fechaEntrada, $cantidad, $precio, $precioTotal, $idProveedor, $idProducto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `entrada`
                                                (`fechaEntrada`,
                                                `cantidad`,
                                                `precio`,
                                                `precioTotal`,
                                                `idProveedor`,
                                                `idProducto`)
                                    VALUES (:fechaEntrada,
                                            :cantidad,
                                            :precio,
                                            :precioTotal,
                                            :idProveedor,
                                            :idProducto);");
            $stmt->bindValue(":fechaEntrada", $fechaEntrada, PDO::PARAM_STR);
            $stmt->bindValue(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindValue(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindValue(":precioTotal", $precioTotal, PDO::PARAM_STR);
            $stmt->bindValue(":idProveedor", $idProveedor, PDO::PARAM_STR);
            $stmt->bindValue(":idProducto", $idProducto, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al guardar la información";
            }

        }

        public function Modificar($fechaEntrada, $cantidad, $precio, $precioTotal, $idProveedor, $idProducto, $idEntrada){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `entrada`
                                        SET `fechaEntrada` = :fechaEntrada,
                                        `cantidad` = :cantidad,
                                        `precio` = :precio,
                                        `precioTotal` = :precioTotal,
                                        `idProveedor` = :idProveedor,
                                        `idProducto`=:idProducto
                                        WHERE `idEntrada` = :idEntrada;");
            $stmt->bindValue(":fechaEntrada", $fechaEntrada, PDO::PARAM_STR);
            $stmt->bindValue(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindValue(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindValue(":precioTotal", $precioTotal, PDO::PARAM_STR);
            $stmt->bindValue(":idProveedor", $idProveedor, PDO::PARAM_STR);
            $stmt->bindValue(":idProducto", $idProducto, PDO::PARAM_STR);
            $stmt->bindValue(":idEntrada", $idEntrada, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al modificar la información";
            }
        }

        public function Eliminar($idEntrada){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM entrada WHERE idEntrada = :idEntrada");
            $stmt->bindValue(":idEntrada", $idEntrada, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al eliminar la información";
            }

        }

    }

?>