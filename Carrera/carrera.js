function Editar(idCarrera) {
    $('#content').load('../Carrera/form_carrera.php?idCarrera=' + idCarrera);
}

function AgregarNuevo() {
    $('#content').load('../carrera/form_carrera.php?');
}

$(document).ready(function() {
    $('#btnAgregar').click(function() {
        var datos = $('#frmCarrera').serialize();
        var idCarrera = document.getElementById("txtIdCarrera").value;
        var cvcarrera= document.getElementById("txtcvcarrera").value;
        var nombre = document.getElementById("txtnombre").value;
        var fechaInicio = document.getElementById("txtfechaInicio").value;
        var fechaTermino = document.getElementById("txtfechaTermino").value;
        var idAutorizacion = document.getElementById("txtidAutorizacion").value;
        var autorizacion = document.getElementById("txtAutorizacion").value;
        var numerorvoe = document.getElementById("txtnumerorvoe").value;
        if (validar(cvcarrera)) {
            if (validar(nombre)) {
                if (validar(fechaInicio)) {
                    if (validar(fechaTermino)) {
                    	 if (validar(idAutorizacion)) {
                    	 	if (validar(autorizacion)) {
                    	 		if (validar(numerorvoe)) {
                        $.ajax({
                            type: "POST",
                            url: "../carrera/rut_carrera.php",
                            data: datos,
                            success: function(r) {

                                if (r == "true") {
                                    Swal.fire({
                                        position: 'top-center',
                                        icon: 'success',
                                        title: 'Datos Guardados Correctamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    if (idCarrera == 0) {
                                        cargarCarrera('0');
                                    } else {
                                        cargarCarrera('0');
                                    }
                                    aler(idCarrera)
                                } else {
                                	alert(r)
                                    Swal.fire({
                                        position: 'top-center',
                                        icon: 'error',
                                        title: 'Error intente de Nuevo',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                }
                            }
                        });
                        return false;

                    } else {
                        //campo Direccion
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'CAMPO NUMERO DE RVOE VACIO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                } else {
                    //campo ApelMat
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'CAMPO AUTORIZACION VACIO',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            } else {
                //campo ApelPat
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'CAMPO ID AUTORIZACION VACIO',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        } else {
            //termina la validación
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'CAMPO FECHA TERMINO VACIO',
                showConfirmButton: false,
                timer: 1500
            });
        }
     } else {
                //campo ApelPat
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'CAMPO FECHA INICIO VACIO',
                    showConfirmButton: false,
                    timer: 1500
                });
            }  
             } else {
                //campo ApelPat
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'CAMPO NOMBRE VACIO',
                    showConfirmButton: false,
                    timer: 1500
                });
            } 
             } else {
                //campo ApelPat
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'CAMPO CLAVE CARRERA VACIO',
                    showConfirmButton: false,
                    timer: 1500
                });
            } 

    });
});

function validar(valor) {
    if (valor.length != 0) {
        return true;
    } else {
        return false;
    }
}

function Eliminar(idCarrera) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: '¿Seguro que deseas ELIMINAR este registro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si borrarlo! ',
        cancelButtonText: 'No, Cacelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.get("../Carrera/rut_carrera.php", {
                    idCarrera: idCarrera
                }, 
                function(r) {
                    if (r == "true") {
                        swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'Tu registro ha sido Eliminado.',
                        'Listo!'
                    );
                        cargarCarrera('0');
                    }else{
                        alert(r)
                         Swal.fire({
                                        position: 'top-center',
                                        icon: 'error',
                                        title: 'Error intente más tarde',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                    }
                    
                });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'Tu registro no fue Eliminado :)',
                'Error'
            );
        }
    });
}


