$(document).on('ready', function(){
    //$("#")
    $("#codigo_input").on(input, function(){
        let consulta = $(this).val().trim();
        clearTimeout = temporizador
        if (consulta.length > 0) {
            temporizador = setTimeout(function() {
            $.ajax({
                url: `http://localhost:3000/php/buscar_codigo.php?consulta=${consulta}`,
                method: 'GET',
                dataType: 'json',
                success: function(resultados) {
                $("#resultados_busqueda").empty();
                resultados.forEach(function(resultado) {
                    const elementoResultado = $("<div>").text(resultado.Código);
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
})