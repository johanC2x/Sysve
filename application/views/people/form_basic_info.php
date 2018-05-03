<div class="row">
	<?php echo form_open('travel/save',array('id'=>'form_travel_save')); ?>
	<fieldset>
		<legend>Datos Generales</legend>
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
                    <label for="person_id">DNI:</label>
                    <input type="text" name="person_id" id="person_id" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento:</label>
                    <input type="text" name="birthdate" id="birthdate" class="form-control" />
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
		<legend>Información Adicional</legend>		
			<table style="width: 900px" id="tbl_empresas">
					<tr>
						<td style="width:200px">Numero</td>
						<td style="width:200px">Fecha Emisión</td>
						<td style="width:200px">Fecha Expiración</td>
						<td style="width:200px">Pais Emisión</td>
						<td style="width:200px">Nacionalidad<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_pasaportes', ['nro', 'fecha_emision', 'fecha_expiracion', 'pais_emision', 'nacionalidad'], 900);"></button></td>
					</tr>
				</table>
				<div id="datos_pasaportes" name="datos_pasaportes"></div>
				<input type="hidden" name="json_empresa">
			<hr>
			<table style="width: 900px" id="tbl_empresas">
				<tr>
					<td style="width:200px">Tipo</td>
					<td style="width:200px">Direccion</td>
					<td style="width:200px">Distrito/Estado</td>
					<td style="width:200px">Pais</td>
					<td style="width:200px">Telefono</td>
					<td style="width:200px">Referencia <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_generales', ['tipo','direccion', 'distrito', 'pais', 'tlfono', 'referencia'], 900);"></button></td>
				</tr>
			</table>
			<div id="datos_generales" name="datos_generales"></div>
			<input type="hidden" name="json_empresa">
			<hr>
		</fieldset>
		<fieldset>
			<legend>Datos de Tarjetas</legend>
			<div class="col-md-12">
				<div class="col-md-4">
					<div class="form-group">
	                    <label for="tipo_tarjeta">Tipo de Tarjeta</label>
	                    <input type="text" name="tipo_tarjeta" id="tipo_tarjeta" class="form-control" />
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
	                    <label for="nro_tarjeta">Nro de Tarjeta:</label>
	                    <input type="text" name="nro_tarjeta" id="nro_tarjeta" class="form-control" />
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
	                    <label for="debito_credito">Débito o Crédito:</label>
	                    <input type="text" name="debito_credito" id="debito_credito" class="form-control" />
	                </div>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Datos de empresa <input type="checkbox" name=""></legend><button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_empresa', ['ruc', 'razon_social', 'direccion', 'correo' ,'tlfono', 'referencia'], 1000);"></button>
			<table style="width: 1000px" id="tbl_empresas">
				<tr>
					<td style="text-align: center;width:225px">RUC</td>
					<td style="text-align: center;width:225px">razon social</td>
					<td style="text-align: center;width:225px">direccion</td>
					<td style="text-align: center;width:225px">Correo</td>
					<td style="text-align: center;width:225px">Telefono</td>
					<td style="text-align: center;width:225px">Referencia</td>
				</tr>
			</table>
			<div id="datos_empresa" name="datos_empresa">
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
				<table style="width: 393px" id="tbl_empresas">
					<tr>
						<td>Tipo de contacto</td>
						<td style="width:142px">Nro <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_celulares', ['tipo_contacto', 'nro'], 400);"></button></td>
					</tr>
				</table>
				<div id="datos_celulares" name="datos_celulares"></div>
				<input type="hidden" name="json_empresa">
			</div>
			<div class="col-md-6">
				<table style="width: 393px" id="tbl_empresas">
						<tr>
							<td>Tipo de email</td>
							<td style="width:142px">Nro <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_emails', ['tipo_email', 'email'], 400);"></button></td>
						</tr>
				</table>
				<div id="datos_emails" name="datos_emails"></div>
				<input type="hidden" name="json_empresa">
			</div>
		</div>
	</fieldset>
	<hr>
	<fieldset>
		<legend>Pasajeros Frecuentes</legend>
		<div class="col-md-6">
				<table style="width: 750px" id="tbl_empresas">
					<tr>
						<td style="width:500px">Millaje</td>
						<td style="width:500px">Nro</td>
						<td style="width:500px">Usuario</td>
						<td style="width:500px">Clave</td>
						<td style="width:500px">Fin <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_pasajeros', ['millaje', 'nro', 'usuario', 'clave', 'fin'], 400);"></button></td>
					</tr>
				</table>
				<div id="datos_pasajeros" name="datos_pasajeros"></div>
				<input type="hidden" name="json_empresa">
			</div>
	</fieldset>
	<hr>
	<fieldset>
		<legend>Datos de Familiares</legend>
		<div class="col-md-6">
				<table style="width: 750px" id="tbl_empresas">
					<tr>
						<td style="width:500px">Relación</td>
						<td style="width:500px">Nombre</td>
						<td style="width:500px">Telefono <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_familiares', ['relacion', 'nombre', 'telefono'], 750);"></button></td>
					</tr>
				</table>
				<div id="datos_familiares" name="datos_familiares"></div>
				<input type="hidden" name="json_empresa">
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
