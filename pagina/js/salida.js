var url = '../../controller/exit/salidaControlador.php';

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
        html += '<td>' + data.fechaSalida + '</td>';
        html += '<td>' + data.cantidad + '</td>';
        html += '<td>' + data.precio + '</td>';
        html += '<td>' + data.precioTotal + '</td>';
        html += '<td>' + data.idCliente + '</td>';
        html += '<td>' + data.idProducto + '</td>';
        html += '<td>';
        html +=
          "<button class='btn btn-warning' onclick='ConsultarPorId(" +
          data.idProveedor +
          ");'><span class='fa fa-edit'></span> Modificar</button>";
        html +=
          "<button class='btn btn-danger' onclick='Eliminar(" +
          data.idProveedor +
          ");'><span class='fa fa-trash'></span> Eliminar</button>";
        html += '</td>';
        html += '</tr>';
      });

      document.getElementById('datos').innerHTML = html;
      $('#tablaSalida').DataTable();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function ConsultarPorId(idSalida) {
  $.ajax({
    url: url,
    data: { idSalida: idSalida, accion: 'CONSULTAR_ID' },
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      document.getElementById('fechaSaldia').value = response.fechaSalida;
      document.getElementById('cantidad').value = response.cantidad;
      document.getElementById('precio').value = response.precio;
      document.getElementById('precioTotal').value = response.precioTotal;
      document.getElementById('idCliente').value = response.idCliente;
      document.getElementById('idProducto').value = response.idProducto;
      document.getElementById('idSalida').value = response.idSalida;
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

function Eliminar(idSalida) {
  $.ajax({
    url: url,
    data: { idSalida: idSalida, accion: 'ELIMINAR' },
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
  fechaSalida = document.getElementById('fechaSalida').value;
  cantidad = document.getElementById('cantidad').value;
  precio = document.getElementById('precio').value;
  precioTotal = document.getElementById('precioTotal').value;
  idCliente = document.getElementById('idCliente').value;
  idProducto = document.getElementById('idProducto').value;

  if (
    fechaSalida == '' ||
    cantidad == '' ||
    precio == '' ||
    precioTotal == '' ||
    idCliente == '' ||
    idProducto == ''
  ) {
    return false;
  }
  return true;
}

function retornarDatos(accion) {
  return {
    fechaSalida: document.getElementById('fechaSalida').value,
    cantidad: document.getElementById('cantidad').value,
    precio: document.getElementById('precio').value,
    precioTotal: document.getElementById('precioTotal').value,
    idCliente: document.getElementById('idCliente').value,
    idProducto: document.getElementById('idProducto').value,
    accion: accion,
    idSalida: document.getElementById('idSalida').value,
  };
}

function Limpiar() {
  document.getElementById('fechaSalida').value = '';
  document.getElementById('cantidad').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('precioTotal').value = '';
  document.getElementById('idCliente').value = '';
  document.getElementById('idProducto').value = '';
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
