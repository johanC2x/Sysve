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
                    <label for="first_name">Nombres:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" />
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
                    <label for="last_name">Apellidos:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                </div>
			</div>
		</div>
		<div class="col-md-12">
			
			<table style="width: 900px" id="tbl_empresas">
				<tr>
					<td style="width:200px">Direccion</td>
					<td style="width:200px">Distrito</td>
					<td style="width:200px">Pais</td>
					<td style="width:200px">Telefono <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_generales', ['direccion', 'distrito', 'pais', 'tlfono'], 900);"></button></td>
				</tr>
			</table>
			<div id="datos_generales" name="datos_generales"></div>
			<input type="hidden" name="json_empresa">
			<hr>
			<table style="width: 400px" id="tbl_empresas">
				<tr>
					<td style="width:300px">Correo <button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_correos', ['correo'], 400);"></button></td>
				</tr>
			</table>
			<div id="datos_correos" name="datos_correos"></div>
			<input type="hidden" name="json_empresa">
			<hr>
	</fieldset>
	<fieldset>
		<legend>Información Personal</legend>
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento:</label>
                    <input type="text" name="birthdate" id="birthdate" class="form-control" />
                </div>
			</div>
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
		<legend>Datos de empresa</legend><button class="fa fa-plus" style="float:right" onclick="generarTablaDatos('datos_empresa', ['razon_social', 'direccion', 'nro_doc', 'correo' ,'tlfono'], 1000);"></button>
		<table style="width: 1000px" id="tbl_empresas">
			<tr>
				<td style="width:225px">razon social</td>
				<td style="width:225px">direccion</td>
				<td style="width:225px">nro doc</td>
				<td style="width:225px">Correo</td>
				<td style="width:225px">Telefono</td>
			</tr>
		</table>
		<div id="datos_empresa" name="datos_empresa">
		<input type="hidden" name="json_empresa">
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
