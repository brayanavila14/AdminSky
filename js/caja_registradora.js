let timer; // Variable para guardar el ID del temporizador

$("#code_input").on('input', function() {
  const query = $(this).val().trim(); // Obtener el valor del input y eliminar espacios en blanco al inicio y al final

  // Limpiar el temporizador existente para que no se ejecute si el usuario sigue escribiendo
  clearTimeout(timer);

  if (query.length >= 1) {
    // Realizar la solicitud AJAX al servidor utilizando el método $.ajax() de jQuery
    timer = setTimeout(function() {
      $.ajax({
        url: `http://localhost:3000/php/busqueda_codigo.php?query=${query}`, // URL del servidor
        method: 'GET', // Método de la solicitud
        dataType: 'json', // Tipo de datos esperado en la respuesta (JSON en este caso)
        success: function(results) { // Función a ejecutar cuando la solicitud sea exitosa
          // Limpiamos los resultados anteriores
          $("#search_results").empty();

          // Mostramos los resultados
          results.forEach(function(result) {

            // Creamos un nuevo elemento div
            const resultItem = $("<div>").text(result.Código);

            // Añadimos la clase "items" al nuevo div
            resultItem.addClass("items");

            // Agregamos el nuevo div al elemento con id "search_results"
            $("#search_results").append(resultItem);
          });
        },
        error: function() { // Función a ejecutar en caso de error
          console.error('Error en la solicitud AJAX');
        }
      });
    }, 300); // Tiempo de retraso en milisegundos antes de enviar la solicitud AJAX
  } else {
    // Si el código ingresado es menor a 1 caracteres o está vacío, limpiamos los resultados
    $("#search_results").empty();
  }
});

$(document).ready(function() {
  // Evento para capturar el clic en los elementos dentro de search-results
  $("#search_results").on("click", "div", function() {
    // Obtener el texto del código seleccionado
    const selectedCode = $(this).text().trim();

    // Establecer el texto del código en el input
    $("#code_input").val(selectedCode);

    // Vaciar el contenido de search-results
    $("#search_results").empty();
  });

  // Evento para ocultar search-results cuando se haga clic fuera de él
  $(document).on("click", function(event) {
    if (!$(event.target).closest("#search_results").length) {
      $("#search_results").empty();
    }
  });
});

$(document).ready(function() {
  let selectedIndex = -1; // Variable para rastrear el índice del elemento seleccionado en los resultados

  // Evento para capturar el clic en los elementos dentro de search-results
  $("#search_results").on("click", "div", function() {
    const selectedCode = $(this).text().trim();
    $("#code_input").val(selectedCode);
    $("#search_results").empty();
  });

  // Evento para manejar la navegación con las flechas del teclado
  $("#code_input").on("keydown", function(event) {
    const resultsCount = $("#search_results").children("div").length; // Cantidad de elementos en los resultados
    const keyCode = event.keyCode;
    
    if (keyCode === 40) { // Flecha hacia abajo
      selectedIndex = (selectedIndex + 1) % resultsCount; // Incrementar el índice seleccionado
      updateSelectedResult();
    } else if (keyCode === 38) { // Flecha hacia arriba
      selectedIndex = (selectedIndex - 1 + resultsCount) % resultsCount; // Decrementar el índice seleccionado
      updateSelectedResult();
    } else if (keyCode === 13) { // Tecla Enter
      // Obtener el texto del código seleccionado
      const selectedCode = $("#search_results").children("div").eq(selectedIndex).text().trim();
      event.preventDefault();
      $("#code_input").val(selectedCode);
      $("#search_results").empty();

      const inputCantidad = document.getElementById('cantidad_input')
      inputCantidad.focus();
    }
  });

  // Función para actualizar la clase "selected" en el elemento seleccionado
  function updateSelectedResult() {
    $("#search_results").children("div").removeClass("selected");
    $("#search_results").children("div").eq(selectedIndex).addClass("selected");
  }

  // Evento para ocultar search_results cuando se haga clic fuera de él
  $(document).on("click", function(event) {
    if (!$(event.target).closest("#search_results").length) {
      $("#search_results").empty();
      selectedIndex = -1; // Reiniciar el índice seleccionado
    }
  });
});


