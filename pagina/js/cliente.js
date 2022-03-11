var url = '../../controller/client/clienteControlador.php';

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
        html += '<td>' + data.nombresClientes + '</td>';
        html += '<td>' + data.apellidosClientes + '</td>';
        html += '<td>' + data.direccion + '</td>';
        html += '<td>' + data.correo + '</td>';
        html += '<td>' + data.telefono + '</td>';
        html += '<td>' + data.documento + '</td>';
        html += '<td>' + data.tipoDocumento + '</td>';
        html += '<td>';
        html +=
          "<button class='btn btn-warning' onclick='ConsultarPorId(" +
          data.idCliente +
          ");'><span class='fa fa-edit'></span> Modificar</button>";
        html +=
          "<button class='btn btn-danger' onclick='Eliminar(" +
          data.idCliente +
          ");'><span class='fa fa-trash'></span> Eliminar</button>";
        html += '</td>';
        html += '</tr>';
      });

      document.getElementById('datos').innerHTML = html;
      $('#tablaCliente').DataTable();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function ConsultarPorId(idCliente) {
  $.ajax({
    url: url,
    data: { idCliente: idCliente, accion: 'CONSULTAR_ID' },
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      document.getElementById('nombresClientes').value =
        response.nombresClientes;
      document.getElementById('apellidosClientes').value =
        response.apellidosClientes;
      document.getElementById('direccion').value = response.direccion;
      document.getElementById('correo').value = response.correo;
      document.getElementById('telefono').value = response.telefono;
      document.getElementById('documento').value = response.documento;
      document.getElementById('tipoDocumento').value = response.tipoDocumento;
      document.getElementById('idCliente').value = response.idCliente;
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

function Eliminar(idCliente) {
  $.ajax({
    url: url,
    data: { idCliente: idCliente, accion: 'ELIMINAR' },
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
  nombresClientes = document.getElementById('nombresClientes').value;
  apellidosClientes = document.getElementById('apellidosClientes').value;
  direccion = document.getElementById('direccion').value;
  correo = document.getElementById('correo').value;
  telefono = document.getElementById('telefono').value;
  documento = document.getElementById('documento').value;
  tipoDocumento = document.getElementById('tipoDocumento').value;

  if (
    nombresClientes == '' ||
    apellidosClientes == '' ||
    direccion == '' ||
    correo == '' ||
    telefono == '' ||
    documento == '' ||
    tipoDocumento == ''
  ) {
    return false;
  }
  return true;
}

function retornarDatos(accion) {
  return {
    nombresClientes: document.getElementById('nombresClientes').value,
    apellidosClientes: document.getElementById('apellidosClientes').value,
    direccion: document.getElementById('direccion').value,
    correo: document.getElementById('correo').value,
    telefono: document.getElementById('telefono').value,
    documento: document.getElementById('documento').value,
    tipoDocumento: document.getElementById('tipoDocumento').value,
    accion: accion,
    idCliente: document.getElementById('idCliente').value,
  };
}

function Limpiar() {
  document.getElementById('nombresClientes').value = '';
  document.getElementById('apellidosClientes').value = '';
  document.getElementById('direccion').value = '';
  document.getElementById('correo').value = '';
  document.getElementById('telefono').value = '';
  document.getElementById('documento').value = '';
  document.getElementById('tipoDocumento').value = '';
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
