@include('partials.head')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('public/css/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('public/css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('public/css/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" >
<!-- END PAGE LEVEL PLUGINS -->

@include('partials.header')

@include('partials.sidebar')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" ng-app="AngularApp" ng-controller="ClienteController" >

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Clientes
            <small>lista de clientes</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">

                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Clientes</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body" id="app_vue">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        @if(Config::get('app.frameworkjs')=='angular')
                                            <button id="" class="btn green sbold" ng-click="toggle('add', 0 )" href="#add_customer"> Agregar Cliente
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        @elseif(Config::get('app.frameworkjs')=='vue')
                                            <button id="" class="btn green sbold" @click="toggle('add',0)" href="#add_customer"> Agregar Cliente
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        @else
                                            Por favor revise su archivo de configuración
                                        @endif
                                    </div>
                                </di>
                            </div>
                        </div>
                        @if(Config::get('app.frameworkjs')=='angular')
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
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
                                        <tr ng-repeat=" cliente in clientes.clientes">
                                            <td> @{{cliente.cliente_id}} </td>
                                            <td> @{{cliente.nit}} </td>
                                            <td> @{{cliente.nombre}} </td>
                                            <td> @{{cliente.direccion}} </td>
                                            <td> @{{cliente.telefono}} </td>
                                            <td> @{{cliente.ciudad_nombre}} </td>
                                            <td> @{{cliente.cupo}} </td>
                                            <td> @{{cliente.saldo_cupo}} </td>
                                            <td> @{{cliente.porcentaje_visita}} </td>

                                            <td> <a href="javascript:void(0)" ng-click="toggle('edit', cliente.cliente_id )" id="btn_editar" id_customer=""><i class="fa fa-edit"></i></a> </td>
                                            <td> <a href="javascript:void(0)" id="btn_eliminar" v-on:click="toggle"><i class="fa fa-trash"></i></a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                        @elseif(Config::get('app.frameworkjs')=='vue')
                            <Clientes ref="profile"></Clientes>
                            @include('partials.modalvue')
                        @else
                            Por favor revise su archivo de configuración
                        @endif
                        </div>
                 </div>
                <!-- END EXAMPLE TABLE PORTLET-->

                    @if(Config::get('app.frameworkjs')=='angular')
                        @include('partials.modalangular')
                    @endif

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
@include('partials.footer');
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('public/css/assets/global/scripts/datatable.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/css/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/css/assets/global/scripts/table-datatables-buttons.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/scripts/ui-toastr.min.js') }}" type="text/javascript" ></script>

<!-- PUBLIC / APP.JS -->
<script src="{{ asset('public/js/app.js') }}"></script>
<!-- END APP.JS -->
<script src="{{ asset('public/css/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/css/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/css/assets/global/scripts/ui-modals.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/css/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/scripts/form-input-mask.min.js') }}" type="text/javascript" ></script>

@if(!Config::get('app.frameworkjs')=='vue')
    <script src="{{ asset('public/js/custom.js') }}" type="text/javascript" ></script>
@endif

<!-- END PAGE LEVEL PLUGINS -->

