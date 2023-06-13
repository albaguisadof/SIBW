$(document).ready(function() {
    var i = 1;
    $('#addImage').click(function() {
        i++;
        $('#extraImages').append('<div id="row'+i+'"><label for="galeria">Imagen '+i+':</label><input type="file" id="galeria" name="galeria[]"><button type="button" id="'+i+'" class="btn_remove">X</button></div>');
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
});