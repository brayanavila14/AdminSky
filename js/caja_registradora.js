$(document).ready(function() {
  // Seleccionar el elemento con el id "code_input" y registrar el evento "input"
  $("#code_input").on('input', function() {
    const query = $(this).val().trim(); // Obtener el valor del input y eliminar espacios en blanco al inicio y al final

    if (query.length >= 1) {
      // Realizar la solicitud AJAX al servidor utilizando el método $.ajax() de jQuery
      $.ajax({
        url: `http://localhost:3000/php/busqueda_codigo.php?query=${query}`, // URL del servidor
        method: 'GET', // Método de la solicitud
        dataType: 'json', // Tipo de datos esperado en la respuesta (JSON en este caso)
        success: function(results) { // Función a ejecutar cuando la solicitud sea exitosa
          // Limpiamos los resultados anteriores
          $("#search_results").empty();

          // Mostramos los resultados
          results.forEach(function(result) {
            const resultItem = $("<div>").text(result.Código);
            $("#search_results").append(resultItem);
          });
        },
        error: function() { // Función a ejecutar en caso de error
          console.error('Error en la solicitud AJAX');
        }
      });
    } else {
      // Si el código ingresado es menor a 1 caracteres o está vacío, limpiamos los resultados
      $("#search_results").empty();
    }
  });
});

