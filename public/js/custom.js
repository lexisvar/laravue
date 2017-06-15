
// Guardar Cliente
$('#add_customer_btn').click(function () {

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
            toastr.success("Registro Éxitoso", "Solicitud éxitosa")
            $('#sample_1 tbody').empty();
            $.each(data.clientes, function(key, cliente) {
                $('#sample_1 tbody').append(`
                    <tr>
                        <td> `+cliente.nit+` </td>
                        <td> `+cliente.nombre+` </td>
                        <td> `+cliente.direccion+` </td>
                        <td> `+cliente.telefono+` </td>
                        <td> `+cliente.ciudad_nombre+` </td>
                        <td> `+cliente.cupo+` </td>
                        <td> `+cliente.saldo_cupo+` </td>
                        <td> `+cliente.porcentaje_visita+` </td>
                        <td> Editar </td>
                        <td> Eliminar </td>
                    </tr>
                `);
            });
            $('#add_customer').modal('hide');
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

//Eliminar Cliente
$('#btn_eliminar').click(function(){
    alert(this.attr('id_customer'));
    console.log('hello');
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