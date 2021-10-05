
function AgregarEntidadFed() {
    Swal.mixin({
        input: 'text',
        confirmButtonText: 'Siguiente &rarr;',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        progressSteps: ['1']
    }).queue([{
        title: 'Entidad',
        text: 'Ingresa la entidad',
    }]).then((result) => {
        if (result.value !="") {
            const answers = JSON.stringify(result.value)
            Swal.fire({
                title: 'Listo!',
                html: `
        Favor de Verificar los Datos:
        <pre><code>${answers}</code></pre>
      `,
                confirmButtonText: 'Registrar!',
                showCancelButton: true
            }).then((result => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../entidadFederativa/rut_entidad.php",
                        data: "datos=" + answers,
                        success: function(r) {
                            if (r == "true") {
                                Swal.fire('Registro Guardado!', 'Tu Registro Fue Guardado', 'success');
                                cargarEntidadFed(0);
                            } else {
                                alert(r);
                                Swal.fire('Cacelado!', 'Ocurrio un error.', 'error');
                            }
                        }
                    });
                } else {
                    Swal.fire('Cacelado!', 'Tu registro se Cancelo.', 'error');
                }
            }));
            alert(answers);
        }else{
          Swal.fire('eroor!', 'Campo vacio.', 'error');  
        }
    })
}
function Editar(idEntidad) {
   $('#content').load('../entidadFederativa/form_entidad.php?idEntidad=' + idEntidad);
}
$(document).ready(function() {
    $('#btnAceptar').click(function() {
        var datos = $('#frmEntidad').serialize();
        var idinstitucion = document.getElementById("txtId").value;
        var entidad = document.getElementById("TxtEntidad").value;
        var txtCarrera = 0;
        if (validar(entidad)) {
                    
                        $.ajax({
                            type: "POST",
                            url: "../entidadFederativa/rut_entidad.php",
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
                                    cargarEntidadFed(0);

                                }else{

                                     alert(r)     
                                    
                                    Swal.fire({
                                        position: 'top-center',
                                        icon: 'error',
                                        title: 'Hubo un Error',
                                        showConfirmButton: false,
                                        timer: 2000
                                    }); 
                                }
                                            
                            }
                        });
                        return false;
        } else {
            //termina la validación
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'CAMPO Entidad VACIO',
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
function Eliminar(idEntidad) {
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
            $.get("../entidadFederativa/rut_entidad.php", {
                    idEntidad: idEntidad
                }, 
                function(r) {
                    if (r == "true") {
                        swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'Tu registro ha sido Eliminado.',
                        'Listo!'
                    );
                        cargarEntidadFed(0);
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
