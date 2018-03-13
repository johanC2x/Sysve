<div id="modal_customer" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRAR CLIENTE</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('customers/save',array('id'=>'form_customer_register')); ?>
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tipo_documento">Tipo de Documento:</label>
                  <select id="tipo_documento" name="tipo_documento" class="form-control">
                    <option>Seleccionar</option>
                    <option value="DNI">DNI</option>
                    <option value="CE">CE</option>
                    <option value="Pasaporte">Pasaporte</option>
                  </select>
                </div> 
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="person_id">Nro. Documento:</label>
                  <input type="text" id="person_id" name="person_id" class="form-control" maxlength="8" />
                </div> 
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="date_expire">Fecha de Expiración:</label>
                  <input type="date" id="date_expire" name="date_expire" class="form-control"/>
                </div>
              </div>  
            
            <div class="col-md-12">
              <div class="form-group">
                <label for="first_name">Nombres:</label>
                <input type="text" id="first_name" name="first_name" class="form-control"/>
              </div>    
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="last_name">Apellidos:</label>
                <input type="text" id="last_name" name="last_name" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Teléfono:</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control"/>
              </div>
            </div>

           <!--  <div class="col-md-6">
              <div class="form-group">
                <label for="passport">Pasaporte:</label>
                <input type="text" id="passport" name="passport" class="form-control"/>
                <input type="hidden" id="data_customer" name="data_customer"/>
              </div>
            </div> -->

            <div class="col-md-12">
              <label for="address_1">Dirección:</label>
              <textarea id="address_1" name="address_1" class="form-control">
              </textarea>
            </div>
            <div id="messages" class="col-md-12" style="display: none;" ></div>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE REGISTRO DE VIAJES -->
<div id="modal_travel" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRAR VIAJE</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('travel/registerTravel',array('id'=>'form_travel_register'));?>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ruc:</label>
                    <input type="datetime-local" id="ruc_travel" name="ruc_travel" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Razón Social:</label>
                    <input type="datetime-local" id="razon_social_travel" name="razon_social_travel" class="form-control"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Dirección Fiscal:</label>
                    <input type="datetime-local" id="direccion_fiscal_travel" name="direccion_fiscal_travel" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Aerolínea:</label>
                    <input type="datetime-local" id="aerolinea_travel" name="direccion_fiscal_travel" class="form-control"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Código:</label>
                    <input type="text" name="code_travel" id="code_travel" class="form-control" />
                    <input type="hidden" id="customer_id" name="customer_id" value="2" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Vuelo:</label>
                    <input type="text" name="name_travel" id="name_travel" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Desde:</label>
                    <input type="text" name="destiny_origin_travel" id="destiny_origin_travel" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Hasta:</label>
                    <input type="text" name="destiny_end_travel" id="destiny_end_travel" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Salida:</label>
                    <input type="datetime-local" id="date_init_travel" name="date_init_travel" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Llegada:</label>
                    <input type="datetime-local" id="date_end_travel" name="date_end_travel" class="form-control"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Ventana</label>
                      <input type="text" id="window_travel_detail" name="window_travel_detail" placeholder="" class="form-control">
                  </div>     
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pasillo</label>
                        <input type="text" id="pas_travel_detail" name="pas_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Millaje</label>
                        <input type="text" id="mill_travel_detail" name="mill_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Visa</label>
                        <input type="text" id="visa_travel_detail" name="visa_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Vacuna</label>
                        <input type="text" id="vacuna_travel_detail" name="vacuna_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
              </div>
            </div>
          <button type="submit" class="btn btn-primary" >Guardar</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>