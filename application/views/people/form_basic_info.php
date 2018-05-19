<div class="row">
	<?php echo form_open('travel/save',array('id'=>'form_travel_save')); ?>
	<input type="hidden" name="hidden_tablas" id="hidden_tablas">
	<fieldset>
		<legend>Datos Generales</legend>
		<div class="col-md-12">
			<div class="col-md-4" style="overflow: scroll; height: 100px">
				<table style="text-align: center;width: 200px" id="tbl_empresas">
					<tr>
						<td style="text-align: center;width:100px">Documento</td>
						<td style="text-align: center;width:100px">Nro.<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_dni', ['documento', 'nro'], 200);"></button></td>
					</tr>
				</table>
				<div id="datos_dni" name="datos_dni"></div>
				<input type="hidden" name="json_datos_dni" id="json_datos_dni">
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
		<legend>Pasaporte</legend>		
			<table style="text-align: center;width: 898px" id="tbl_empresas">
					<tr>
						<td style="text-align: center;width:166px">Numero</td>
						<td style="text-align: center;width:200px">Fecha Emisión</td>
						<td style="text-align: center;width:200px">Fecha Expiración</td>
						<td style="text-align: center;width:200px">Pais Emisión</td>
						<td style="text-align: center;width:200px">Nacionalidad<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_pasaportes', ['nro', 'fecha_emision', 'fecha_expiracion', 'pais_emision', 'nacionalidad'], 900);"></button></td>
					</tr>
				</table>
				<div id="datos_pasaportes" name="datos_pasaportes"></div>
				<input type="hidden" name="json_empresa">

			<hr>
		</fieldset>
		<fieldset>
		<div class="col-md-12">
		<legend>Visado</legend>		
			<table style="text-align: center;width: 608px" id="tbl_empresas">
					<tr>
						<td style="text-align: center;width:100px">Pais de Visado</td>
						<td style="text-align: center;width:150px">Numero</td>
						<td style="text-align: center;width:150px">Fecha Emisión</td>
						<td style="text-align: center;width:150px">Fecha Expiracion<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_visado', ['pais_visado', 'numero', 'fecha_emision', 'fecha_expiracion'], 610);"></button></td>
					</tr>
				</table>
				<div id="datos_visado" name="datos_visado"></div>
				<input type="hidden" name="json_empresa">
				<hr>
		</fieldset>
		<fieldset>
			<legend>Direcciones propias y de entrega</legend>
			<table style="text-align: center;width: 916px" id="tbl_empresas">
				<tr>
					<td style="text-align: center;width:128px">Tipo</td>
					<td style="text-align: center;width:200px">Direccion</td>
					<td style="text-align: center;width:200px">Distrito/Estado</td>
					<td style="text-align: center;width:200px">Pais</td>
					<td style="text-align: center;width:200px">Telefono</td>
					<td style="text-align: center;width:200px">Referencia <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_generales', ['tipo','direccion', 'distrito', 'pais', 'tlfono', 'referencia'], 900);"></button></td>
				</tr>
			</table>
			<div id="datos_generales" name="datos_generales"></div>
			<input type="hidden" name="json_empresa">
			<hr>
		</fieldset>
		<fieldset>
			<legend>Datos de empresa <input type="checkbox" name=""></legend>
			<table style="text-align: center;width: 1311px" id="tbl_empresas">
				<tr>
					<td style="text-align: center;width:205px">RUC</td>
					<td style="text-align: center;width:225px">razon social</td>
					<td style="text-align: center;width:225px">direccion</td>
					<td style="text-align: center;width:225px">distrito</td>
					<td style="text-align: center;width:225px">estado</td>
					<td style="text-align: center;width:225px">Correo</td>
					<td style="text-align: center;width:225px">Telefono</td>
					<td style="text-align: center;width:225px">Referencia<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_empresa', ['ruc', 'razon_social', 'direccion', 'distrito', 'estado', 'correo' ,'tlfono', 'referencia'], 1000);"></button></td>
				</tr>
			</table>
			<div id="datos_empresa" name="datos_empresa">
			<input type="hidden" name="json_empresa">
		</fieldset>
		<fieldset>
			<legend>Personas a contactar <input type="checkbox" name=""></legend>
			<table style="text-align: center;width: 501px" id="tbl_empresas">
				<tr>
					<td style="text-align: center;width:155px">Nombre</td>
					<td style="text-align: center;width:155px">Telefono</td>
					<td style="text-align: center;width:155px">Correo<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_contactar', ['ruc', 'telefono', 'correo'], 451);"></button></td>
				</tr>
			</table>
			<div id="datos_contactar" name="datos_contactar">
			<input type="hidden" name="json_empresa">
		</fieldset>
		<hr>
		<fieldset>
			<legend>Datos de Tarjetas</legend>
			<table style="text-align: center;width: 500px" id="tbl_empresas">
				<tr>
					<td style="text-align: center;width:150px">Tipo de Tarjeta</td>
					<td style="text-align: center;width:150px">Nro. de Tarjeta</td>
					<td style="text-align: center;width:150px">Débito o Crédito<button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_tarjetas', ['tipo_tarjeta', 'nro_tarjeta', 'debito_credito'], 500);"></button></td>
				</tr>
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
				<table style="text-align: center;width: 396px" id="tbl_empresas">
					<tr>
						<td style="width:100px">Tipo de contacto</td>
						<td style="width:190px">Nro <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_celulares', ['tipo_contacto', 'nro'], 400);"></button></td>
					</tr>
				</table>
				<div id="datos_celulares" name="datos_celulares"></div>
				<input type="hidden" name="json_empresa">
			</div>
			<div class="col-md-6">
				<table style="width: 392px" id="tbl_empresas">
						<tr>
							<td style="width:120px">Tipo de email</td>
							<td style="width:111px">Nro <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_emails', ['tipo_email', 'email'], 400);"></button></td>
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
				<table style="width: 822px" id="tbl_empresas">
					<tr>
						<td style="text-align: center;width:500px">Millaje</td>
						<td style="text-align: center;width:500px">Nro</td>
						<td style="text-align: center;width:500px">Usuario</td>
						<td style="text-align: center;width:500px">Clave</td>
						<td style="text-align: center;width:500px">Fin <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_pasajeros', ['millaje', 'nro', 'usuario', 'clave', 'fin'], 400);"></button></td>
					</tr>
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
					<table style="text-align: center;width: 501px" id="tbl_empresas">
						<tr>
							<td style="text-align: center;width:100px">Relación</td>
							<td style="text-align: center;width:100px">Nombre</td>
							<td style="text-align: center;width:100px">Telefono <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_familiares', ['relacion', 'nombre', 'telefono'], 300);"></button></td>
						</tr>
					</table>
					<div id="datos_familiares" name="datos_familiares"></div>
					<input type="hidden" name="json_empresa">
			</div>
			<div class="col-md-6">
				<table style="width: 397px" id="tbl_empresas">
					<tr>
						<td style="text-align: center;width:272px">Tipo Asiento</td>
						<td style="text-align: center;width:500px">Indicaciones <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_asiento', ['tipo_asiento', 'indicaciones'], 400);"></button></td>
					</tr>
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
