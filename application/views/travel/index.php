<?php $this->load->view("partial/header"); ?>
<div id="title_bar">
	<div id="title" class="float_left">
		Módulo de Viajes
	</div>
</div>

<div id="table_holder">
	<h4><u>Datos del Viaje</u></h4>
</div>
<div id="table_action_header">
	<?php 
		echo form_open('travel/suggest',array('id'=>'form_travel_search','class' => 'form-inline'));
	?>
	<div class="form-group">
		<label for="search_value">Ingresar Cliente:</label>
		<input type="text" class="form-control" id="search_value" onkeyup="travel.suggest(this);" style="width: 600px;"
			   list="list_travel_search" autocomplete="off"/>
		<datalist id="list_travel_search"></datalist>
	</div>
	<button type="submit" class="btn btn-primary">Buscar Cliente</button>
	<a href="javascript:void(0);" class="btn btn-primary" title="">
		Nuevo Viaje
	</a>
	<a href="javascript:void(0);" class="btn btn-primary" title="" data-toggle="modal" data-target="#myModal">
		Nuevo Cliente
	</a>
	<?php 
		echo form_close();
	 ?>
</div>
<div id="table_holder">
	<table id="table_customer_travel" class="table table-hover table-bordered" >
		<thead>
			<tr>
				<th class="col-md-1"></th>
				<th class="col-md-2">DNI</th>
				<th class="col-md-4">Cliente</th>
				<th class="col-md-2">Pasaporte</th>
				<th class="col-md-2">Expiración</th>
				<th class="col-md-1">Opciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<center>
						<a id="row_open_1" href="javascript:void(0);" title="Agregar Detalles" 
						   onclick="travel.changeRow(1);">
							<i class="fa fa-angle-right"></i>
						</a>
					</center>
				</td>
				<td>a</td>
				<td>a</td>
				<td>a</td>
				<td>a</td>
				<td>
					<center>
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="javascript:void(0);">Remover</a></li>
								<li><a href="javascript:void(0);">Agregar Comisiones</a></li>
								<li><a href="javascript:void(0);">Agregar Vuelos</a></li>
							</ul>
						</div>
					</center>
				</td>
			</tr>
			<tr id="row_travel_1" style="display: none;"> 
				<td colspan="6">
					<div class="row">
						<div class="col-md-12">
							<form role="form">
								<fieldset>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
												<div class="form-group">
													<label>Ventana</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Pasillo</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Millaje</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Visa</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Vacuna</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary" > Guardar </button>
									<button type="button" class="btn btn-primary" > Limpiar </button>
								</fieldset>
							</form>
						</div>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<center>
						<a id="row_open_2" href="javascript:void(0);" title="Agregar Detalles" 
						   onclick="travel.changeRow(2);">
							<i class="fa fa-angle-right"></i>
						</a>
					</center>
				</td>
				<td>a</td>
				<td>a</td>
				<td>a</td>
				<td>a</td>
				<td>
					<center>
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="javascript:void(0);">Remover</a></li>
								<li><a href="javascript:void(0);">Agregar Comisiones</a></li>
								<li><a href="javascript:void(0);">Agregar Vuelos</a></li>
							</ul>
						</div>
					</center>
				</td>
			</tr>
			<tr id="row_travel_2" style="display: none;"> 
				<td colspan="6">
					<div class="row">
						<div class="col-md-12">
							<form role="form">
								<fieldset>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
												<div class="form-group">
													<label>Ventana</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Pasillo</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Millaje</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Visa</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Vacuna</label>
													<input type="text" name="" value="" placeholder="" class="form-control">
												</div>		
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary" > Guardar </button>
									<button type="button" class="btn btn-primary" > Limpiar </button>
								</fieldset>
							</form>
						</div>
					</div>
				</td>
			</tr>

		</tbody>
	</table>
</div>
<div id="table_holder">
	<h4><u>Datos del Pago</u></h4>
	<form role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">
					<div class="form-group">
						<label>Tipo de Pago</label>
						<select id="cbo_tipo_tarjeta" class="form-control" >
							<option>Efectivo</option>
							<option>Tarjeta</option>
						</select>
					</div>
					<div class="form-group">
						<label>Total Cobrado</label>
						<input type="text" name="" value="" placeholder="" class="form-control"/>
					</div>
					
					<!-- SE MUESTRA SI EL TIPO DE PAGO ES POR TARJETA -->
					<div class="form-group con_card">
						<label>Número de Tarjeta</label>
						<input type="text" name="" value="" placeholder="" class="form-control"/>
					</div>
					<div class="form-group con_card">
						<label>Fecha de Expiración</label>
						<input type="date" id="date_5" name="date_5" class="date form-control" data-name="Fecha Expiración" data-type="date"/>
					</div>
					<div class="form-group con_card">
						<label>CVV</label>
						<input type="text" name="" value="" placeholder="" class="form-control"/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Tipo de Documento</label>
						<select id="cbo_tipo_tarjeta" class="form-control" >
							<option>Boleta</option>
							<option>Factura</option>
							<option>Documento de Cobranza</option>
							<option>Nota de Crédito</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tipo de Pago</label>
						<select id="cbo_tipo_tarjeta" class="form-control" >
							<option>Crédito</option>
							<option>Cuotas</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#search_value").on('input', function () {
		   var val = $('#search_value').val();
		   var current = $('#list_travel_search').find('option[value="'+val+'"]').data('id');
		   if(current !== null){
		   	$.ajax({
		   		type:"POST",
		   		data:{
		   			"person_id" : current
		   		},
		   		url:"<?php echo base_url();?>"+"index.php/travel/info",
		   		success:function(response){
		   			var data = JSON.parse(response);
		   			if(data.success){
		   				var html = "";
		   				html += "<tr>";
		   					html += `<td><a id="row_open_1" href="javascript:void(0);" title="Agregar Detalles" onclick="travel.changeRow(1);">
										<i class="fa fa-angle-right"></i>
									</a></td>`;
		   					html += "<td>"+ data.data.person_id +"</td>";
		   					html += "<td>"+ data.data.first_name + " " + data.data.last_name +"</td>";
		   					html += "<td></td>";
		   					html += "<td></td>";
		   					html += "<td></td>";
		   				html += "</tr>";
		   				$("#table_customer_travel tbody").append(html);
		   			}
		   		}
		   	});
		   }
		});
	});
</script>
<?php $this->load->view("travel/modal"); ?>
<?php $this->load->view("partial/footer"); ?>