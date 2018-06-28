<?php $this->load->view("partial/header"); ?>
<?php echo form_open('customers/saveClient',array('id'=>'form_customer_register')); ?>
<?php var_dump($person_info);?>
<div class="row">
  <div class="col-md-6">
    <fieldset>
      <legend>Documentos</legend>
      <!-- =========== FORM ADDRESS ============ -->
        <div class="form-group" >
          <select id="type_customer_doc" class="form-control">
            <option value="">Seleccionar Tipo de Documento</option>
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
      <input type="hidden" id="client_id" name="client_id"/>
      <input type="hidden" id="client_data" name="client_data"/>
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
  <div class="col-md-4">
    <div class="form-group">
      <label for="gender">Género:</label>
      <select class="form-control" id="gender" name="gender">
        <option value="">Seleccionar</option>
        <option value="M">MASCULINO</option>
        <option value="F">FEMENINO</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="date_expire">Fecha de Nacimiento:</label>
      <input type="date" id="user_date" name="user_date" class="form-control"/>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="age">Edad:</label>
<table width="100%">
  <td align="lefth">
<input type="button" class="btn btn-warning" required value="Edad" onclick="javascript:calcularEdad();" />        
  </td>
  <td>
<div id="result"></div>        
  </td>
</table>
    </div>
  </div>
  <!-- <div class="col-md-12">
    <label for="address_1">Dirección:</label>
    <input type="text" id="address_1" name="address_1" class="form-control"/>
  </div> -->
  <div class="col-md-12">
    <center>
      <div id="messages" class="form-group"></div>
    </center>
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
          <label for="visado_customer_type">Tipo Visado:</label>
          <select name="visado_customer_type" id="visado_customer_type" class="form-control">
            <option value="">Seleccionar</option>
            <option value="VISA">VISA</option>
            <option value="E-VISA">E-VISA</option>
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
      <div class="col-md-6">
        <div class="form-group" >
          <label for="visado_customer_country">Pais Emisor:</label>
          <select name="visado_customer_country" id="visado_customer_country" class="form-control">
            <option value="">Seleccionar</option>
            <option value="EEUU">EEUU</option>
            <option value="Canada">Canada</option>
          </select>
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
            <th class="col-md-3"><center>Tipo Visado</center></th>
            <th class="col-md-2"><center>Número</center></th>
            <th class="col-md-2"><center>Fec. Emisión</center></th> 
            <th class="col-md-2"><center>Fec. Vencimiento</center></th>
<!-- Falta incluir el valor del pais emisor en la tabla de agregar         <th class="col-md-2"><center>Pais Emisor</center></th> -->
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
          <option value="telefono_fijo">Telefono Fijo</option>
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
        <label for="customer_email">Email:</label>
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
          <input type="text" id="pass_customer_frec" name="pass_customer_frec" class="form-control">
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
  <!-- ===== FORM PREFERENCIAS DE ASIENTOS ====== -->
  <div class="col-md-12">
    <fieldset>
      <legend>Preferencias de Asiento</legend>
      <div class="col-md-6">
        <div class="form-group">
          <label for="preferencia_tipo_asiento">Tipo de Asiento:</label>
          <input type="text" id="preferencia_tipo_asiento" name="preferencia_tipo_asiento" class="form-control">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="preferencia_indicaciones">Indicaciones:</label>
          <input type="text" id="preferencia_indicaciones" name="preferencia_indicaciones" class="form-control">
        </div>
      </div>
      <button id="btn_add_indicaciones" type="button" class="btn btn-primary">Agregar</button>
      <br/>
      <table id="table_indicaciones" class="table table-hover table-bordered" >
        <thead>
          <tr>
            <th class="col-md-3"><center>Tipo de Asiento</center></th>
            <th class="col-md-3"><center>Indicaciones</center></th>
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
          <option value="empresa">Empresa</option>
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
  <!-- =========== FORM DATOS TARJETAS ============ -->
  <div class="col-md-12">
    <fieldset>
      <legend>Datos de Tarjetas</legend>
      <div class="col-md-4">
        <div class="form-group" >
          <label for="tipo_tarjeta">Tipo de Tarjeta:</label>
          <input type="text" id="tipo_tarjeta" name="tipo_tarjeta" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group" >
          <label for="nro_tarjeta">Nro de tarjeta:</label>
          <input type="text" id="nro_tarjeta" name="nro_tarjeta" class="form-control">
        </div>  
      </div>
      <div class="col-md-4">
        <div class="form-group" >
          <label for="debito_credito">Débito o Crédito:</label>
          <input type="text" id="debito_credito" name="debito_credito" class="form-control">
        </div>  
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <button id="btn_add_tarjetas" type="button" class="btn btn-primary">Agregar</button>
        </div>
      </div>
      <table id="table_tarjetas" class="table table-hover table-bordered" >
        <thead>
          <tr>
            <th class="col-md-1"><center>Tipo de Tarjeta</center></th>
            <th class="col-md-4"><center>Nro de Tarjeta</center></th>
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
  <!-- ===================================== -->
  <!-- =========== FORM DATOS FAMILIARES ============ -->
  <div class="col-md-12">
    <fieldset>
      <legend>Datos de Familiares</legend>
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
<div id="modal_customer" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRO DE CLIENTES</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('customers/saveClient',array('id'=>'form_customer_register')); ?>
          <div class="row">
            <div class="col-md-6">
              <fieldset>
                <legend>Documentos</legend>
                <!-- =========== FORM ADDRESS ============ -->
                  <div class="form-group" >
                    <select id="type_customer_doc" class="form-control">
                      <option value="">Seleccionar Tipo de Documento</option>
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
                <input type="hidden" id="client_id" name="client_id"/>
                <input type="hidden" id="client_data" name="client_data"/>
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
            <div class="col-md-4">
              <div class="form-group">
                <label for="gender">Género:</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="">Seleccionar</option>
                  <option value="M">MASCULINO</option>
                  <option value="F">FEMENINO</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="date_expire">Fecha de Nacimiento:</label>
                <input type="date" id="user_date" name="user_date" class="form-control"/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="age">Edad:</label>
          <table width="100%">
            <td align="lefth">
       <input type="button" class="btn btn-warning" required value="Edad" onclick="javascript:calcularEdad();" />        
            </td>
            <td>
          <div id="result"></div>        
            </td>
          </table>
              </div>
            </div>
            <!-- <div class="col-md-12">
              <label for="address_1">Dirección:</label>
              <input type="text" id="address_1" name="address_1" class="form-control"/>
            </div> -->
            <div class="col-md-12">
              <center>
                <div id="messages" class="form-group"></div>
              </center>
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
                    <label for="visado_customer_type">Tipo Visado:</label>
                    <select name="visado_customer_type" id="visado_customer_type" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="VISA">VISA</option>
                      <option value="E-VISA">E-VISA</option>
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
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_country">Pais Emisor:</label>
                    <select name="visado_customer_country" id="visado_customer_country" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="EEUU">EEUU</option>
                      <option value="Canada">Canada</option>
                    </select>
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
                      <th class="col-md-3"><center>Tipo Visado</center></th>
                      <th class="col-md-2"><center>Número</center></th>
                      <th class="col-md-2"><center>Fec. Emisión</center></th> 
                      <th class="col-md-2"><center>Fec. Vencimiento</center></th>
<!-- Falta incluir el valor del pais emisor en la tabla de agregar         <th class="col-md-2"><center>Pais Emisor</center></th> -->
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
                    <option value="telefono_fijo">Telefono Fijo</option>
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
                  <label for="customer_email">Email:</label>
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
                    <input type="text" id="pass_customer_frec" name="pass_customer_frec" class="form-control">
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
            <!-- ===== FORM PREFERENCIAS DE ASIENTOS ====== -->
            <div class="col-md-12">
              <fieldset>
                <legend>Preferencias de Asiento</legend>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="preferencia_tipo_asiento">Tipo de Asiento:</label>
                    <input type="text" id="preferencia_tipo_asiento" name="preferencia_tipo_asiento" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="preferencia_indicaciones">Indicaciones:</label>
                    <input type="text" id="preferencia_indicaciones" name="preferencia_indicaciones" class="form-control">
                  </div>
                </div>
                <button id="btn_add_indicaciones" type="button" class="btn btn-primary">Agregar</button>
                <br/>
                <table id="table_indicaciones" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-3"><center>Tipo de Asiento</center></th>
                      <th class="col-md-3"><center>Indicaciones</center></th>
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
                    <option value="empresa">Empresa</option>
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
            <!-- =========== FORM DATOS TARJETAS ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Datos de Tarjetas</legend>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="tipo_tarjeta">Tipo de Tarjeta:</label>
                    <input type="text" id="tipo_tarjeta" name="tipo_tarjeta" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nro_tarjeta">Nro de tarjeta:</label>
                    <input type="text" id="nro_tarjeta" name="nro_tarjeta" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="debito_credito">Débito o Crédito:</label>
                    <input type="text" id="debito_credito" name="debito_credito" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <button id="btn_add_tarjetas" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_tarjetas" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Tipo de Tarjeta</center></th>
                      <th class="col-md-4"><center>Nro de Tarjeta</center></th>
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
            <!-- ===================================== -->
            <!-- =========== FORM DATOS FAMILIARES ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Datos de Familiares</legend>
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
          
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
<button id="btn_save_customer" type="submit" class="btn btn-primary" >Guardar</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<script src="<?php echo base_url();?>js/lib/travel.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        travel.current_url = "<?= base_url();?>";

        /* LISTANDO CLIENTES */
        // travel.listClients();

        /* BOTON DE AGREGADO DE DIRECCIONES */
        if(document.getElementById("btn_add_customer_travel") !== null){
            const btn_add_customer_travel = document.getElementById("btn_add_customer_travel");
            btn_add_customer_travel.addEventListener("click" ,() => {
                travel.saveCustomerAddress();
            });
        }

        /* BOTON DE AGREGADO DE PASAPORTES */
        if(document.getElementById("btn_add_customer_passport") !== null){
            const btn_add_customer_passport = document.getElementById("btn_add_customer_passport");
            btn_add_customer_passport.addEventListener("click" ,() => {
                travel.saveCustomerPassport();
            });
        }

        /* BOTON DE AGREGADO DE PASAPORTES */
        if(document.getElementById("btn_add_customer_card") !== null){
            const btn_add_customer_card = document.getElementById("btn_add_customer_card");
            btn_add_customer_card.addEventListener("click" ,() => {
                travel.saveCustomerCard();
            });
        }

        /* BOTON DE AGREGADO DE PASAPORTES */
        if(document.getElementById("btn_add_customer_company") !== null){
            const btn_add_customer_company = document.getElementById("btn_add_customer_company");
            btn_add_customer_company.addEventListener("click" ,() => {
                travel.saveCustomerCompany();
            });
        }

        /* BOTON DE AGREGADO DE FAMILIARES */
        if(document.getElementById("btn_add_familiares") !== null){
            const btn_add_familiares = document.getElementById("btn_add_familiares");
            btn_add_familiares.addEventListener("click" ,() => {
                travel.saveFamiliar();
            });
        }

        /* BOTON DE AGREGADO DE PREFERENCIAS DE ASIENTO */
        if(document.getElementById("btn_add_indicaciones") !== null){
            const btn_add_indicaciones = document.getElementById("btn_add_indicaciones");
            btn_add_indicaciones.addEventListener("click" ,() => {
                travel.savePreferenciasAsiento();
            });
        }

        /* BOTON DE AGREGADO DE INFO DE TARJETAS */
        if(document.getElementById("btn_add_tarjetas") !== null){
            const btn_add_tarjetas = document.getElementById("btn_add_tarjetas");
            btn_add_tarjetas.addEventListener("click" ,() => {
                travel.saveTarjetas();
            });
        }

        /* BOTON DE AGREGADO DE VISADO */
        if(document.getElementById("btn_add_customer_visado") !== null){
            const btn_add_customer_visado = document.getElementById("btn_add_customer_visado");
            btn_add_customer_visado.addEventListener("click" ,() => {
                travel.saveCustomerVisado();
            });
        }

        /* BOTON DE AGREGADO DE CONTACTOS */
        if(document.getElementById("btn_add_customer_contacts") !== null){
            const btn_add_customer_contacts = document.getElementById("btn_add_customer_contacts");
            btn_add_customer_contacts.addEventListener("click" ,() => {
                travel.saveCustomerContacts();
            });
        }

        /* BOTON DE AGREGADO DE DOCUMENTOS */
        if(document.getElementById("btn_add_customer_doc") !== null){
            const btn_add_customer_doc = document.getElementById("btn_add_customer_doc");
            btn_add_customer_doc.addEventListener("click" ,() => {
                travel.saveCustomerDocuments();
            });
        }

        if(document.getElementById("btn_add_customer_phones") !== null){
            const btn_add_customer_phones = document.getElementById("btn_add_customer_phones");
            btn_add_customer_phones.addEventListener("click" ,() => {
                travel.saveCustomerPhones();
            });
        }

        if(document.getElementById("btn_add_customer_emails") !== null){
            const btn_add_customer_emails = document.getElementById("btn_add_customer_emails");
            btn_add_customer_emails.addEventListener("click", () => {
                travel.saveCustomerEmails();
            });
        }

        if(document.getElementById("btn_add_customer_frec") !== null){
            const btn_add_customer_frec = document.getElementById("btn_add_customer_frec");
            btn_add_customer_frec.addEventListener("click", () => {
                travel.saveCustomerFrec();
            });
        }

        if(document.getElementById("btn_add_customer_frec") !== null){
            const btn_save_customer = document.getElementById("btn_save_customer");
            btn_save_customer.addEventListener("click", () => {
                var validator = $('#form_customer_register').data('bootstrapValidator');
                validator.validate();
                return validator.isValid();
            });
        }

        $("#form_customer_register").bootstrapValidator({
            container: '#messages',
            feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                /*
                type_customer_doc:{
                    validators: {
                        notEmpty: { message: "El campo tipo de documento es requerido"}
                    }
                },
                nro_customer_doc:{
                    validators: {
                        notEmpty: { message: "El campo número de documento es requerido"}
                    }
                },
                */
                first_name: {
                    validators: {
                        notEmpty: { message: "El campo nombre es requerido"}
                    }
                },
                midle_name: {
                    validators: {
                        notEmpty: { message: "El campo pre-nombre es requerido"}
                    }
                },
                last_name:{
                    validators: {
                        notEmpty: { message: "El campo apellidos paterno es requerido"}
                    }
                },
                last_name_mothers:{
                    validators: {
                        notEmpty: { message: "El campo apellidos materno es requerido"}
                    }
                },
                last_name_casada:{
                    validators: {
                        notEmpty: { message: "El campo apellido de casada es requerido"}
                    }
                },
                gender:{
                    validators: {
                        notEmpty: { message: "El campo género es requerido"}
                    }
                },
                age:{
                    validators: {
                        notEmpty: { message: "El campo edad es requerido"}
                    }
                },
                date_expire:{
                    validators: {
                        notEmpty: { message: "El campo fecha de nacimiento es requerido"}
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            $("#btn_save_customer").prop("disabled", false);
            var data = {};
            data.address = travel.customer_address_list;
            data.passport = travel.customer_passport_list;
            data.card = travel.customer_card_list;
            data.company = travel.customer_company_list;
            data.visado = travel.customer_visado_list;
            data.contact = travel.customer_contact_list;
            data.documents = travel.customer_documents_list;
            data.phones = travel.customer_phones_list;
            data.emails = travel.customer_emails_list;
            data.frec = travel.customer_frec_list;
            data.familiares = travel.customer_familiares_list;
            data.asiento = travel.preferencia_asiento_list;
            data.tarjtas = travel.customer_tarjtas_list;
            $("#client_data").val(JSON.stringify(data));
            $.ajax({
                type:"POST",
                url:travel.action_form,
                data:$("#form_customer_register").serialize(),
                success:function(res){
                    var response = JSON.parse(res);
                    $("#modal_customer").modal("hide");
                    if(response.success){
                        // travel.listClients();
                        $("#modal_success").modal("show");
                    }else{
                        $("#modal_error").modal("show");
                    }
                }
            });
        });
        function calcularEdad()
        {
            var fecha=document.getElementById("user_date").value;
            if(validate_fecha(fecha)==true)
            {
                var values=fecha.split("-");
                var dia = values[2];
                var mes = values[1];
                var ano = values[0];
                var fecha_hoy = new Date();
                var ahora_ano = fecha_hoy.getYear();
                var ahora_mes = fecha_hoy.getMonth()+1;
                var ahora_dia = fecha_hoy.getDate();
                var edad = (ahora_ano + 1900) - ano;
                if ( ahora_mes < mes )
                {
                    edad--;
                }
                if ((mes == ahora_mes) && (ahora_dia < dia))
                {
                    edad--;
                }
                if (edad > 1900)
                {
                    edad -= 1900;
                }
                // calculamos los meses
                var meses=0;
                if(ahora_mes>mes)
                    meses=ahora_mes-mes;
                if(ahora_mes<mes)
                    meses=12-(mes-ahora_mes);
                if(ahora_mes==mes && dia>ahora_dia)
                    meses=11;
         
                // calculamos los dias

                var dias=0;
                if(ahora_dia>dia)
                    dias=ahora_dia-dia;
                if(ahora_dia<dia)
                {
                    ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
                    dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
                }
         
                document.getElementById("result").innerHTML=""+edad+" años";
            }else{
                document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
            }
        }
    });
</script>