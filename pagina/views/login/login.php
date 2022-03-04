<?php
    include ("./../../utilities/conexion.php");
?>
<!DOCTYPE html> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../css/iniciarSesion.css">
</head>
<body>
<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			 <div class="container">
			 	<div class="form">
                 <h2>Iniciar Sesión</h2>
    <form action="loginR.php" method="POST"> 
    <div class="inputBox">
        <input type="text"name= "usuario" placeholder="usuario">
    </div>
        <div  class="inputBox">
        <input type="password" name="clave" placeholder="clave">
     </div>
     <div  class="inputBox">
        <button name="ingresar">iniciar Sesion</button>
</div>
<p class="forget">
	Has olvidado tu contraseña? <a href="recuperar.html">Recuperar contraseña</a>
	</p>
	<p class="forget">
	No tienes una cuenta? <a href="registrarse.html">Crear Cuenta</a>
	</p>

    </form>
    
</body>
</html>