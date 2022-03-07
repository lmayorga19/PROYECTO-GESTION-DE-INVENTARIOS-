function IniciarSesion() {
  var usuario = document.getElementById('usuario').value;
  var contrasena = document.getElementById('contrasena').value;

  if (usuario == '') {
    alert('Debe ingresar usuario');
    return;
  }

  if (contrasena == '') {
    alert('Debe ingresar contraseña');
    return;
  }

  var datos = {
    usuario: usuario,
    clave: contrasena,
  };

  $.ajax({
    url: '../../controller/login.controlador.php',
    data: datos,
    type: 'POST',
    dataType: 'json',
  })
    .done(function (data) {
      if (data == 'OK') {
        alert('Sesion iniciada');
        window.location = '../index.php';
      } else {
        alert(data);
      }
    })
    .fail(function (data) {
      console.log(data);
    });
}
