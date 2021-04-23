const { default: Swal } = require("sweetalert2");
$(document).ready(function () {
    $('.btnEraseProduct').on('click', function (e) {
        console.log("INSIDE");
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
              //console.log(id);
              let token = document.querySelector('meta[name="token"]').getAttribute('content');
              let route = '/productos/eliminar/' + id;
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN' : token},
                    type: "delete",
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
    }),

    $('.btnEraseComercio').on('click', function (e) {
        console.log("INSIDE");
        e.preventDefault()
        let id = $(this).parents('tr').attr('id');
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Este comercio será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
              //console.log(id);
              let token = document.querySelector('meta[name="token"]').getAttribute('content');
              let route = '/comercio/eliminar/' + id;
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN' : token},
                    type: "delete",
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
                            'El comercio ha sido borrado satisfactoriamente',
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
    }),

    $('.btnEraseUser').on('click', function (e) {
        console.log("INSIDE");
        e.preventDefault()
        let id = $(this).parents('tr').attr('id');
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Este usuario será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
              //console.log(id);
              let token = document.querySelector('meta[name="token"]').getAttribute('content');
              let route = '/usuario/eliminar/' + id;
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN' : token},
                    type: "delete",
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
                            'El usuario ha sido borrado satisfactoriamente',
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
    }),

     $('.btnEraseOrdenes').on('click', function (e) {
        console.log("INSIDE");
        e.preventDefault()
        let id = $(this).parents('tr').attr('id');
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Esta orden será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
              //console.log(id);
              let token = document.querySelector('meta[name="token"]').getAttribute('content');
              let route = '/ordenes/eliminar/' + id;
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN' : token},
                    type: "delete",
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
                            'Esta orden ha sido borrado satisfactoriamente',
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