(function(){
    var formulario = document.getElementsByName('formulario')[0],
    elementos=formulario.elements,
    boton=document.getElementById('btn');

    var validarID = function(e){
        if(formulario.id.value == 0){
            alert("Introduce tu ID");
            e.preventDefault();
        }
    };

    var validarPassword = function(e){
        if(formulario.password.value == 0){
            alert("Introduce tu password");
            e.preventDefault();
        }
    };

    var validar = function(e){
        validarID(e);
        validarPassword(e);
    }

    formulario.addEventListener("submit", validar);
}())