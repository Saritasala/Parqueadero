const { default: Swal } = require("sweetalert2");

$(document).ready(function () {

    $(".btnEditVehiculos").on("click", function (e) {
        e.preventDefault();
        var id = $(this).parents("tr").attr("id");
        $.ajax({
            type: "get",
            url: "/vehiculos/editar/" + id,
            dataType: "json",
            beforeSend: function beforeSend() {
                Swal.fire({
                    title: 'Cargando...',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    onOpen: function onOpen() {
                        Swal.showLoading();
                    }
                });
            },
            success: function success(response) {
                console.log(response);
                var data = response.data;
                console.log(data.id);
                $("#formUpdateVehiculos").attr("action", "/vehiculos/editar/" + data.id);
                $('.coupon_id').val(data.id);
                $('#commerce_id').val(data.commerce_id);
                // $("#commerce_id option[value=" + data.commerce_id + "]").attr("selected", true);
                $("#nameCupon").val(data.name);
                $("#minCCupon").val(data.min_shopping);
                $("#cantUso").val(data.max_quantity);
                $("#valC").val(data.value);
                $("#state option[value=" + data.state + "]").attr("selected", true);
                $("#modalEditCoupos").modal();
                Swal.close();
            }
        });
    });

});