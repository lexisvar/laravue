<!-- BEGIN MODAL -->
<div id="myModal" class="modal fade" id="add_customer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">@{{ form_title }}</h4>
            </div>
            <div class="modal-body">

                <form name="frmCliente" class="form-horizontal" >
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nit</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-info-circle"></i>
                                    <input name="cliente_nit"  type="text" class="form-control" id="cliente_nit"  v-model="cliente.nit">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-user"></i>
                                    <input name="cliente_nombre" placeholder="Nombre" type="text"  class="form-control" v-model="cliente.nombre" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Dirección</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-location-arrow"></i>
                                    <input type="text" class="form-control " placeholder="Dirección"  name="direccion" v-model="cliente.direccion"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Teléfono</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-phone"></i>
                                    <input  type="text" class="form-control " placeholder="Teléfono" name="telefono" v-model="cliente.telefono"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">País</label>
                            <div class="col-md-8">
                                <v-select  :on-change="getDepartamentos" :value.sync="pais_nombre" label="nombre" :options="paises"></v-select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Región</label>
                            <div class="col-md-8">
                                <v-select   :on-change="getCiudades" :value.sync="departamento_nombre" label="nombre" :options="departamentos" v-model="cliente.departamento_nombre"></v-select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ciudad</label>
                            <div class="col-md-8">
                                <v-select  :value.sync="cliente.ciudad_nombre" label="nombre" :options="ciudades" v-model="cliente.ciudad_nombre"></v-select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cupo</label>
                            <div class="col-md-8">
                                    <money type="text" class="form-control " placeholder="Cupo"  name="cupo" v-model="cliente.cupo"></money>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Saldo Cupo</label>
                            <div class="col-md-8">
                                    <money type="text" class="form-control " placeholder="Saldo Cupo"  name="saldo_cupo" v-model="cliente.saldo_cupo"></money>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Porcentaje Visita</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <input  type="text" class="form-control " placeholder="Porcentaje Visita"  name="porcentaje_visita" v-model="cliente.porcentaje_visita"></div>
                            </div>
                            {!! csrf_field() !!}
                        </div>


                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button id="add_customer_btn" class="btn btn-circle green" v-on:click="save(modalestado,cliente.cliente_id)" >Guardar</button>
                <button type="button" class="btn btn-circle grey-salsa btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->