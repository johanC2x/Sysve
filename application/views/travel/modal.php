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
            <div class="col-md-12">
              <div class="form-group">
                <label for="person_id">Nro. Documento:</label>
                <input type="text" id="person_id" name="person_id" class="form-control" maxlength="8" />
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

            <div class="col-md-6">
              <div class="form-group">
                <label for="passport">Pasaporte:</label>
                <input type="text" id="passport" name="passport" class="form-control"/>
                <input type="hidden" id="data_customer" name="data_customer"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="date_expire">Fecha de Expiración:</label>
                <input type="date" id="date_expire" name="date_expire" class="form-control"/>
              </div>
            </div>

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
<div id="modal_travel" class="modal fade" role="dialog">
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
          <fieldset>
            <legend>Registrar Comisiones</legend>
            <div class="row">
              <div class="col-md-12">
                <?php if(sizeof($property) > 0){ ?>
                <?php foreach ($property as $key => $value) {?>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label><?=$value["name"];?></label>
                      <input type="number" id="input_property_<?=$value["id"];?>" name="input_property_<?=$value["id"];?>" class="form-control" value="0"/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>FEE</label>
                      <input type="number" id="fee_property_<?=$value["id"];?>" name="fee_property_<?=$value["id"];?>" class="form-control" value="0"/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Operador</label>
                      <select id="cbo_property_<?=$value["id"];?>" name="cbo_property_<?=$value["id"];?>" class="form-control">
                        <option>Seleccionar</option>
                        
                      </select>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
              </div>
            </div>
          </fieldset>
          <button type="submit" class="btn btn-primary" >Guardar</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>