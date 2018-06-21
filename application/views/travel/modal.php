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
              <fieldset>
                <legend>Documentos</legend>
                <!-- =========== FORM ADDRESS ============ -->
                  <div class="form-group" >
                    <select id="type_customer_doc" class="form-control">
                      <option value>Seleccionar Tipo de Documento</option>
                      <option value="dni">Dni</option>
                      <option value="carnet_extranjeria">Carnet de Extranjeria</option>
                    </select>
                  </div>
                  <div class="form-group" >
                    <input type="text" id="nro_customer_doc" name="nro_customer_doc" class="form-control" placeholder="Nro. Documento">
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button id="btn_add_customer_doc" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <!-- ===================================== -->
                <table id="table_customer_doc" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Tipo Documento</center></th>
                      <th class="col-md-4"><center>Nro. de Documento </center></th>
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
            <div class="col-md-6" style="display:none;">
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

            <div class="col-md-6" style="display:none;">
              <div class="form-group">
                <label for="person_id">Nro. Documento:</label>
                <input type="text" id="person_id" name="person_id" class="form-control" maxlength="8" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" class="form-control"/>
              </div>    
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="midle_name">Pre-Nombre:</label>
                <input type="text" id="midle_name" name="midle_name" class="form-control"/>
              </div>    
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellidos Paterno:</label>
                <input type="text" id="last_name" name="last_name" class="form-control"/>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellidos Materno:</label>
                <input type="text" id="last_name_mothers" name="last_name_mothers" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellido de Casado:</label>
                <input type="text" id="last_name_casada" name="last_name_casada" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
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

            <!-- =========== FORM ADDRESS ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Pasaportes</legend>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_nro">Nro. Pasaporte:</label>
                    <input type="text" id="passport_customer_nro" name="passport_customer_nro" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_date">Fecha de Emisión:</label>
                    <input type="date" id="passport_customer_date" name="passport_customer_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_init_date">Fecha de Vencimiento:</label>
                    <input type="date" id="passport_customer_init_date" name="passport_customer_init_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_country">País de Emisión:</label>
                    <input type="text" id="passport_customer_country" name="passport_customer_country" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_nationality">Nacionalidad:</label>
                    <input type="text" id="passport_customer_nationality" name="passport_customer_nationality" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <br/>
                  <div class="form-group">
                    <button id="btn_add_customer_passport" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_customer_passport" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-4"><center>Nro de Pasaporte </center></th>
                      <th class="col-md-3"><center>Pais Origen</center></th>
                      <th class="col-md-2"><center>Fec. Emisión</center></th> 
                      <th class="col-md-2"><center>Fec. Vencimiento</center></th>
                      <th class="col-md-2"><center>Nacionalidad</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <!-- ===================================== -->

            <!-- =========== FORM VISADO ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Visado</legend>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_country">País de Visado:</label>
                    <select name="visado_customer_country" id="visado_customer_country" class="form-control">
                      <option value="americano">Americano</option>
                      <option value="peruano">Peruano</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_nro">Número:</label>
                    <input type="text" id="visado_customer_nro" name="visado_customer_nro" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_init_date">Fecha de Emisión:</label>
                    <input type="date" id="visado_customer_init_date" name="visado_customer_init_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_end_date">Fecha de Vencimiento:</label>
                    <input type="date" id="visado_customer_end_date" name="visado_customer_end_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <button id="btn_add_customer_visado" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_customer_visado" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-4"><center>País Visado</center></th>
                      <th class="col-md-3"><center>Número</center></th>
                      <th class="col-md-2"><center>Fec. Emisión</center></th> 
                      <th class="col-md-2"><center>Fec. Vencimiento</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="5">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
              </div>
            <!-- ===================================== -->

            <!-- =========== FORM TELEFONOS Y CORREOS ============ -->

            <div class="col-md-6">
              <fieldset>
                <legend>Teléfonos</legend>
                <div class="form-group">
                  <label for="type_customer_phone">Tipo de Contacto:</label>
                  <select name="type_customer_phone" id="type_customer_phone" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="celular_personal">Celular Personal</option>
                    <option value="celular_empresa">Celular Empresa</option>
                    <option value="otros">Otros</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="customer_phone">Telefono:</label>
                  <input type="text" id="customer_phone" name="customer_phone" class="form-control">
                </div>
                <button id="btn_add_customer_phones" type="button" class="btn btn-primary">Agregar</button>
                <br/>
                <table id="table_customer_phones" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-2"><center>T. Contacto</center></th>
                      <th class="col-md-4"><center>Teléfono</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <div class="col-md-6">
            <fieldset>
                <legend>Correos</legend>
                <div class="form-group">
                  <label for="type_customer_email">Tipo de Email:</label>
                  <select name="type_customer_email" id="type_customer_email" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="empresa">Empresa</option>
                    <option value="personal">Personal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="customer_email">Telefono:</label>
                  <input type="text" id="customer_email" name="customer_email" class="form-control">
                </div>
                <button id="btn_add_customer_emails" type="button" class="btn btn-primary">Agregar</button>
                <br/>
                <table id="table_customer_emails" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-2"><center>T. Email</center></th>
                      <th class="col-md-4"><center>Email</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <!-- ===================================== -->
            <!-- ===== FORM CLIENTES FRECUENTES ====== -->
            <div class="col-md-12">
              <fieldset>
                <legend>Pasajeros Frecuentes</legend>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="millaje_customer_frec">Millaje:</label>
                    <input type="text" id="millaje_customer_frec" name="millaje_customer_frec" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nro_customer_frec">Nro:</label>
                    <input type="text" id="nro_customer_frec" name="nro_customer_frec" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="user_customer_frec">Usuario:</label>
                    <input type="text" id="user_customer_frec" name="user_customer_frec" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="pass_customer_frec">Clave:</label>
                    <input type="password" id="pass_customer_frec" name="pass_customer_frec" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="end_customer_frec">Pin:</label>
                    <input type="text" id="end_customer_frec" name="end_customer_frec" class="form-control">
                  </div>
                </div>
                <button id="btn_add_customer_frec" type="button" class="btn btn-primary">Agregar</button>
                <br/>
                <table id="table_customer_frec" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-3"><center>Millaje</center></th>
                      <th class="col-md-3"><center>Nro</center></th>
                      <th class="col-md-3"><center>Usuario</center></th>
                      <th class="col-md-3"><center>Clave</center></th>
                      <th class="col-md-3"><center>Pin</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <!-- ===================================== -->
            <!-- =========== FORM ADDRESS ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Direcciones Propias y de Entrega</legend>
                <div class="col-md-4">
                  <label for="type_address_customer_travel">Tipo</label>
                  <select name="type_address_customer_travel" id="type_address_customer_travel" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="domicilio">Domicilio</option>
                    <option value="entrega">Entrega</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="address_customer_travel">Dirección:</label>
                    <input type="text" id="address_customer_travel" name="address_customer_travel" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="district_customer_travel">Distrito/Estado:</label>
                    <input type="text" id="district_customer_travel" name="district_customer_travel" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="country_customer_travel">País:</label>
                    <input type="text" id="country_customer_travel" name="country_customer_travel" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="phone_customer_travel">Teléfono:</label>
                    <input type="text" id="phone_customer_travel" name="phone_customer_travel" class="form-control">
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
                <table id="table_customer_address" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Tipo</center></th>
                      <th class="col-md-1"><center>Dirección</center></th>
                      <th class="col-md-4"><center>Distrito</center></th>
                      <th class="col-md-4"><center>País</center></th>
                      <th class="col-md-4"><center>Teléfono</center></th>
                      <th class="col-md-2"><center>Referencia</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="7">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <!-- ===================================== -->
            <!-- =========== FORM COMPANY ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Datos de Empresas</legend>
                <div class="col-md-6">
                    <div class="form-group" >
                      <label for="company_customer_ruc">Ruc:</label>
                      <input type="text" id="company_customer_ruc" name="company_customer_ruc" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" >
                      <label for="company_customer_name">Razón Social:</label>
                      <input type="text" id="company_customer_name" name="company_customer_name" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-8">
                    <div class="form-group" >
                      <label for="company_customer_address">Dirección:</label>
                      <input type="text" id="company_customer_address" name="company_customer_address" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_district">Distrito:</label>
                      <input type="text" id="company_customer_district" name="company_customer_district" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_mail">Correo:</label>
                      <input type="text" id="company_customer_mail" name="company_customer_mail" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_phone">Teléfono:</label>
                      <input type="text" id="company_customer_phone" name="company_customer_phone" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_reference">Referencia:</label>
                      <input type="text" id="company_customer_reference" name="company_customer_reference" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button id="btn_add_customer_company" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <table id="table_customer_company" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Ruc</center></th>
                      <th class="col-md-4"><center>Razon Social</center></th>
                      <th class="col-md-2"><center>Correo</center></th> 
                      <th class="col-md-2"><center>Dirección</center></th>
                      <th class="col-md-3"><center>Distrito</center></th> 
                      <th class="col-md-2"><center>Correo</center></th> 
                      <th class="col-md-2"><center>Teléfono</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="8">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <!-- ===================================== -->

             <!-- =========== FORM CONTACTS ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Personas a Contactar de la Empresa</legend>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_customer_ruc">Nombre:</label>
                    <input type="text" id="contact_customer_ruc" name="contact_customer_ruc" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_customer_name">Teléfono:</label>
                    <input type="text" id="contact_customer_name" name="contact_customer_name" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_customer_address">Correo:</label>
                    <input type="text" id="contact_customer_address" name="contact_customer_address" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <button id="btn_add_customer_contacts" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_customer_contacts" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Nombre</center></th>
                      <th class="col-md-4"><center>Teléfono</center></th>
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
            <!-- ===================================== -->

             <!-- =========== FORM DATOS FAMILIARES ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Datos de Familiars</legend>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_familiar_relacion">Relacion:</label>
                    <input type="text" id="contact_familiar_relacion" name="contact_familiar_relacion" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_familiar_nombre">Nombre:</label>
                    <input type="text" id="contact_familiar_nombre" name="contact_familiar_nombre" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_familiar_telefono">Teléfono:</label>
                    <input type="text" id="contact_familiar_telefono" name="contact_familiar_telefono" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <button id="btn_add_familiares" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_familiares" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Relacion</center></th>
                      <th class="col-md-4"><center>Nombre</center></th>
                      <th class="col-md-2"><center>Teléfono</center></th>
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
            <!-- ===================================== -->
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
        <?php echo form_open('travel/insert_client',array('id'=>'form_travel_register'));?>
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
          <button id="btn_save_customer" type="submit" class="btn btn-primary" >Guardar</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>