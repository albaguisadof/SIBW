$(document).ready(function() {
    $("#textBuscar").on("keyup", function() {
        var textoBusqueda = $(this).val(); 
        var tipoUser = $('#tipoUser').val();
        hacerPeticionAjax(textoBusqueda, tipoUser);
    });
    
});

function hacerPeticionAjax(textoBusqueda, tipoUser) {
    $.ajax({
        data: {textBuscar: textoBusqueda, tipoUser: tipoUser},
        url:  '../buscador.php',
        type: 'post',
        dataType: 'json',
        success: function(respuesta) {
            procesaRespuestaAjax(respuesta.resultados, respuesta.hastags, tipoUser);
        }
        
    });
}

function procesaRespuestaAjax(respuesta, hastags, tipoUser) {
    var res = "";

    for (var i = 0; i < respuesta.length; i++) {
        if(tipoUser == "gestor" || tipoUser =="super"){
            res += "<a href=\"cientifico.php?scid=" + respuesta[i].id + "\">" + respuesta[i].nombre + "</a> ";
            if(hastags[i] != ""){
                res += "<p>#" + hastags[i] + "</p>";
            }else{
                res += "<p></p>"
            }
            
        }else{
            if(respuesta[i].publicado){
                res += "<a href=\"cientifico.php?scid=" + respuesta[i].id + "\">" + respuesta[i].nombre + "</a> ";
                if(hastags[i] != ""){
                    res += "<p>#" + hastags[i] + "</p>";
                }else{
                    res += "<p></p>"
                }
            }
        }
    }

    $("#busqueda").html(res);
}

