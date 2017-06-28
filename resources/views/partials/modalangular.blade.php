<!-- BEGIN MODAL -->
<div id="myModal" class="modal fade" id="add_customer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">@{{form_title}}</h4>
            </div>
            <div class="modal-body">

                <form name="frmCliente" class="form-horizontal" novalidate="">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nit</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-info-circle"></i>
                                    <input mask="999.999.999-9" clean="true" name="cliente_nit" ng-model="cliente.nit" type="text" class="form-control" id="cliente_nit" value="@{{cliente.nit}}" ng-model="cliente.cliente_nit" ng-required="true" >

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-user"></i>
                                    <input name="cliente_nombre" placeholder="Nombre" type="text" ng-model="cliente.nombre" class="form-control" id="cliente_nombre" value="@{{cliente.nombre}}" ng-model="cliente.cliente_nombre" ng-required="true" >
                                    <span ng-show="frmCliente.cliente_nombre.$invalid && frmCliente.cliente_nombre.$touched">El campo Nombre es requerido</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Dirección</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-location-arrow"></i>
                                    <input type="text" class="form-control " placeholder="Dirección" ng-model="cliente.direccion" name="direccion"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Teléfono</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-phone"></i>
                                    <input mask="+(999) 999-99" clean="true" type="text" class="form-control " placeholder="Teléfono" ng-model="cliente.telefono" name="telefono"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">País</label>
                            <div class="col-md-8">
                                <select class="form-control" name="pais" id="pais" ng-model="cliente.pais" ng-change="getStates();">
                                    <option value="" selected> -- País --</option>
                                    <option ng-if="cliente.pais_nombre" value="" selected>@{{ cliente.pais_nombre }}</option>
                                    <option ng-repeat=" pais in clientes.paises" value="@{{pais.pais_id}}">@{{pais.nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Región</label>
                            <div class="col-md-8">
                                <select class="form-control" name="departamento" id="departamento" ng-model="cliente.departamento" ng-change="getCities();">
                                    <option value="" selected>-- Departamento --</option>
                                    <option ng-if="cliente.departamento_nombre" value="" selected>@{{ cliente.departamento_nombre }}</option>
                                    <option ng-repeat=" departamento in departamentos" ng-value="@{{departamento.departamento_id}}">@{{departamento.nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ciudad</label>
                            <div class="col-md-8">
                                <select class="form-control" name="ciudad_id" id="ciudad" ng-model="cliente.ciudad_id">
                                    <option value="" selected> -- Ciudad -- </option>
                                    <option ng-if="cliente.ciudad_nombre" value="" selected>@{{ cliente.ciudad_nombre }}</option>
                                    <option ng-repeat=" ciudad in ciudades" ng-value="@{{ciudad.ciudad_id}}">@{{ciudad.nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cupo</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-dollar"></i>
                                    <input type="text" class="form-control " placeholder="Cupo" ng-model="cliente.cupo" name="cupo"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Saldo Cupo</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-money"></i>
                                    <input type="text" class="form-control " placeholder="Saldo Cupo" ng-model="cliente.saldo_cupo" name="saldo_cupo"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Porcentaje Visita</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-hourglass-start"></i>
                                    <input mask="999"  type="text" class="form-control " placeholder="Porcentaje Visita" ng-model="cliente.porcentaje_visita" name="porcentaje_visita"></div>
                            </div>
                            {!! csrf_field() !!}
                        </div>


                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button id="add_customer_btn" ng-click="save(modalestado,cliente_id)" class="btn btn-circle green">Guardar</button>
                <button type="button" class="btn btn-circle grey-salsa btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->