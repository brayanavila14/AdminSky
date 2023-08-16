$(document).on('ready', function(){
    //$("#")
    $("#codigo_input").on('input', function(){
        let code = $(this).val().trim();
        let temporizador;
        
        if (code.length > 0) {
            temporizador = setTimeout(function() {
            $.ajax({
                url: `http://localhost:3000/php/busquedas-CAJA-complemento.php?code=${code}`,
                method: 'GET',
                dataType: 'json',
                success: function(lista_codigos) {
                $("#resultado").empty();
                lista_codigos.forEach(function(lista_codigos) {
                    const elementoResultado = $("<div>").text(lista_codigos.Código);
                    elementoResultado.addClass("elemento_resultado");
                    $("#resultado").append(elementoResultado);
                });
                },
                error: function() {
                console.error('Error en la solicitud AJAX');
                }
            });
            }, 300);
        } else {
            $("#resultado").empty();
        }
    });
});