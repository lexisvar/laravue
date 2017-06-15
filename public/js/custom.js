
// Guardar Cliente
$('#add_customer_btn').click(function () {
    $("#fakeloader").fakeLoader();

    var formData = {
        nit: $("input[name$='nit']").val(),
        nombre: $("input[name$='nombre']").val(),
        direccion: $("input[name$='direccion']").val(),
        telefono: $("input[name$='telefono']").val(),
        cupo: $("input[name$='cupo']").val(),
        saldo_cupo: $("input[name$='saldo_cupo']").val(),
        porcentaje_visita: $("input[name$='porcentaje_visita']").val(),
        ciudad_id: $("#ciudad").val(),
        _token: $("input[name$='_token']").val(),
    }

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $.ajax({

        type: 'post',
        url: 'clientes',
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            toastr.success("Registro Éxitoso", "Solicitud éxitosa")
        },
        error: function (data) {
            var errores = data.responseJSON;


            var mensajes_error = '';
            $.each(errores, function(key, error) {
                mensajes_error += "*" + error + "</br>";
            });

            toastr.error(mensajes_error, "Hubo un error")
        }
    });
});

//Traer departamentos
$('#pais').on('change',function(){
    pais_id = this.value;

    $.ajax({
        url: 'departamentos/'+pais_id,
        cache: false,
        dataType: 'json',
        success: function (result) {
            a=1;

            $('#departamento')
                .find('option')
                .remove()
                .end()
                .append('<option value="0" selected="selected">-- Departamento --</option>')
                .val('0');
            $('#city')
                .find('option')
                .remove()
                .end()
                .append('<option value="0" selected="selected">-- Ciudad --</option>')
                .val('0');
            $.each(result, function(key, departamento) {
                console.log(departamento);
                $('#departamento').append($("<option></option>").attr("value",departamento.departamento_id).text(departamento.nombre));
            });
        },
        error: 'error',
    });
});

//traer ciudades
$('#departamento').on('change',function(){

    departamento_id = this.value;

    $.ajax({
        url: "ciudades/"+departamento_id,
        cache: false,
        dataType: 'json',
        success: function (result) {
            $('#ciudad')
                .find('option')
                .remove()
                .end()
                .append('<option value="0" selected="selected">-- Ciudad --</option>')
                .val('0');
            $.each(result, function(key, ciudad) {

                $('#ciudad').append($("<option></option>").attr("value",ciudad.ciudad_id).text(ciudad.nombre));
            });
        },
        error: 'error',
    });
});