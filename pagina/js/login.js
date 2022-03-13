function IniciarSesion() {
  var usuario = document.getElementById('usuario').value;
  var clave = document.getElementById('clave').value;

  if (usuario == '') {
    alert('Debe ingresar usuario');
    return;
  }

  if (clave == '') {
    alert('Debe ingresar contraseña');
    return;
  }

  var datos = {
    usuario: usuario,
    clave: clave,
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
        window.location = '../../views/menu/menu.html';
      } else {
        alert(data);
      }
    })
    .fail(function (data) {
      console.log(data);
    });
}
