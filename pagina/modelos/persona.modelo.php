<?php

    require 'conexion.php';

    class Persona{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM proveedor");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idProveedor){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM proveedor where idProveedor = :idProveedor");
            $stmt->bindValue(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($nombres, $apellidos, $telefono, $correo, $documento, $tipoDocumento){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `proveedor`
                                                (`nombres`,
                                                `apellidos`,
                                                `telefono`,
                                                `correo`,
                                                `documento`,
                                                `tipoDocumento`)
                                    VALUES (:nombres,
                                            :apellidos,
                                            :telefono,
                                            :correo,
                                            :documento,
                                            :tipoDocumento);");
            $stmt->bindValue(":nombres", $nombres, PDO::PARAM_STR);
            $stmt->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
            $stmt->bindValue(":documento", $documento, PDO::PARAM_STR);
            $stmt->bindValue(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al guardar la información";
            }

        }

        public function Modificar($nombres, $apellidos, $telefono, $correo, $documento, $tipoDocumento,$idProveedor){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `proveedor`
                                        SET `nombres` = :nombres,
                                        `apellidos` = :apellidos,
                                        `telefono` = :telefono,
                                        `correo` = :correo,
                                        `documento` = :documento,
                                        `tipoDocumento`=:tipoDocumento
                                        WHERE `idProveedor` = :idProveedor;");
            $stmt->bindValue(":nombres", $nombres, PDO::PARAM_STR);
            $stmt->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
            $stmt->bindValue(":documento", $documento, PDO::PARAM_STR);
            $stmt->bindValue(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
            $stmt->bindValue(":idProveedor", $idProveedor, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al modificar la información";
            }

        }

        public function Eliminar($idProveedor){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM proveedor WHERE idProveedor = :idProveedor");
            $stmt->bindValue(":idProveedor", $idProveedor, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al eliminar la información";
            }

        }

    }

?>