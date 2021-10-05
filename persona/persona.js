function buscarP() {
    var valor = document.getElementById("txtValor").value;
    var valor2 = valor.replace(/ /g, "").trim();
    $('#tbl-persona').load('../persona/tbl_persona.php?valor=' + valor2);
}

function agregarP() {
    $('#content').load('../persona/form_persona.php?action=agregar');
}

function activarProfesionista() {
    if (document.getElementById('switch-label').checked) {
        $('#datProfesionista').load('../persona/form_profesionista.php');
    } else {
        $('#datForm').remove();
    }
}

function Insertar() {
    if (document.getElementById('switch-label').checked) {
        var datosProfesionista = $('#formProfesionista').serialize();
        var datosPersonales = $('#formDatPersonal').serialize();
        var com = datosProfesionista + '&' + datosPersonales;
        alert(com);
        $.ajax({
            url: '../persona/rut_persona.php',
            type: 'POST',
            data: com,
            success: function(r) {
                alert(r);
            }
        });
    } else {
        var datosPersonales = $('#formDatPersonal').serialize();
        $.ajax({
            url: '../persona/rut_persona.php',
            type: 'POST',
            data: datosPersonales,
            success: function(r) {
                alert(r);
            }
        });
    }
}