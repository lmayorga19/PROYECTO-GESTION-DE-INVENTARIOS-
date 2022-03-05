<?php

    class Conexion extends PDO{

        public function __construct(){
            try{
                parent::__construct('mysql:host=127.0.0.1;dbname=johanstyle', 'root', 'angeles-32');
                parent::exec("set names utf8");
            }catch(PDOException $e){
                echo "Error al conectar " . $e->getMessage();
                exit;
            }
        }

    }

?>