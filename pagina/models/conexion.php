<?php

    class Conexion extends PDO{

        public function __construct(){
            try{
                parent::__construct('mysql:host=127.0.0.1;dbname=dbjohanstyle', 'root', '');
                parent::exec("set names utf8");
            }catch(PDOException $e){
                echo "Error al conectar " . $e->getMessage();
                exit;
            }
        }

    }

?>