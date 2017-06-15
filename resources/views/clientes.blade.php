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
    <div class="page-content">

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
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green sbold" data-toggle="modal" href="#add_customer"> Agregar Cliente
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </di>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
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
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td> {{$cliente->nit}} </td>
                                    <td> {{$cliente->nombre}} </td>
                                    <td> {{$cliente->direccion}} </td>
                                    <td> {{$cliente->telefono}} </td>
                                    <td> {{$cliente->ciudad_nombre}} </td>
                                    <td> {{$cliente->cupo}} </td>
                                    <td> {{$cliente->saldo_cupo}} </td>
                                    <td> {{$cliente->porcentaje_visita}} </td>
                                    <td> <a href="javascript:void(0)" id="btn_editar" id_customer="{{$cliente->cliente_id}}"><i class="fa fa-edit"></i></a> </td>
                                    <td> <a href="javascript:void(0)" id="btn_eliminar" id_customer="{{$cliente->cliente_id}}"><i class="fa fa-trash"></i></a> </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

                <!-- BEGIN MODAL -->
                    <div class="modal fade" id="add_customer" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Agregar Cliente</h4>
                                </div>
                                <div class="modal-body">

                                    <form action="#" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nit</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-info-circle"></i>
                                                        <input type="text" class="form-control " placeholder="Nit" name="nit"></div>
                                                    <span class="help-block"> Información encriptada. </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nombre</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-user"></i>
                                                        <input type="text" class="form-control " placeholder="Nombre" name="nombre"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Dirección</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-location-arrow"></i>
                                                        <input type="text" class="form-control " placeholder="Dirección" name="direccion"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Teléfono</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-phone"></i>
                                                        <input type="text" class="form-control " placeholder="Teléfono" name="telefono"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">País</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="pais" id="pais">
                                                        @foreach($paises as $pais)
                                                            <option value="{{$pais->pais_id}}">{{$pais->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Región</label>
                                                <div class="col-md-8">
                                                    <select class="form-control " name="departamento" id="departamento">
                                                        <option>-- Departamento --</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ciudad</label>
                                                <div class="col-md-8">
                                                    <select class="form-control " name="ciudad" id="ciudad">
                                                        <option>-- Ciudad --</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cupo</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-dollar"></i>
                                                        <input type="text" class="form-control " placeholder="Cupo" name="cupo"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Saldo Cupo</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-money"></i>
                                                        <input type="text" class="form-control " placeholder="Saldo Cupo" name="saldo_cupo"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Porcentaje Visita</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-hourglass-start"></i>
                                                        <input type="text" class="form-control " placeholder="Porcentaje Visita" name="porcentaje_visita"></div>
                                                </div>
                                                {!! csrf_field() !!}
                                            </div>


                                        </div>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button id="add_customer_btn" type="submit" class="btn btn-circle green">Guardar</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


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

<script src="{{ asset('public/css/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/scripts/ui-modals.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/css/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/css/assets/global/scripts/form-input-mask.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('public/js/custom.js') }}" type="text/javascript" ></script>
<!-- END PAGE LEVEL PLUGINS -->