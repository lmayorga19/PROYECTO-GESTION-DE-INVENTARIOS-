var url = '../../controller/entry/entrada.controlador.php';

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
        html += '<td>' + data.fechaEntrada + '</td>';
        html += '<td>' + data.cantidad + '</td>';
        html += '<td>' + data.precio + '</td>';
        html += '<td>' + data.precioTotal + '</td>';
        html += '<td>' + data.idProveedor + '</td>';
        html += '<td>' + data.idProducto + '</td>';
        html += '<td>';
        html +=
          "<button class='btn btn-warning' onclick='ConsultarPorId(" +
          data.idEntrada +
          ");'><span class='fa fa-edit'></span> Modificar</button>";
        html +=
          "<button class='btn btn-danger' onclick='Eliminar(" +
          data.idEntrada +
          ");'><span class='fa fa-trash'></span> Eliminar</button>";
        html += '</td>';
        html += '</tr>';
      });

      document.getElementById('datos').innerHTML = html;
      $('#tablaEntrada').DataTable();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function ConsultarPorId(idEntrada) {
  $.ajax({
    url: url,
    data: { idEntrada: idEntrada, accion: 'CONSULTAR_ID' },
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      document.getElementById('fechaEntrada').value = response.nombres;
      document.getElementById('cantidad').value = response.apellidos;
      document.getElementById('precio').value = response.telefono;
      document.getElementById('precioTotal').value = response.correo;
      document.getElementById('idProveedor').value = response.documento;
      document.getElementById('idProducto').value = response.tipoDocumento;
      document.getElementById('idEntrada').value = response.idProveedor;
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

function Eliminar(idEntrada) {
  $.ajax({
    url: url,
    data: { idEntrada: idEntrada, accion: 'ELIMINAR' },
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
  fechaEntrada = document.getElementById('fechaEntrada').value;
  cantidad = document.getElementById('cantidad').value;
  precio = document.getElementById('precio').value;
  precioTotal = document.getElementById('precioTotal').value;
  idProveedor = document.getElementById('idProveedor').value;
  idProducto = document.getElementById('idProducto').value;

  if (
    fechaEntrada == '' ||
    cantidad == '' ||
    precio == '' ||
    precioTotal == '' ||
    idProveedor == '' ||
    idProducto == ''
  ) {
    return false;
  }
  return true;
}

function retornarDatos(accion) {
  return {
    fechaEntrada: document.getElementById('fechaEntrada').value,
    cantidad: document.getElementById('cantidad').value,
    precio: document.getElementById('precio').value,
    precioTotal: document.getElementById('precioTotal').value,
    idProveedor: document.getElementById('idProveedor').value,
    idProducto: document.getElementById('idProducto').value,
    accion: accion,
    idEntrada: document.getElementById('idEntrada').value,
  };
}

function Limpiar() {
  document.getElementById('fechaEntrada').value = '';
  document.getElementById('cantidad').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('precioTotal').value = '';
  document.getElementById('idProveedor').value = '';
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
