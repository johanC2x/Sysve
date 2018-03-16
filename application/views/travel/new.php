<?php $this->load->view("partial/header"); ?>
<!--
<div id="title_bar">
	<div id="title" class="float_left">
		Módulo de Viajes
	</div>
</div>
-->
<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<?php echo form_open('travel/suggest',array('id'=>'form_travel_search','class' => 'form-inline')); ?>
				<fieldset>
					<div class="form-group">
						<input type="text" class="form-control" id="code_travel_search" placeholder="Ingresar Código" />
					</div>
					<button type="button" class="btn btn-primary">Buscar Solicitud</button>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-4">
			<?php echo form_open('travel/suggest',array('id'=>'form_travel_search','class' => 'form-inline')); ?>
				<fieldset>
					<legend>Datos del Cliente</legend>
					<div class="form-group">
						<input type="text" class="form-control" id="search_value" 
						onkeyup="travel.suggest(this);" list="list_travel_search"  autocomplete="off" placeholder="Buscar Cliente" />
						<datalist id="list_travel_search"></datalist>
					</div>
					<?php 
					    $controller_name = 'customers';
					    echo anchor("$controller_name/view/-1/width:450",
					        "".$this->lang->line($controller_name.'_new')."",
					        array('class'=>'thickbox none btn btn-primary','title'=>$this->lang->line($controller_name.'_new')));
				    ?>
				</fieldset>
			<?php echo form_close(); ?>
			<br/>
			<form id="form_customer_data" role="form">
				<div class="form-group">
					<input type="text" id="customer_document" name="customer_document" class="form-control" placeholder="Ruc / Nro. Documento"/>
				</div>
				<div class="form-group">
					<input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Cliente / Razón Social"/>
				</div>
				<div class="form-group">
					<textarea id="customer_address" name="customer_address" class="form-control" placeholder="Dirección" ></textarea>
				</div>
			</form>
		</div>
		<div class="col-md-8">
			<?php echo form_open('travel/save',array('id'=>'form_travel_save')); ?>
			<fieldset>
				<legend>Datos del Viaje</legend>
				<div class="col-md-12">
					<div class="col-md-4">
						<div class="form-group">
							<label for="code_travel">Código:</label>
                			<input type="text" name="code_travel" id="code_travel" class="form-control" />
						</div>
						<div class="form-group">
							<label for="name_travel">Vuelo:</label>
                			<input type="text" name="name_travel" id="name_travel" class="form-control" />
						</div>
						<div class="form-group">
							<label for="type_travel">Ubicación</label>
							<select id="type_travel" name="type_travel" class="form-control">
								<option value="">Seleccionar</option>
								<option value="1">Ventana</option>
								<option value="2">Pasillo</option>
								<option value="3">Compra Asiento</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
		                    <label for="">Desde:</label>
		                    <input type="text" name="destiny_origin_travel" id="destiny_origin_travel" class="form-control" />
		                </div>
		                <div class="form-group">
		                    <label>Salida:</label>
		                    <input type="datetime-local" id="date_init_travel" name="date_init_travel" class="form-control"/>
	                  	</div>
	                  	<div class="form-group">
	                  		<br/>
	                  		<div class="checkbox">
							  <label><input type="checkbox" value="">¿Pagado?</label>
							</div>
	                  	</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
		                    <label for="">Hasta:</label>
		                    <input type="text" name="destiny_end_travel" id="destiny_end_travel" class="form-control" />
		                </div>
		                <div class="form-group">
		                    <label>Llegada:</label>
		                    <input type="datetime-local" id="date_end_travel" name="date_end_travel" class="form-control"/>
		                </div>
					</div>
				</div>
			</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-4">
			<?php echo form_open('travel/saveComision',array('id'=>'form_travel_comision_save')); ?>
				<fieldset>
					<legend>Registro de Comisiones</legend>
					<div class="form-group">
						<label for="type_travel">Tipo de Comisión</label>
						<select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
							<option value="">Seleccionar</option>
							<?php foreach ($operator as $key => $value) {?>
								<option value="<?= $value["id"]; ?>" data-key="<?= $value["key"]; ?>"><?= $value["name"]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="type_travel">Monto</label>
						<input type="number" id="amount_travel" name="amount_travel" class="form-control" value="0"/>
					</div>
					<!--
					<div class="col-md-6">
						<div class="form-group">
							<label for="type_travel">Comisión</label>
							<input type="text" id="" name="" class="form-control" value="0"/>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="type_travel">Porcentaje</label>
							<input type="text" id="" name="" class="form-control" value="0"/>
						</div>
					</div>
					<div class="form-group">
						<label for="type_travel">Tipo de Operador</label>
						<select class="form-control">
							<option value="">Seleccionar</option>
						</select>
					</div>
					<div class="form-group">
							<label for="type_travel">Incentivo</label>
							<input type="text" id="" name="" class="form-control" value="0"/>
						</div>
					-->
				</fieldset>
				<button id="btn_save_com" type="button" class="btn btn-primary" >Agregar Comisión</button>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-8">
			<form>
				<fieldset>
					<legend>Total de Servicios</legend>
					<table id="table_customer_travel" class="table table-hover table-bordered" >
						<thead>
							<tr>
								<th class="col-md-3"><center>Código</center></th>
								<th class="col-md-3"><center>Comisión</center></th>
								<th class="col-md-3"><center>Porcentaje</center></th>
								<th class="col-md-3"><center>Operador</center></th>
								<th class="col-md-3"><center>Incentivo</center></th>
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
					<button type="button" class="btn btn-primary" >Guardar Viaje</button>
					<button type="button" class="btn btn-primary" >Nuevo Viaje</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#search_value").on('input', function () {
		   travel.setCustomerFilter();
		});

		$("#btn_save_com").click(function(){
			travel.addComision();
		});

	});
</script>
<?php $this->load->view("partial/footer"); ?>