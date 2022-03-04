<?php
include 'conexion.php';
if (isset ($_POST['ingresar'])){
$ruser = $conecta->real_escape_string($_POST['usuario']);
$rpass = $conecta->real_escape_string(md5($_POST['contraseña']));
echo $ruser. $rpass;
}
?>