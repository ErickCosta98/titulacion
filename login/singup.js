




function registro(){
    var name = $('#nombre').val()
    var usuario = $('#usuario').val()
    var pass = $('#password').val()
    if( name.length == 0){
        $('#errorName').text('El campo nombre esta vacio')
        return 0;
    }
    if( usuario.length == 0){
        $('#errorUser').text('El campo usuario esta vacio')
        return 0;
    }
    if( pass.length == 0){
        $('#errorPass').text('El campo contraseña esta vacio')
        return 0;
    }

    var user = $('#formSingup').serialize()
    // alert(user)
    // console.log(nombre)
    $.ajax({
        url: "../login/rutSingup.php",
        type: "POST",
        data: user,
        success: function (datos) {
            // if (datos === true) {
            Swal.fire({
                icon: 'success',
                title: 'Listo...',
                text: 'Registro terminado!',
              })
              $("#formSingup").load(location.href + " #formSingup");
                // }
            // alert(datos)
        }
    });
}