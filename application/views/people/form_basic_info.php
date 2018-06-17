<div class="row">
	<?php echo form_open('travel/save',array('id'=>'form_travel_save')); ?>
	<input type="hidden" name="data_customer" id="data_customer" value='{"documentos":[{"documento":"DNI","nro":"132"},{},{}],"pasaportes":[{},{},{}],"direcciones":[{}],"tarjetas":[{}],"generales":[{}],"empresa":[{}],"contactar":[{}],"pasajeros":[{}],"emails":[{}],"celulares":[{"tipo_contacto":"CELULAR PERSONAL"},{}],"familiares":[{}],"visado":[{}],"asiento":[{}]}'>
	<fieldset>
		<legend>Datos Generales</legend>
		<div class="col-md-12">
			<div class="col-md-4" style="overflow: scroll; height: 100px">
				<table class="table table-striped table-bordered generada" id="tbl_empresas">
					<thead>
						<th>Documento</th>
						<th>Nro.</th>
						<th>
							<center>
								<button type="button" class="fa fa-plus" onclick="generarTablaDatos('datos_dni', ['documento', 'nro'], 200);customer.saveCustomerDocumentos();"/>
							</center>
						</th>
					</thead>
					<tbody></tbody>
					<!--
					<tr>
						<td style="text-align: center;width:100px">Documento</td>
						<td style="text-align: center;width:100px">Nro.</td>
					</tr>
					-->
				</table>
				<div id="datos_dni" name="datos_dni"></div>
				<input type="hidden" name="json_datos_dni" id="json_datos_dni">
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento:</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control"/>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="gender">Género:</label>
                    <input type="text" name="gender" id="gender" class="form-control" />
                </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
                    <label for="gender">Edad:</label>
                    <input type="text" name="age" id="age" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="first_name">Nombres:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="last_name">PeNombre:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
                    <label for="last_name">Ap.Paterno:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="last_name">Ap.Materno:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="ap_casada">Ap. de Casada:</label>
                    <input type="text" name="ap_casada" id="ap_casada" class="form-control" />
                </div>
			</div>
		</div>
	</fieldset>
		<fieldset>
		<div class="col-md-12">
			<legend>Pasaporte</legend>		
				<table class="table table-striped table-bordered generada" id="tbl_passport"> <!-- tbl_empresas -->
					<thead>
						<th style="text-align: center;">Numero</th>
						<th style="text-align: center;">Fecha Emisión</th>
						<th style="text-align: center;">Fecha Expiración</th>
						<th style="text-align: center;">Pais Emisión</th>
						<th style="text-align: center;">Nacionalidad</th>
						<th style="text-align: center;">
							<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_pasaportes', ['nro', 'fecha_emision', 'fecha_expiracion', 'pais_emision', 'nacionalidad'], 900);"/>
						</th>
					</thead>
					<tbody></tbody>
				</table>
				<div id="datos_pasaportes" name="datos_pasaportes"></div>
				<input type="hidden" name="json_empresa">
			<hr>
		</fieldset>
		<fieldset>
		<div class="col-md-12">
		<legend>Visado</legend>		
			<table class="table table-striped table-bordered generada" id="tbl_visado"> <!-- tbl_empresas -->
				<thead>
					<th style="text-align: center;">Pais de Visado</th>
					<th style="text-align: center;">Numero</th>
					<th style="text-align: center;">Fecha Emisión</th>
					<th style="text-align: center;">Fecha Expiracion</th>
					<th>
						<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_visado', ['pais_visado', 'numero', 'fecha_emision', 'fecha_expiracion'], 610);"></button>
					</th>
				</thead>
				<tbody></tbody>
			</table>
			<div id="datos_visado" name="datos_visado"></div>
			<input type="hidden" name="json_empresa">
			<hr>
		</fieldset>
		<fieldset>
			<legend>Direcciones propias y de entrega</legend>
			<table class="table table-striped table-bordered generada" id="tbl_address"> 
				<thead>
					<th style="text-align: center;">Tipo</th>
					<th style="text-align: center;">Direccion</th>
					<th style="text-align: center;">Distrito/Estado</th>
					<th style="text-align: center;">Pais</th>
					<th style="text-align: center;">Telefono</th>
					<th style="text-align: center;">Referencia</th> 
					<th>
						<button type="button" class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_generales', ['tipo','direccion', 'distrito', 'pais', 'tlfono', 'referencia'], 900);"/>
					</th>
				</thead>
				<tbody></tbody>
			</table>
			<div id="datos_generales" name="datos_generales"></div>
			<input type="hidden" name="json_empresa">
			<hr>
		</fieldset>
		<fieldset>
			<legend>Datos de empresa <input type="checkbox" name=""></legend>
			<table class="table table-striped table-bordered generada" id="tbl_company"> 
				<thead>
					<th style="text-align: center;width:205px">RUC</th>
					<th style="text-align: center;width:225px">razon social</th>
					<th style="text-align: center;width:225px">direccion</th>
					<th style="text-align: center;width:225px">distrito</th>
					<th style="text-align: center;width:225px">estado</th>
					<th style="text-align: center;width:225px">Correo</th>
					<th style="text-align: center;width:225px">Telefono</th>
					<th style="text-align: center;width:225px">Referencia</th>
					<th>
						<center>
							<button class="fa fa-plus" onclick="generarTablaDatos('datos_empresa', ['ruc', 'razon_social', 'direccion', 'distrito', 'estado', 'correo' ,'tlfono', 'referencia'], 1000);"/>
						</center>
					</th>
				</thead>
				<tbody></tbody>
			</table>
			<div id="datos_empresa" name="datos_empresa">
			<input type="hidden" name="json_empresa">
		</fieldset>
		<fieldset>
			<legend>Personas a contactar <input type="checkbox" name=""></legend>
			<table class="table table-striped table-bordered generada" id="tbl_contact"> 
				<thead>
					<th style="text-align: center;">Nombre</th>
					<th style="text-align: center;">Telefono</th>
					<th style="text-align: center;">Correo</th>
					<th>
						<center>
							<button type="button" class="fa fa-plus" onclick="generarTablaDatos('datos_contactar', ['ruc', 'telefono', 'correo'], 451);"></button>
						</center>
					</th>
				</thead>
				<tbody></tbody>
			</table>
			<div id="datos_contactar" name="datos_contactar">
			<input type="hidden" name="json_empresa">
		</fieldset>
		<hr>
		<fieldset>
			<legend>Datos de Tarjetas</legend>
			<table class="table table-striped table-bordered generada" id="tbl_card"> 
				<thead>
					<th style="text-align: center;">Tipo de Tarjeta</th>
					<th style="text-align: center;">Nro. de Tarjeta</th>
					<th style="text-align: center;">Débito o Crédito</th>
					<th>
						<center>
							<button type="button" class="fa fa-plus" onclick="generarTablaDatos('datos_tarjetas', ['tipo_tarjeta', 'nro_tarjeta', 'debito_credito'], 500);">
						</center>
					</th>
				</thead>
				<tbody></tbody>
			</table>
			<div id="datos_tarjetas" name="datos_tarjetas">
			<input type="hidden" name="json_empresa">
		</fieldset>
		
		<hr>
	<fieldset>
		<legend>Información Personal</legend>
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
                    <label for="nationality">Nacionalidad:</label>
                    <input type="text" name="nationality" id="nationality" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="birthplace">Pais:</label>
                    <input type="text" name="birthplace" id="birthplace" class="form-control" />
                </div>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend>Teléfono y Correo</legend>
		<div class="col-md-12">
			<div class="col-md-6">
				<table class="table table-striped table-bordered generada" id="tbl_phone"> 
					<thead>
						<th style="text-align: center;">Tipo de contacto</th>
						<th style="text-align: center;">Nro</th>
						<th style="text-align: center;">
							<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_celulares', ['tipo_contacto', 'nro'], 400);"></button>
						</th>
					</thead>
					<tbody></tbody>
				</table>
				<div id="datos_celulares" name="datos_celulares"></div>
				<input type="hidden" name="json_empresa">
			</div>
			<div class="col-md-6">
				<table class="table table-striped table-bordered" id="tbl_emails"> 
					<thead>
						<th style="text-align: center;">Tipo de email</th>
						<th style="text-align: center;">Nro</th>
						<th style="text-align: center;">
							<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_emails', ['tipo_email', 'email'], 400);"></button>
						</th>
					</thead>
					<tbody></tbody>
				</table>
				<div id="datos_emails" name="datos_emails"></div>
				<input type="hidden" name="json_empresa">
			</div>
		</div>
	</fieldset>
	<hr>
	<fieldset>
		<legend>Pasajeros Frecuentes</legend>
		<div class="col-md-12">
				<table class="table table-striped table-bordered generada" id="tbl_pasj"> 
					<thead>
						<th style="text-align: center;">Millaje</th>
						<th style="text-align: center;">Nro</th>
						<th style="text-align: center;">Usuario</th>
						<th style="text-align: center;">Clave</th>
						<th style="text-align: center;">Fin</th>
						<th style="text-align: center;">
							<button type="button" class="fa fa-plus" onclick="generarTablaDatos('datos_pasajeros', ['millaje', 'nro', 'usuario', 'clave', 'fin'], 400);">
						</th>
					</thead>
					<tbody></tbody>
				</table>
				<div id="datos_pasajeros" name="datos_pasajeros"></div>
				<input type="hidden" name="json_empresa">
			</div>
	</fieldset>
	<hr>
	<fieldset>
		<legend><span>Datos de Familiares</span> y <span style="position: relative;left: 450px">Preferencia de asiento</span></legend>
		<div class="col-md-12">
			<div class="col-md-6">
					<table class="table table-striped table-bordered generada" id="tbl_fam"> 
						<thead>
							<th style="text-align: center;">Relación</th>
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">Telefono</th>
							<th style="text-align: center;">
								<button class="fa fa-plus" onclick="generarTablaDatos('datos_familiares', ['relacion', 'nombre', 'telefono'], 300);"></button>
							</th>
						</thead>
						<tbody></tbody>
					</table>
					<div id="datos_familiares" name="datos_familiares"></div>
					<input type="hidden" name="json_empresa">
			</div>
			<div class="col-md-6">
				<table class="table table-striped table-bordered generada" id="tbl_asis"> 
					<thead>
						<th style="text-align: center;">Tipo Asiento</th>
						<th style="text-align: center;">Indicaciones</th>
						<th style="text-align: center;">
							<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_asiento', ['tipo_asiento', 'indicaciones'], 400);"></button>
						</th>
					</thead>
					<tbody></tbody>
				</table>
				<div id="datos_asiento" name="datos_asiento"></div>
				<input type="hidden" name="json_empresa">
			</div>
		</div>
	</fieldset>
	
	<?php echo form_close(); ?>
</div>
<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_comments').':', 'comments',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php 
		echo form_textarea(array(
			'name'=>'comments',
			'id'=>'comments',
			'class'=>'form-control',
			'value'=>$person_info->comments,
			'rows'=>'5',
			'cols'=>'17'
		));
	?>
	</div>
</div>

<script type="text/javascript">

    function getCantidadInputs(contenedor){
        var cant_inputs = 1;
        switch(contenedor){
            case 'tbl_empresas':
                cant_inputs = '2';
                break;
            case 'tbl_passport':
                cant_inputs = '5';
                break;
            case 'tbl_visado':
                cant_inputs = '4';
                break;
            case 'tbl_address':
                cant_inputs = '6';
                break;
            case 'tbl_company':
                cant_inputs = '8';
                break;
            case 'tbl_contact':
                cant_inputs = '3';
                break;
            case 'tbl_card':
                cant_inputs = '3';
                break;
            case 'tbl_pasj':
                cant_inputs = '5';
                break;
            case 'tbl_phone':
                cant_inputs = '2';
                break;
            case 'tbl_emails':
                cant_inputs = '2';
                break; 
            case 'tbl_fam':
                cant_inputs = '3';
                break; 
            case 'tbl_asis':
                cant_inputs = '2';
                break;         
        }
        return cant_inputs;
    }
    function setProperties(data){
        // result = data.slice(1, -1).slice(0, -1);;

        result = data.split("],[").join("]*[").split('*');
        for (var i = result.length - 1; i >= 0; i--) {
            dato = result[i].split(':');
            indice = dato[0].replace('[', '');
            valores = JSON.parse(dato[1].replace('["', '').replace('"]]', ''));

            //completar arreglo de valores dependiendo del contenedor
            cant_inputs = getCantidadInputs(indice);
            cant_datos_actuales = valores.length;
            faltantes = parseInt(cant_inputs) - parseInt(cant_datos_actuales);
            for (var j = 0; j < faltantes; j++) {
                valores.push(' ');
            }
            console.log('cant_input:'+cant_inputs);
            console.log('cant_datos_actuales:' + cant_datos_actuales);
            console.log(indice);
            console.log(valores);
            //get onclick 
            onclick = $('#'+indice).find('.fa-plus').attr('onclick');
            console.log('onclick:');
            console.log(onclick);
            // alert("$('#"+indice+"').find('.fa-plus').attr('onclick');")
        }

    }


    function generarTablaDatos(contenedor, inputs, width, valores = null){
        var tabla = '';
        var select = '';
        var idObj = "";
        if(typeof valores === 'undefined'){
            valores = '';
        }
        // inputs = ['razon_social', 'direccion', 'nro_doc'];
        //tabla += '<table style="width:'+width+'px" class="generada" id="'+contenedor+'">';
        tabla += '<tr>';
        arr = [];
        for (var i = 0; i < inputs.length; i++) {
            if((contenedor == 'datos_dni' || contenedor == 'datos_dni2' )&& inputs[i] == 'documento'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="" disabled>Seleccionar</option>';
                    select += '<option value="DNI">DNI</option>';
                    select += '<option value="CE">CE</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_generales' && inputs[i] == 'tipo'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="" disabled>Seleccionar</option>';
                    select += '<option value="DOMICILIO">DOMICILIO</option>';
                    select += '<option value="ENTREGA">ENTREGA</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_celulares' && inputs[i] == 'tipo_contacto'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="CELULAR PERSONAL">CELULAR PERSONAL</option>';
                    select += '<option value="CELULAR EMPRESA">CELULAR EMPRESA</option>';
                    select += '<option value="OTROS">OTROS</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_emails' && inputs[i] == 'tipo_email'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="EMPRESA">EMPRESA</option>';
                    select += '<option value="PERSONAL">PERSONAL</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'pais_visado'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="AMERICANO">AMERICANO</option>';
                    select += '<option value="ESTA">ESTA</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'fecha_emision'){
                tabla += '<td><input class="'+inputs[i]+' form-control" type="date"></td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'fecha_expiracion'){  
                tabla += '<td><input class="'+inputs[i]+' form-control" type="date"></td>';
            }else if(contenedor == 'datos_asiento' && inputs[i] == 'tipo_asiento'){
                select += '<select name="pref_asiento" class="form-control">'
                    select += '<option value="VENTANA">VENTANA</option>'
                    select += '<option value="PASILLO">PASILLO</option>'
                    select += '<option value="SALIDA DE EMERGENCIA">SALIDA DE EMERGENCIA</option>'
                    select += '<option value="COMPRA DE ASIENTOS">COMPRA DE ASIENTOS</option>'
                    select += '<option value="UPGRADE">UPGRADE</option>'
                    select += '<option value="SILLA DE RUEDAS">SILLA DE RUEDAS</option>'
                select += '</select>'
                tabla += '<td>'+ select +'</td>';
            }else{
                tabla += '<td><input class="'+inputs[i]+' form-control"></td>';
            }

            arr[i] = inputs[i];
            json = $('#json_'+contenedor).val(JSON.stringify(arr));
        }
        tabla += '<td><button type="button" class="borrar fa fa-trash"></button></td>';
        tabla += '</tr>';
        
        //tabla += '<table>';
        switch(contenedor){
            case 'datos_dni':
                idObj = 'tbl_empresas';
                // customer.saveCustomerDocumentos();
                break;
            case 'datos_pasaportes':
                idObj = 'tbl_passport';
                // customer.saveCustomerPasaportes();
                break;
            case 'datos_visado':
                idObj = 'tbl_visado';
                // customer.self.saveCustomerVisado();
                break;
            case 'datos_generales':
                idObj = 'tbl_address';
                // customer.saveCustomerDirecciones();
                break;
            case 'datos_empresa':
                idObj = 'tbl_company';
                // customer.saveCustomerEmpresa();
                break;
            case 'datos_contactar':
                idObj = 'tbl_contact';
                // customer.saveCustomerContactar();
                break;
            case 'datos_tarjetas':
                idObj = 'tbl_card';
                // customer.saveCustomerTarjetas();
                break;
            case 'datos_pasajeros':
                idObj = 'tbl_pasj';
                // customer.saveCustomerPasajeros();
                break;
            case 'datos_celulares':
                idObj = 'tbl_phone';
                // customer.saveCustomerCelulares();
                break;
            case 'datos_emails':
                idObj = 'tbl_emails';
                // customer.saveCustomerEmails();
                break; 
            case 'datos_familiares':
                idObj = 'tbl_fam';
                // customer.saveCustomerFamiliares();
                break; 
            case 'datos_asiento':
                idObj = 'tbl_asis';
                // customer.saveCustomerAsiento();
                break;         
        }
        if(idObj !== ''){
            $('#'+idObj+' > tbody').append(tabla);
        }else{
            $('#'+contenedor+' > tbody').append(tabla);
        }



        $('.borrar').click(function(){
            fila = $(this).parent().parent();
            fila.remove();
        })
    }

	
</script>