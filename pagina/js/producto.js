var url = '../../controller/product/productoControlador.php';

$(document).ready(function () {
  Consultar();
});

function Consultar() {
  $.ajax({
    data: { accion: 'CONSULTAR' },
    url: url,
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      var html = '';
      $.each(response, function (index, data) {
        html += '<tr>';
        html += '<td>' + data.nombreProducto + '</td>';
        html += '<td>' + data.existencia + '</td>';
        html += '<td>' + data.marca + '</td>';
        html += '<td>' + data.precio + '</td>';
        html += '<td>' + data.ultimoCosto + '</td>';
        html += '<td>';
        html +=
          "<button class='btn btn-warning' onclick='ConsultarPorId(" +
          data.idProducto +
          ");'><span class='fa fa-edit'></span> Modificar</button>";
        html +=
          "<button class='btn btn-danger' onclick='Eliminar(" +
          data.idProducto +
          ");'><span class='fa fa-trash'></span> Eliminar</button>";
        html += '</td>';
        html += '</tr>';
      });

      document.getElementById('datos').innerHTML = html;
      $('#tablaProducto').DataTable();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function ConsultarPorId(idProducto) {
  $.ajax({
    url: url,
    data: { idProducto: idProducto, accion: 'CONSULTAR_ID' },
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      document.getElementById('nombreProducto').value = response.nombreProducto;
      document.getElementById('existencia').value = response.existencia;
      document.getElementById('marca').value = response.marca;
      document.getElementById('precio').value = response.precio;
      document.getElementById('ultimoCosto').value = response.ultimoCosto;
      document.getElementById('idProducto').value = response.idProducto;
      BloquearBotones(false);
    })
    .fail(function (response) {
      console.log(response);
    });
}

function Guardar() {
  $.ajax({
    url: url,
    data: retornarDatos('GUARDAR'),
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      if (response == 'OK') {
        MostrarAlerta('Éxito!', 'Datos guardados con éxito', 'success');
      } else {
        MostrarAlerta('Error!', response, 'error');
      }
      Limpiar();
      Consultar();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function Modificar() {
  $.ajax({
    url: url,
    data: retornarDatos('MODIFICAR'),
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      if (response == 'OK') {
        MostrarAlerta('Éxito!', 'Datos actualizados con éxito', 'success');
      } else {
        MostrarAlerta('Error!', response, 'error');
      }
      Limpiar();
      Consultar();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function Eliminar(idProducto) {
  $.ajax({
    url: url,
    data: { idProducto: idProducto, accion: 'ELIMINAR' },
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      if (response == 'OK') {
        MostrarAlerta('Éxito!', 'Datos eliminados con éxito', 'success');
      } else {
        MostrarAlerta('Error!', response, 'error');
      }
      Consultar();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function Validar() {
  nombreProducto = document.getElementById('nombreProducto').value;
  existencia = document.getElementById('existencia').value;
  marca = document.getElementById('marca').value;
  precio = document.getElementById('precio').value;
  ultimoCosto = document.getElementById('ultimoCosto').value;

  if (
    nombreProducto == '' ||
    existencia == '' ||
    marca == '' ||
    precio == '' ||
    ultimoCosto == ''
  ) {
    return false;
  }
  return true;
}

function retornarDatos(accion) {
  return {
    nombreProducto: document.getElementById('nombreProducto').value,
    existencia: document.getElementById('existencia').value,
    marca: document.getElementById('marca').value,
    precio: document.getElementById('precio').value,
    ultimoCosto: document.getElementById('ultimoCosto').value,
    accion: accion,
    idProducto: document.getElementById('idProducto').value,
  };
}

function Limpiar() {
  document.getElementById('nombreProducto').value = '';
  document.getElementById('existencia').value = '';
  document.getElementById('marca').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('ultimoCosto').value = '';
  BloquearBotones(true);
}

function BloquearBotones(guardar) {
  if (guardar) {
    document.getElementById('guardar').disabled = false;
    document.getElementById('modificar').disabled = true;
  } else {
    document.getElementById('guardar').disabled = true;
    document.getElementById('modificar').disabled = false;
  }
}

function MostrarAlerta(titulo, descripcion, tipoAlerta) {
  Swal.fire(titulo, descripcion, tipoAlerta);
}
