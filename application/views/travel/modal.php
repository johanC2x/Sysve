<div id="modal_customer" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRO DE CLIENTES</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('customers/save',array('id'=>'form_customer_register')); ?>
          <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="person_id">Nro. Documento:</label>
                <input type="text" id="person_id" name="person_id" class="form-control" maxlength="8" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">Nombres:</label>
                <input type="text" id="first_name" name="first_name" class="form-control"/>
              </div>    
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellidos:</label>
                <input type="text" id="last_name" name="last_name" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="phone_number">Teléfono:</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="date_expire">Edad:</label>
                <input type="number" id="age" name="age" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="date_expire">Fecha de Nacimiento:</label>
                <input type="date" id="date_expire" name="date_expire" class="form-control"/>
              </div>
            </div>
            <div class="col-md-12">
              <label for="address_1">Dirección:</label>
              <input type="text" id="address_1" name="address_1" class="form-control"/>
            </div>
            <br/>
            <div class="col-md-12">
              <fieldset>
                <legend>Direcciones</legend>

                <!-- =========== FORM ADDRESS ============ -->
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="address_customer_travel">Dirección:</label>
                      <input type="text" id="address_customer_travel" name="address_customer_travel" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="district_customer_travel">Distrito:</label>
                      <input type="text" id="district_customer_travel" name="district_customer_travel" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="reference_customer_travel">Referencia:</label>
                      <input type="text" id="reference_customer_travel" name="reference_customer_travel" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button id="btn_add_customer_travel" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <!-- ===================================== -->

                <table id="table_customer_address" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Dirección</center></th>
                      <th class="col-md-4"><center>Distrito</center></th>
                      <th class="col-md-2"><center>Referencia</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <br/>
            <div class="col-md-12">
              <fieldset>
                <legend>Pasaportes</legend>

                <!-- =========== FORM ADDRESS ============ -->
                <div class="col-md-4">
                    <div class="form-group" >
                      <label for="passport_customer_country">País:</label>
                      <input type="text" id="passport_customer_country" name="passport_customer_country" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="passport_customer_nro">Nro. Pasaporte:</label>
                      <input type="text" id="passport_customer_nro" name="passport_customer_nro" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="passport_customer_date">Fecha de Vencimiento:</label>
                      <input type="text" id="passport_customer_date" name="passport_customer_date" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button id="btn_add_customer_passport" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <!-- ===================================== -->

                <table id="table_customer_passport" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Pais Origen</center></th>
                      <th class="col-md-4"><center>Nro de Pasaporte </center></th>
                      <th class="col-md-2"><center>Fecha Vencimiento</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <br/>
            <div class="col-md-12">
              <fieldset>
                <legend>Tarjetas</legend>

                <!-- =========== FORM ADDRESS ============ -->
                <div class="col-md-4">
                    <div class="form-group" >
                      <label for="card_customer_brand">Marca:</label>
                      <select id="card_customer_brand" class="form-control">
                        <option value>Seleccionar</option>
                        <option value="visa">Visa</option>
                        <option value="master_card">Master Card</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="card_customer_nro">Nro. de Tarjeta:</label>
                      <input type="text" id="card_customer_nro" name="card_customer_nro" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="card_customer_type">Tipo:</label>
                      <select id="card_customer_type" class="form-control">
                        <option value>Seleccionar</option>
                        <option value="debito">Débito</option>
                        <option value="credito">Crédito</option>
                      </select>
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button id="btn_add_customer_card" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <!-- ===================================== -->

                <table id="table_customer_card" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Tipo Tarjeta</center></th>
                      <th class="col-md-4"><center>Nro. de Tarjeta </center></th>
                      <th class="col-md-2"><center>Débito o Crédito</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <br/>
            <div class="col-md-12">
              <fieldset>
                <legend>Empresas</legend>

                <!-- =========== FORM ADDRESS ============ -->
                <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_ruc">Ruc:</label>
                      <input type="text" id="company_customer_ruc" name="company_customer_ruc" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_name">Razón Social:</label>
                      <input type="text" id="company_customer_name" name="company_customer_name" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_mail">Correo:</label>
                      <input type="text" id="company_customer_mail" name="company_customer_mail" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button id="btn_add_customer_company" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <!-- ===================================== -->

                <table id="table_customer_company" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Ruc</center></th>
                      <th class="col-md-4"><center>Razon Social</center></th>
                      <th class="col-md-2"><center>Correo</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <input type="hidden" id="data_customer" name="data_customer">
            <div id="messages" class="col-md-12"></div>
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
        <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>