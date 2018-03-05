<?php $this->load->view("partial/header"); ?>

<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<div id="title_bar">
	<div id="title" class="float_left">
		Módulo de Viajes
	</div>
</div>

<div id="table_holder">
	<h4><u>Datos del Viaje</u></h4>
</div>
<div id="table_action_header">
	<form class="form-inline" action="/action_page.php">
	  <div class="form-group">
	    <label for="email">Ingresar Cliente:</label>
	    <input type="email" class="form-control" id="name" style="width: 600px;"/>
	  </div>
	  <button type="submit" class="btn btn-primary">Buscar Cliente</button>
	  	<a href="javascript:void(0);" class="btn btn-primary" title="">
			Nuevo Viaje
		</a>
		<a href="javascript:void(0);" class="btn btn-primary" title="">
			Nuevo Cliente
		</a>
	</form>
</div>
<div id="table_holder">
	<table class="table table-hover table-bordered" >
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

<?php $this->load->view("partial/footer"); ?>