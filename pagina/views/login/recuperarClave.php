<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "johanstyle";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>

<?php

//Generando clave aleatoria
$logitudPass = 4;
$miPassword  = substr( md5(microtime()), 1, $logitudPass);
$clave       = $miPassword;

$correo             = trim($_REQUEST['correo']); //Quitamos algun espacion en blanco
$consulta           = ("SELECT * FROM iniciarsesion WHERE correo ='".$correo."'");
$queryconsulta      = mysqli_query($con, $consulta);
$cantidadConsulta   = mysqli_num_rows($queryconsulta);
$dataConsulta       = mysqli_fetch_array($queryconsulta);


if($cantidadConsulta ==0){ 
    // echo json_encode("Credenciales incorrectas");
    echo '<script>alert("Correo incorrecto");</script>';
    echo '<script>window.location.href ="recuperar.html";</script>';
    exit();
}else{
$updateClave    = ("UPDATE iniciarsesion SET clave='$clave' WHERE correo='".$correo."' ");
$queryResult    = mysqli_query($con,$updateClave); 

$destinatario = $correo; 
$asunto       = "Recuperando Clave - JohanStyle";
$cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Recuperar Clave de Usuario</title>';
$cuerpo .= ' 
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 300;
        color: #888;
        background-color:rgba(230, 225, 225, 0.5);
        line-height: 30px;
        text-align: center;
    }
    .contenedor{
        width: 80%;
        min-height:auto;
        text-align: center;
        margin: 0 auto;
        background: #ececec;
        border-top: 3px solid #E64A19;
    }
    .btnlink{
        padding:15px 30px;
        text-align:center;
        background-color:#cecece;
        color: crimson !important;
        font-weight: 600;
        text-decoration: blue;
    }
    .btnlink:hover{
        color: #fff !important;
    }
    .imgBanner{
        width:50%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding:0px;
    }
    .misection{
        color: #34495e;
        margin: 4% 10% 2%;
        text-align: center;
        font-family: sans-serif;
    }
    .mt-5{
        margin-top:50px;
    }
    .mb-5{
        margin-bottom:50px;
    }
    </style>
';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    
    <tr>
    
        <td style="background-color: #ffffff;">
            <div class="misection">
                <img class="imgBanner" src="https://images.vexels.com/media/users/3/136534/isolated/preview/c93f32e11dbf6b5fe3efc5be5554ec50-icono-de-circulo-de-candado.png">
                <h2 style="color: red; margin: 0 0 7px">Hola, '.$dataConsulta['usuario'].'</h2>
                <p style="margin: 2px; font-size: 18px">Te hemos creado una nueva clave temporal para que puedas iniciar sesion, la clave temporal es: <strong>'.$clave.'</strong> </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </td>
    </tr>
</table>'; 

$cuerpo .= '
      </div>
    </body>
  </html>';
    
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= "From: WebDeveloper\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    (mail($destinatario,$asunto,$cuerpo,$headers));

     echo '<script>alert("Se ha enviado una contraseña temporal a su correo electronico");</script>';
    echo '<script>window.location.href ="login.html";</script>';
    exit();
}

?>
