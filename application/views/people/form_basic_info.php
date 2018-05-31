<div class="row">
	<?php echo form_open('travel/save',array('id'=>'form_travel_save')); ?>
	<input type="hidden" name="hidden_tablas" id="hidden_tablas">
	<fieldset>
		<legend>Datos Generales</legend>
		<div class="col-md-12">
			<div class="col-md-4" style="overflow: scroll; height: 100px">
				<table class="table table-striped table-bordered" id="tbl_empresas">
					<thead>
						<th>Documento</th>
						<th>Nro.</th>
						<th>
							<center>
								<button type="button" class="fa fa-plus" onclick="generarTablaDatos('datos_dni', ['documento', 'nro'], 200);"/>
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
				<table class="table table-striped table-bordered" id="tbl_passport"> <!-- tbl_empresas -->
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
			<table class="table table-striped table-bordered" id="tbl_visado"> <!-- tbl_empresas -->
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
			<table class="table table-striped table-bordered" id="tbl_address"> 
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
			<table class="table table-striped table-bordered" id="tbl_company"> 
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
			<table class="table table-striped table-bordered" id="tbl_contact"> 
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
			<table class="table table-striped table-bordered" id="tbl_card"> 
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
				<table class="table table-striped table-bordered" id="tbl_phone"> 
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
				<table class="table table-striped table-bordered" id="tbl_pasj"> 
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
		<legend>Datos de Familiares y Preferencia de asiento</legend>
		<div class="col-md-12">
			<div class="col-md-6">
					<table class="table table-striped table-bordered" id="tbl_fam"> 
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
				<table class="table table-striped table-bordered" id="tbl_asis"> 
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
