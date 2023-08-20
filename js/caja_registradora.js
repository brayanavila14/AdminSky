$(document).ready(function() {
    
  $('#codigo_input').on('input', function() {
    if ($(this).val() <= 0) {
      $(this).val('');
    } else if ($(this).val() >= 0) {
      $('#codigo_input').on('keydown', function(e) {
        if (e.keyCode == 40 || e.keyCode == 38) {
          e.preventDefault();
        };
      });
    };
  });
  
  let indiceSeleccionado = -1;
  let temporizador;
    
    $("#codigo_input").on("input", function () {
      
      let codigo = $(this).val().trim();
      
      clearTimeout(temporizador);
      
      if (codigo.length > 1) {
        
        temporizador = setTimeout(function() {
          
          $.ajax({
            url: "http://localhost:3000/php/busquedas_complemento.php?codigo=" + codigo,
            method: 'GET',
            dataType: 'json',
            
            success: function(data) {
              
              $("#resultados_busqueda").empty();
              data.forEach(function(data) {
                const elementoResultado = $("<div>").text(data.Código);
                elementoResultado.addClass("elemento_resultado");
                $("#resultados_busqueda").append(elementoResultado);
              });
            },
            error: function() {
              console.error('Error en la solicitud AJAX');
            }
          });
        }, 200);
      } else {
        $("#resultados_busqueda").empty();
      }
    });

    $("#resultados_busqueda").on("click", ".elemento_resultado", function() {
    
    const codigoSeleccionado = $(this).text().trim();
    $("#codigo_input").val(codigoSeleccionado);
    $("#resultados_busqueda").empty();
    
    $.ajax({
      url: "http://localhost:3000/php/busquedas_complemento.php?codigoSeleccionado=" + codigoSeleccionado,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data && data.length > 0) {
          const producto = data[0].Producto;
          const precio = data[0].Precio;
          $("#producto_input").val(producto);
          $("#precio_input").val(precio);
          $("#codigo_input").on('input', function () {
            if ($("#codigo_input").val() == '') {
              $("#producto_input").val('');
              $("#precio_input").val('');
            }
          })
          $("#cantidad_input").focus();
        }
      },
      error: function() {
        console.error('Error en la solicitud AJAX');
      }
    });
  });
  function actualizarResultadoSeleccionado() {
    $("#resultados_busqueda").children(".elemento_resultado").removeClass("seleccionado");
    $("#resultados_busqueda").children(".elemento_resultado").eq(indiceSeleccionado).addClass("seleccionado");
    const codigoSeleccionado = $("#resultados_busqueda").children(".elemento_resultado").eq(indiceSeleccionado).text().trim();
    $.ajax({
      url: "http://localhost:3000/php/busquedas_complemento.php?codigoSeleccionado=" + codigoSeleccionado,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data && data.length > 0) {
          const producto = data[0].Producto;
          const precio = data[0].Precio;
          $("#producto_input").val(producto);
          $("#precio_input").val(precio);
        }
      },
      error: function() {
        console.error('Error en la solicitud AJAX');
      }
    });
  }
  $("#codigo_input").on("keydown", function(event) {
    const cantidadResultados = $("#resultados_busqueda").children(".elemento_resultado").length;
    const teclaPresionada = event.keyCode;
    if (teclaPresionada === 40) { // Flecha hacia abajo
      indiceSeleccionado = (indiceSeleccionado + 1) % cantidadResultados;
      actualizarResultadoSeleccionado();
    } else if (teclaPresionada === 38) { // Flecha hacia arriba
      indiceSeleccionado = (indiceSeleccionado - 1 + cantidadResultados) % cantidadResultados;
      actualizarResultadoSeleccionado();
      } else if (teclaPresionada === 13) { // Tecla Enter
        const codigoSeleccionado = $("#resultados_busqueda").children(".elemento_resultado").eq(indiceSeleccionado).text().trim();
        event.preventDefault();
        $("#codigo_input").val(codigoSeleccionado);
        $("#resultados_busqueda").empty();
        const inputCantidad = document.getElementById('cantidad_input');
        inputCantidad.focus();
      }
  });
  $(document).on("click", function(event) {
    if (!$(event.target).closest("#resultados_busqueda").length) {
      $("#resultados_busqueda").empty();
      indiceSeleccionado = -1;
    }
  });
  function guardarDatosEnAlmacenamientoLocal() {
    const filas = $(".tabla-datos").html();
    localStorage.setItem("datosTabla", filas);
  }

  $("#ingresar_producto").on("click", function(event) {
    event.preventDefault();

    const codigo = $("#codigo_input").val().trim();
    const producto = $("#producto_input").val();
    const precio = parseFloat($("#precio_input").val());
    const cantidad = parseInt($("#cantidad_input").val());

    if (codigo !== "" && producto !== "" && !isNaN(precio) && !isNaN(cantidad)) {
      const subtotal = precio * cantidad;
      const filaDatos = `
      <tr class="fila-datos">
        <td>${codigo}</td>
        <td>${producto}</td>
        <td>$${precio}</td>
        <td>${cantidad}</td>
        <td>$${subtotal}</td>
      </tr>`;
      $(".tabla-datos").append(filaEncabezado);
      $(".tabla-datos").append(filaDatos);
      
      $("#codigo_input").val("");
      $("#producto_input").val("");
      $("#precio_input").val("");
      $("#cantidad_input").val("");
      $("#resultados_busqueda").empty();
      indiceSeleccionado = 0;
      
      const inputCodigo = document.getElementById('codigo_input');
      inputCodigo.focus();
      
      guardarDatosEnAlmacenamientoLocal();
      
      $("#total_input").val(subtotal);
    } else {
        alert("Por favor, ingrese todos los campos correctamente.");
      }
    });
    function cargarDatosDesdeAlmacenamientoLocal() {
      const datosGuardados = localStorage.getItem("datosTabla");
      if (datosGuardados) {
        $(".tabla-datos").html(datosGuardados);
      }
    }
  
  cargarDatosDesdeAlmacenamientoLocal();
  
  function eliminarDatosDelAlmacenamientoLocal() {
    localStorage.removeItem("datosTabla");
  }
  
  $("#btnEliminar").on("click", function() {
    $(".tabla-datos").empty();
    eliminarDatosDelAlmacenamientoLocal();
  });
});