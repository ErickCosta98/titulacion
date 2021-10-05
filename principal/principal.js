function cargarPersona(bandera) {
    if (bandera == 1) {
        var valor = document.getElementById("txtValor").value;
    } else {
        var valor = "";
    }
    $('#content').load('../persona/index.php');
}

function cargarResponsable() {
    $('#content').load('../responsable/index.php');
}