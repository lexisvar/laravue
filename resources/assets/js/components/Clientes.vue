<template lang="html">
    <table class="table table-striped table-bordered table-hover" id="sample_2">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nit </th>
                <th> Nombre </th>
                <th> Dirección </th>
                <th> Teléfono </th>
                <th> Ciudad </th>
                <th> Cupo </th>
                <th> Saldo Cupo </th>
                <th> Porcetaje Visita </th>
                <th> Editar </th>
                <th> Eliminar </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for=" cliente in clientes">
                <td> {{cliente.cliente_id}} </td>
                <td> {{cliente.nit}} </td>
                <td> {{cliente.nombre}} </td>
                <td> {{cliente.direccion}} </td>
                <td> {{cliente.telefono}} </td>
                <td> {{cliente.ciudad_nombre}} </td>
                <td> {{cliente.cupo}} </td>
                <td> {{cliente.saldo_cupo}} </td>
                <td> {{cliente.porcentaje_visita}} </td>

                <td> <a href="javascript:void(0)"  id="btn_editar" ><i class="fa fa-edit"></i></a> </td>
                <td> <a href="javascript:void(0)" id="btn_eliminar" v-on:click="confirmDelete(cliente.cliente_id)"><i class="fa fa-trash"></i></a> </td>
            </tr>
        </tbody>
    </table>
</template>

<script>

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


    export default {
        data(){
            return {
                clientes: {},

            }
        },
        created(){
            this.fetchClientes();
        },
        mounted(){

        },
        methods: {
            fetchClientes: function(){
                axios.get('/clientes').then(response => {
                    this.clientes = response.data.clientes;
                    console.log(this.clientes);
                }, response => {
                    // error callback
                });
            },
            confirmDelete : function (cliente_id) {
                var isConfirmDelete = confirm('¿Estás seguro que de sea eliminar este cliente?');
                if(isConfirmDelete){
                    axios.delete('/clientes/'+cliente_id ).then(response => {
                        toastr.success(response.data, "Solicitud éxitosa");
                        console.log(response);
                        this.fetchClientes();
                    }, response => {
                        // error callback
                    });
                }else{
                    return false;
                }
            },
        }
    }
</script>