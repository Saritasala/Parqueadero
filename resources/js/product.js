const { default: Swal } = require("sweetalert2");
$(document).ready(function () {
    $('.btnEraseProduct').on('click', function (e) {
        console.log('Hola soy yo Sarita, entra por favor');
        e.preventDefault()
        let id = $(this).parents('tr').attr('id');
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Este producto será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "/productos/eliminar/" + id,
                    dataType: "json",
                    beforeSend: function () {
                        Swal.fire({
                            title: 'Cargando...',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            onOpen: () => {
                                Swal.showLoading();
                            }
                        })
                    },
                    success: function (response) {

                        Swal.close()
                        Swal.fire(
                            'Eliminado',
                            'El producto ha sido borrado satisfactoriamente',
                            'success'
                        ).then(() => {
                            window.location.reload()
                        })
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'Error',
                            'Hemos tenido problemas, intente mas tarde',
                            'error'
                        )
                    }
                });
            }
        })
    })
})