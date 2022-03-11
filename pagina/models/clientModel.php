<?php

    require 'conexion.php';

    class Proveedor{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM cliente");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idCliente){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM cliente where idCliente = :idCliente");
            $stmt->bindValue(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($nombresClientes, $apellidosClientes, $direccion, $correo,$telefono,$documento, $tipoDocumento){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `cliente`
                                                (`nombresClientes`,
                                                `apellidosClientes`,
                                                `direccion`,
                                                `correo`,
                                                `telefono`,
                                                `documento`,
                                                `tipoDocumento`)
                                    VALUES (:nombresClientes,
                                            :apellidosClientes,
                                            :direccion,
                                            :correo,
                                            :telefono
                                            :documento,
                                            :tipoDocumento);");
            $stmt->bindValue(":nombresClientes", $nombresClientes, PDO::PARAM_STR);
            $stmt->bindValue(":apellidosClientes", $apellidosClientes, PDO::PARAM_STR);
            $stmt->bindValue(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":documento", $documento, PDO::PARAM_STR);
            $stmt->bindValue(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al guardar la información";
            }

        }

        public function Modificar($nombresClientes, $apellidosClientes, $direccion, $correo,$telefono,$documento, $tipoDocumento, $idCliente){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `cliente`
                                        SET `nombresClientes` = :nombresClientes,
                                        `apellidosClientes` = :apellidosClientes,
                                        `direccion` = :direccion,
                                        `correo` = :correo,
                                        `telefono` = :telefono,
                                        `documento` = :documento,
                                        `tipoDocumento`=:tipoDocumento
                                        WHERE `idCliente` = :idCliente;");
            $stmt->bindValue(":nombresClientes", $nombresClientes, PDO::PARAM_STR);
            $stmt->bindValue(":apellidosClientes", $apellidosClientes, PDO::PARAM_STR);
            $stmt->bindValue(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":documento", $documento, PDO::PARAM_STR);
            $stmt->bindValue(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
            $stmt->bindValue(":idCliente", $idCliente, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al modificar la información";
            }

        }

        public function Eliminar($idCliente){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM cliente WHERE idCliente = :idCliente");
            $stmt->bindValue(":idCliente", $idCliente, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al eliminar la información";
            }

        }

    }

?>