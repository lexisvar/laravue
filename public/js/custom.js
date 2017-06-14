
// Guardar Cliente
$('#add_customer_btn').click(function () {

    var formData = {
        nit: $("input[name$='nit']").val(),
        nombre: $("input[name$='nombre']").val(),
        direccion: $("input[name$='direccion']").val(),
        telefono: $("input[name$='telefono']").val(),
        ciudad: $("input[name$='ciudad']").val(),
        cupo: $("input[name$='cupo']").val(),
        saldo_cupo: $("input[name$='saldo_cupo']").val(),
        porcentaje_visita: $("input[name$='porcentaje_visita']").val(),
        _token: $("input[name$='_token']").val(),
    }

    $.ajax({

        type: 'post',
        url: 'clientes',
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Traer ciudades
$('#pais').on('change',function(){
    pais_id = this.value;
    console.log(pais_id);
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
            $.each(result, function(key, state) {

                $('#departamento').append($("<option></option>").attr("value",state.id).text(state.name));
            });
        },
        error: 'error',
    });
});