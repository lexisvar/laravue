
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var Inputmask = require('inputmask');

import Clientes from './components/Clientes.vue';



var app = new Vue({
    el: '#app_vue',
    data(){

        return {
            form_title : '',
            cliente : {},
            modalestado : '',
            cliente_id : '',
            paises : {},
            departamentos : {},
            ciudades : {}


        }
    },
    components: {
        'clientes' : Clientes,
    },
    methods : {
        toggle : function (modalestado, cliente_id) {
            this.modalestado = modalestado;
            this.cliente_id = cliente_id;
            switch (modalestado){
                case 'add' :
                    this.form_title = "Agregar cliente";
                    this.cliente = {};
                    break;
                case 'edit' :
                    this.form_title = "Detalle del Cliente";
                    this.cliente_id = cliente_id;
                    this.cliente = {};
                    axios.get('/cliente/'+cliente_id ).then(response => {

                        this.cliente = response.data;
                        this.getDepartamentos(this.cliente.pais_id);
                        this.getCiudades(this.cliente.departamento_id);
                    }, response => {
                        // error callback
                    });
                    break;
                default:
                    break;
            }
            $('#myModal').modal('show');
        },
        save : function (modalestado, cliente_id) {

            var url = '/' + 'cliente';
            if(modalestado === 'edit'){
                url += "/" +cliente_id;
            }
            axios.post(url, this.cliente ).then(response => {
                toastr.success(response.data.message, "Solicitud éxitosa");
                var clientes = app.$refs.profile;
                clientes.fetchClientes();
                this.cliente = {};
                $('#myModal').modal('hide');
            })
            .catch(function (error) {
                console.log(error.response);
                var errors = error.response.data;
                var error_messages = '';

                $.each(errors,function (key, value) {
                   error_messages += value + '<br><br>';
                });

                toastr.error(error_messages, "Solicitud no éxitosa");
            });
        },
        getDepartamentos : function (pais_id) {
            this.departamentos = {};
            axios.get('/departamentos/' + pais_id).then(response => {
               this.departamentos = response.data;

            }, response => {

            });
        },
        getCiudades : function (departamento_id) {

            this.ciudades={};
            axios.get('/ciudades/' + departamento_id).then(response => {
                this.ciudades = response.data;
            }, response => {

            });
        },
    }
});