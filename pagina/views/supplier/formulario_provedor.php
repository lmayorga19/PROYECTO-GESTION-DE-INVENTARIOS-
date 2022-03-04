
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./../../assets/SweetAlert/dist/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="menu.html">Regresar</a>
        </nav>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h4>Proveedor</h4>
                <form action="" method="POST">
                    <input type="hidden" name="idProveedor" id="idProveedor">

                    <input class="form-control mb-3" type="text" name="nombre" id="nombres"
                        placeholder="Ingrese un nombre " >
                    <input class="form-control mb-3" type="text" name="apellido" id="apellidos"
                        placeholder="ingrese un apellido">
                    <input class="form-control mb-3" type="text" name="telefono" id="telefono"
                        placeholder="ingrese un telefono" required>
                    <input class="form-control mb-3" type="email" name="correo" id="correo"
                        placeholder="ingrese su correo" required>
                    <input class="form-control mb-3" type="number" name="documento" id="documento
                        placeholder="ingrese su documento" required>
                    <select id="tipoDocumento" class="form-select" name="tipoDocumento" id="" required>
                        <option name="cc" value="C.C">C.C</option>
                        <option name="ti" value="T.I">T.I</option>
                        <option name="ce" value="C.E">C.E</option>
                        <option name="rc" value="R.C">R.C</option>
                    </select>
                    <br>
                    <button class="btn btn-primary" id="guardar" onclick="Guardar()">Guardar</button>
                   

                </form>
            </div>
        </div>
    </div>
</body>
<script type="./../../assets/jquery/jquery.js" src=""></script>
<script src="./../../assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
<script src="./../../js/proveedor_n.js"> <script>
</html>


