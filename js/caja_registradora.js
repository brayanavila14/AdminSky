$(document).ready(function() {
  let selectedIndex = -1;

  function updateResults() {
    let timer;

    $("#code_input").on('input', function() {
      const query = $(this).val().trim();

      clearTimeout(timer);

      if (query.length > 0) {
        timer = setTimeout(function() {
          $.ajax({
            url: `http://localhost:3000/php/busqueda_codigo.php?query=${query}`,
            method: 'GET',
            dataType: 'json',
            success: function(results) {
              $("#search_results").empty();

              results.forEach(function(result) {
                const resultItem = $("<div>").text(result.Código);
                resultItem.addClass("items");
                $("#search_results").append(resultItem);
              });
            },
            error: function() {
              console.error('Error en la solicitud AJAX');
            }
          });
        }, 300);
      } else {
        $("#search_results").empty();
      }
    });
  }

  $("#code_input").on("input", updateResults);

  $("#search_results").on("click", "div", function() {
    const Code = $(this).text().trim();
    $("#code_input").val(Code);
    $("#search_results").empty();

    $.ajax({
      url: `http://localhost:3000/php/busqueda_codigo.php?code=${Code}`,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data && data.length > 0) {
          const producto = data[0].Producto;
          const precio = data[0].Precio;
          $("#product_input").val(producto);
          $("#price_input").val(precio);
        }
      },
      error: function() {
        console.error('Error en la solicitud AJAX');
      }
    });
  });
  $("#code_input").on("keydown", function(event) {
    const resultsCount = $("#search_results").children("div").length;
    const keyCode = event.keyCode;

    if (keyCode === 40) { // Flecha hacia abajo
      selectedIndex = (selectedIndex + 1) % resultsCount;
      updateSelectedResult();
    } else if (keyCode === 38) { // Flecha hacia arriba
      selectedIndex = (selectedIndex - 1 + resultsCount) % resultsCount;
      updateSelectedResult();
    } else if (keyCode === 13) { // Tecla Enter
      const selectedCode = $("#search_results").children("div").eq(selectedIndex).text().trim();
      event.preventDefault();
      $("#code_input").val(selectedCode);
      $("#search_results").empty();
      const inputCantidad = document.getElementById('cantidad_input');
      inputCantidad.focus();
    }
  });

  function updateSelectedResult() {
    $("#search_results").children("div").removeClass("selected");
    $("#search_results").children("div").eq(selectedIndex).addClass("selected");

    const Code = $("#search_results").children("div").eq(selectedIndex).text().trim();

    $.ajax({
      url: `http://localhost:3000/php/busqueda_codigo.php?code=${Code}`,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data && data.length > 0) {
          const producto = data[0].Producto;
          const precio = data[0].Precio;
          $("#product_input").val(producto);
          $("#price_input").val(precio);
        }
      },
      error: function() {
        console.error('Error en la solicitud AJAX');
      }
    });
  }

  $(document).on("click", function(event) {
    if (!$(event.target).closest("#search_results").length) {
      $("#search_results").empty();
      selectedIndex = -1;
    }
  });

  function guardarDatosEnAlmacenamientoLocal() {
    const filas = $(".campo1").html();
    localStorage.setItem("datosTabla", filas);
  }

  $("input[type='submit']").on("click", function(event) {
    event.preventDefault();

    const codigo = $("#code_input").val().trim();
    const producto = $("#product_input").val();
    const precio = parseFloat($("#price_input").val());
    const cantidad = parseInt($("#cantidad_input").val());

    if (codigo !== "" && producto !== "" && !isNaN(precio) && !isNaN(cantidad)) {
      const subtotal = precio * cantidad;
      const fila0 = `
        <tr class="tittle">
          <td>Código</td>
          <td>Producto</td>
          <td>Precio</td>
          <td>Cantidad</td>
          <td>Total</td>
        </tr>
      `;
      const fila1 = `
        <tr class="tabla-fila">
          <td>${codigo}</td>
          <td>${producto}</td>
          <td>$${precio}</td>
          <td>${cantidad}</td>
          <td>$${subtotal}</td>
        </tr>
      `;
      $(".campo1").append(fila0);
      $(".campo1").append(fila1);

      $("#code_input").val("");
      $("#product_input").val("");
      $("#price_input").val("");
      $("#cantidad_input").val("");
      $("#search_results").empty();
      selectedIndex = -1;

      const inputCode = document.getElementById('code_input');
      inputCode.focus();

      guardarDatosEnAlmacenamientoLocal();
      
      $("#total_input").val() = subtotal + subtotal;

    } else {
      alert("Por favor, ingrese todos los campos correctamente.");
    }
  });

  function cargarDatosDesdeAlmacenamientoLocal() {
    const datosGuardados = localStorage.getItem("datosTabla");
    if (datosGuardados) {
      $(".campo1").html(datosGuardados);
    }
  }

  cargarDatosDesdeAlmacenamientoLocal();

  function eliminarDatosDelAlmacenamientoLocal() {
    localStorage.removeItem("datosTabla");
  }

  $("#btnEliminar").on("click", function() {
    $(".campo1").empty();
    eliminarDatosDelAlmacenamientoLocal();
  });
});
