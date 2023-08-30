$(document).ready(function() {
    
  $('#codigo_input').on('input', function() {
    if ($(this).val() <= 0) {
      $(this).val('');
    }
    if ($(this).val() >= 0 || $(this).val('')) {
      $('#codigo_input').on('keydown', function(tecla) {
        if (tecla.keyCode == 40 || tecla.keyCode == 38) {
          tecla.preventDefault();
        };
      });
    };
  });
  
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
              $("#cantidad_input").val('');
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
  $(document).on("click", function(event) {
    if (!$(event.target).closest("#resultados_busqueda").length) {
      $("#resultados_busqueda").empty();
    }
  });


  function guardarDatosEnAlmacenamientoLocal() {
    const filas = $("#factura").html();
    localStorage.setItem("datosTabla", filas);
  }

  $("#ingresar_producto").on("click", function(event) {
    event.preventDefault();

    const codigo = $("#codigo_input").val().trim();
    const producto = $("#producto_input").val();
    const precio = $("#precio_input").val();
    const cantidad = $("#cantidad_input").val();

    if (codigo !== "" && producto !== "" && !isNaN(precio) && !isNaN(cantidad)) {
      const subtotal = precio * cantidad;
      const filaDatos = `
        <p>${codigo}</p>
        <p>${producto}</p>
        <p>$${precio}</p>
        <p>${cantidad}</p>
        <p>$${subtotal}</p>`;
      $("#factura").append(filaDatos);
      
      $("#codigo_input").val("");
      $("#producto_input").val("");
      $("#precio_input").val("");
      $("#cantidad_input").val("");
      $("#resultados_busqueda").empty();
      $('codigo_input').focus();
      total += subtotal;
      $("#t-pago").text(total);
      guardarDatosEnAlmacenamientoLocal();
    } else {
        alert("Por favor, ingrese todos los campos correctamente.");
      }
    });
    function cargarDatosDesdeAlmacenamientoLocal() {
      const datosGuardados = localStorage.getItem("datosTabla");
      if (datosGuardados) {
        $("#factura").html(datosGuardados);
      }
    }
  
  cargarDatosDesdeAlmacenamientoLocal();
  
  function eliminarDatosDelAlmacenamientoLocal() {
    localStorage.removeItem("datosTabla");
  }
  
  $("#limpiar_button").on("click", function() {
    $("#factura").empty();
    eliminarDatosDelAlmacenamientoLocal();
  });
});