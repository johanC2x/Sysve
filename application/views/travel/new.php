<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<?php echo form_open('travel/searchTravel',array('id'=>'form_travel_code_search','class' => 'form-inline')); ?>
				<fieldset>
					<div class="form-group">
						<input type="text" class="form-control" id="code_travel_search" placeholder="Ingresar Código" name="code_travel" />
					</div>
					<button type="button" class="btn btn-primary" onclick="travel.getSolicitud()">Buscar Solicitud</button>
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
					<!-- <button type="button" class="btn btn-primary" onclick="travel.openModalCustomer();" >
						Nuevo Cliente
					</button> -->
					<a href="<?php echo base_url();?>/index.php/customers/view/-1/width:450" class="thickbox none btn btn-primary" title="Nuevo Cliente">Nuevo Cliente</a>
					<?php 
						/*
					    $controller_name = 'customers';
					    echo anchor("$controller_name/view/-1/width:450",
					        "".$this->lang->line($controller_name.'_new')."",
					        array('class'=>'thickbox none btn btn-primary','title'=>$this->lang->line($controller_name.'_new')));
					    */
				    ?>
				</fieldset>
			<?php echo form_close(); ?>
			<br/>
			<form id="form_customer_data" role="form">
				<div class="form-group">
					<input type="text" id="customer_document" name="customer_document" class="form-control" placeholder="Ruc / Nro. Documento" disabled="true" />
					<input type="hidden" id="customer_id" name="customer_id" />
				</div>
				<div class="form-group">
					<input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Cliente / Razón Social" disabled="true"/>
				</div>
				<div class="form-group">
					<textarea id="customer_address" name="customer_address" class="form-control" placeholder="Dirección" disabled="true"></textarea>
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
					<div class="col-md-3">
						<div class="form-group">
		                    <label for="">Desde:</label>
		                    <input type="text" name="destiny_origin_travel" id="destiny_origin_travel" class="form-control" />
		                </div>
		                <div class="form-group">
		                    <label for="">Hasta:</label>
		                    <input type="text" name="destiny_end_travel" id="destiny_end_travel" class="form-control" />
		                </div>
	                  	<div class="form-group">
	                  		<br/>
	                  		<div class="checkbox">
							  <label><input id="pagado" type="checkbox" value="" onclick="travel.getConfiguration()">¿Pagado?</label>
							</div>
	                  	</div>
					</div>
					<div class="col-md-5">
		                <div class="form-group">
		                    <label>Salida:</label>
		                    <input type="datetime-local" id="date_init_travel" name="date_init_travel" class="form-control"/>
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
							<?php foreach ($property as $key => $value) {?>
								<option value="<?= $value["id"]; ?>" data-key="<?= $value["key"]; ?>"><?= $value["name"]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="type_travel">Monto</label>
						<input type="number" id="amount_travel" name="amount_travel" class="form-control"/>
					</div>
				</fieldset>
				<div class="alert alert-danger alert-dismissible error_comision">
				</div>
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
								<th class="col-md-1"><center>Nro.</center></th>
								<th class="col-md-4"><center>Servicios</center></th>
								<th class="col-md-2"><center>Monto</center></th>
								<th colspan="2" class="col-md-1"><center>Acción</center></th>
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
					<button type="button" class="btn btn-primary btn_save_travel">
						Guardar Viaje
					</button>
					<!--
					<button type="button" class="btn btn-primary" >Nuevo Viaje</button>
					-->
				</fieldset>
			</form>
			<br>
			<br>
			<button class="btn btn-primary" id="showLastTravel" onclick="travel.showLastTravel();">mostrar ultimo viaje</button>
		</div>
	</div>
</div>
<!-- MODAL DE CONFIRMACIÓN -->

<div id="modal_success" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header">
				<center>
					<h3 class="modal-title messages_modal">Operación Correcta</h3>
					<br/>
					<button type="button" class="btn btn-primary btn_success" data-dismiss="modal">Aceptar</button>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="modal_detail_comision" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title messages_modal">Detalles de Servicio</h3>
			</div>
			<div class="modal-body">
				<?php echo form_open('travel/updateDetailComision',array('id'=>'form_travel_comision_update')); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="monto_detalle">Monto de Servicio</label>
								<input type="text" id="monto_detalle" name="monto_detalle" class="form-control"> 
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="fee_servicio">Fee del servicio</label>
								<input type="text" id="fee_servicio" name="fee_servicio" class="form-control"> 
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nombre_ruc">Nombre/Razón Social</label>
								<input type="text" id="nombre_ruc" name="nombre_ruc" class="form-control"> 
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dni_ruc">DNI/RUC</label>
								<input type="text" id="dni_ruc" name="dni_ruc" class="form-control"> 
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="direccion_fiscal">Direccion</label>
								<input type="text" id="direccion_fiscal" name="direccion_fiscal" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo_doc">Tipo documento</label>
								<select id="tipo_doc" name="tipo_doc" class="form-control">
									<option value="FACTURA">FACTURA</option>
									<option value="BOLETA ">BOLETA </option>
									<option value="TICKET">TICKET</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="comision_code">Ticket/Nro de reserva</label>
								<input type="text" id="comision_code" name="comision_code" class="form-control"/>
								<input type="hidden" id="comision_obj_id" name="comision_obj_id"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="radio" id="comision_fee" name="comision_fee" value="comision" checked> Comisión
  								<input type="radio" id="comision_fee" name="comision_fee" value="fee_to_pay"> Fee por Paga
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="comision_percentage">Monto</label>
								<input type="text" id="comision_percentage" name="comision_percentage" class="form-control" value="0"/>
							</div>		
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="acumula_millas">Acumula millas?</label>
								<input type="checkbox" id="acumula_millas" name="acumula_millas" value="1">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo_tarjeta_milla">Tipo Tarjeta</label>
								<select id="tipo_tarjeta_milla" name="tipo_tarjeta_milla" class="form-control">
									<option value="VISA">VISA</option>
									<option value="MASTERCARD">MASTERCARD</option>
									<option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
									<option value="DINNERS">DINNERS</option>
									<option value="SAFETY PAY">SAFETY PAY</option>
								</select>
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nro_tarjeta_milla">Nro de tarjeta</label>
								<input type="text" id="nro_tarjeta_milla" name="nro_tarjeta_milla" class="form-control" value="0"/>
							</div>		
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="comision_type_operator">Tipo de Operador</label>
								<select id="comision_type_operator" name="comision_type_operator" class="form-control">
									<option value="">Seleccionar</option>
									<?php foreach ($operator as $key => $value) {?>
										<option value="<?= $value["id"]; ?>" data-key="<?= $value["key"]; ?>"><?= $value["name"]; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="comision_incentive">Incentivos de Turifax</label>
								<input type="number" id="incentivos_turifax" name="comision_incentive" class="form-control" value="0"/>
							</div>
						</div>
						<div class="col-md-6">
								<label for="comision_incentive">Incentivos de otro operador</label>
								<input type="number" id="incentivos_otros" name="comision_incentive" class="form-control" value="0"/>
						</div>
					</div>
					<button class="btn btn-primary btn_update_comision" type="button">
						Guardar
					</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("travel/modal"); ?>
<!-- ====================== -->
<script type="text/javascript">
	$(document).ready(function(){
		$(".error_comision").hide();
		travel.setTravelCode();
		$("#search_value").on('input', function () {
		   travel.setCustomerFilter();
		});
		$("#btn_save_com").click(function(){
			travel.addComision();
		});
		$(".btn_success").click(function(){
			location.reload();
		});
		$('.btn_save_travel').on("click", function () {
            var validator = $('#form_travel_save').data('bootstrapValidator');
			validator.validate();
			return validator.isValid();
        });
		$('.btn_update_comision').on("click", function () {
            var validator = $('#form_travel_comision_update').data('bootstrapValidator');
			validator.validate();
			return validator.isValid();
        });

		$('#showLastTravel').hide();

		travel.saveCustomer();
		//travel.addComision('fee');
		travel.validateFormTravel();
		travel.validateFormUpdateComision();
	});

</script>
<?php $this->load->view("partial/footer"); ?>