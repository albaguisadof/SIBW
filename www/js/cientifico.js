//Obetenemos los elementos necesarios
const enviar = document.getElementById("enviar");
const boton = document.getElementById("bcomentario"); 
const comentario = document.getElementById("textoComentario"); 
const seccionComentarios = document.getElementById("listaComentarios")
const panel = document.getElementById("panelComentarios");

//Realizamos la función de mostrar el panel de comentarios
boton.addEventListener('click', () => {
    panel.style.display = panel.style.display == 'block' ? 'none' : 'block';
    //Cambiamos el texto del botón de comentarios
    boton.innerHTML = boton.innerHTML == 'Comentarios  ▽' ? 'Comentarios  △' : 'Comentarios  ▽';
});

//Accedemos a la lista de palabras prohibidas
var palabrasProhibidas = JSON.parse(panel.dataset.palabras);

//Detección de palabras prohibidas
comentario.addEventListener('input', () => {
    palabrasProhibidas.forEach((palabra) =>{
        //Utilizamos 'gi' para buscar una palabra ignorando mayúsculas y minúsculas
        const expresionRegular = new RegExp(palabra, 'gi');
        comentario.value = comentario.value.replace(expresionRegular, '*'.repeat(palabra.length));
    });
});



