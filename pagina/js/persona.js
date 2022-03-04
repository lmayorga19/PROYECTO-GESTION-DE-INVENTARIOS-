var url = './../controlador/persona.controlador.php';

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
        html += '<td>' + data.nombres + '</td>';
        html += '<td>' + data.apellidos + '</td>';
        html += '<td>' + data.telefono + '</td>';
        html += '<td>' + data.correo + '</td>';
        html += '<td>' + data.documento + '</td>';
        html += '<td>' + data.tipoDocumento + '</td>';
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
      $('#tablaPersona').DataTable();
    })
    .fail(function (response) {
      console.log(response);
    });
}

function ConsultarPorId(idProveedor) {
  $.ajax({
    url: url,
    data: { idProveedor: idProveedor, accion: 'CONSULTAR_ID' },
    type: 'POST',
    dataType: 'json',
  })
    .done(function (response) {
      document.getElementById('nombres').value = response.nombres;
      document.getElementById('apellidos').value = response.apellidos;
      document.getElementById('telefono').value = response.telefono;
      document.getElementById('correo').value = response.correo;
      document.getElementById('documento').value = response.documento;
      document.getElementById('tipoDocumento').value = response.tipoDocumento;
      document.getElementById('idProveedor').value = response.idProveedor;
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

function Eliminar(idProveedor) {
  $.ajax({
    url: url,
    data: { idProveedor: idProveedor, accion: 'ELIMINAR' },
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
  nombres = document.getElementById('nombres').value;
  apellidos = document.getElementById('apellidos').value;
  telefono = document.getElementById('telefono').value;
  correo = document.getElementById('correo').value;
  documento = document.getElementById('documento').value;
  tipoDocumento = document.getElementById('tipoDocumento').value;

  if (
    nombres == '' ||
    apellidos == '' ||
    telefono == '' ||
    correo == '' ||
    documento == '' ||
    tipoDocumento == ''
  ) {
    return false;
  }
  return true;
}

function retornarDatos(accion) {
  return {
    nombres: document.getElementById('nombres').value,
    apellidos: document.getElementById('apellidos').value,
    telefono: document.getElementById('telefono').value,
    correo: document.getElementById('correo').value,
    documento: document.getElementById('documento').value,
    tipoDocumento: document.getElementById('tipoDocumento').value,
    accion: accion,
    idProveedor: document.getElementById('idProveedor').value,
  };
}

function Limpiar() {
  document.getElementById('nombres').value = '';
  document.getElementById('apellidos').value = '';
  document.getElementById('telefono').value = '';
  document.getElementById('correo').value = '';
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
