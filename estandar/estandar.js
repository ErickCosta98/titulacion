function AgregarEstandar() {
    Swal.mixin({
        input: 'text',
        confirmButtonText: 'Siguiente &rarr;',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        progressSteps: ['1']
    }).queue([{
        title: 'Estandar',
        text: 'Ingresa Estandar',
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
                        url: "../estandar/rut_estandar.php",
                        data: "datos=" + answers,
                        success: function(r) {
                            if (r == "true") {
                                Swal.fire('Registro Guardado!', 'Tu Registro Fue Guardado', 'success');
                                cargarEstandar(0);
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
function Editar(idEstandar) {
   $('#content').load('../estandar/form_estandar.php?idEstandar=' + idEstandar);
}
$(document).ready(function() {
    $('#btnAceptar').click(function() {
        var datos = $('#frmEstandar').serialize();
        var idinstitucion = document.getElementById("txtId").value;
        var folio = document.getElementById("TxtEstandar").value;
        var txtCarrera = 0;
        if (validar(folio)) {
                    
                        $.ajax({
                            type: "POST",
                            url: "../estandar/rut_estandar.php",
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
                                    cargarEstandar(0);

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
function Eliminar(idEstandar) {
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
            $.get("../estandar/rut_estandar.php", {
                    idEstandar: idEstandar
                }, 
                function(r) {
                    if (r == "true") {
                        swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'Tu registro ha sido Eliminado.',
                        'Listo!'
                    );
                        cargarEstandar(0);
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