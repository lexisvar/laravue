
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Clientes from './components/Clientes.vue';
import vSelect from 'vue-select'
import money from 'v-money'
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask, {value:true})

Vue.use(money, {precision: 2,decimal:",",thousands:".",prefix : "$"})


var app = new Vue({
    el: '#app_vue',
    data(){

        return {
            form_title : '',
            cliente : {},
            modalestado : '',
            cliente_id : '',
            paises : [],
            pais_nombre:'',
            departamentos : [],
            departamento_nombre:'',
            ciudades : [],
            ciudad_nombre:'',
            departamento_id:'',
            ciudad_id : '',
            selected: null
        }
    },
    components: {
        'clientes' : Clientes,
        'v-select' : vSelect
    },
    methods : {
        toggle : function (modalestado, cliente_id) {
            this.modalestado = modalestado;
            this.cliente_id = cliente_id;
            switch (modalestado){
                case 'add' :
                    this.form_title = "Agregar cliente";
                    this.cliente = {};
                    this.pais_nombre = '';
                    this.departamentos = [];
                    this.ciudades = [];
                    break;
                case 'edit' :
                    this.form_title = "Detalle del Cliente";
                    this.cliente_id = cliente_id;
                    this.cliente = {};
                    axios.get('/cliente/'+cliente_id ).then(response => {

                        this.cliente = response.data;
                        var clientes = app.$refs.profile;
                        this.paises = clientes.paises;
                        this.ciudad_nombre = this.cliente.ciudad_nombre;
                        this.pais_nombre = this.cliente.pais_nombre;
                        this.departamento_nombre = this.cliente.departamento_nombre;
                        this.departamento_id = this.cliente.departamento_id;
                        this.getCiudades(this.departamento_id);
                        this.getDepartamentos(this.cliente.pais_id);

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
            if(typeof(this.cliente.ciudad_nombre)=='object'){

                this.cliente.ciudad_id = this.cliente.ciudad_nombre.ciudad_id;
                this.cliente.ciudad_departamento_id = this.cliente.ciudad_nombre.departamento_id;
                this.cliente.ciudad_nombre.ciudad_nombre = this.cliente.ciudad_nombre.ciudad_nombre;
            }

            console.log(this.cliente);
            axios.post(url, this.cliente ).then(response => {
                toastr.success(response.data.message, "Solicitud éxitosa");
                var clientes = app.$refs.profile;
                clientes.fetchClientes();
                this.cliente = {};
                $('#myModal').modal('hide');
            })
            .catch(function (error) {
                var errors = error.response.data;
                var error_messages = '';

                $.each(errors,function (key, value) {
                   error_messages += value + '<br><br>';
                });

                toastr.error(error_messages, "Solicitud no éxitosa");
            });
        },
        getDepartamentos : function (pais) {

            var pais_id = '';
            if(typeof(pais)=='object'){
                pais_id = pais.pais_id;
                this.ciudades = [];
                this.ciudad_nombre='';
            }else{
                pais_id = pais;
            }
            axios.get('/departamentos/' + pais_id).then(response => {

               this.departamentos = response.data;

            }, response => {

            });
        },
        getCiudades : function (departamento) {
            console.log(departamento);
            var departamento_id = '';
            if(typeof(departamento)=='object'){
                departamento_id = departamento.departamento_id;
                this.ciudades = [];
                this.ciudad_nombre='';
            }else{
                departamento_id = departamento;
            }

            if(departamento_id){
                axios.get('/ciudades/' + departamento_id).then(response => {
                    this.ciudades = response.data;

                }, response => {

                });
            }

        },
    }
});