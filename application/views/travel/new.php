<?php $this->load->view("partial/header"); ?>
<div id="title_bar">
	<div id="title" class="float_left">
		Módulo de Viajes
	</div>
</div>
<div class="row">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<?php echo form_open('travel/suggest',array('id'=>'form_travel_search','class' => 'form-inline')); ?>
					<div class="form-group">
						<input type="text" class="form-control" id="search_value" onkeyup="travel.suggest(this);"list="list_travel_search"  autocomplete="off" placeholder="Buscar Cliente" />
						<datalist id="list_travel_search"></datalist>
					</div>
					<button type="button" class="btn btn-primary">Nuevo Cliente</button>
				<?php echo form_close(); ?>
				<br/>
				<form id="form_customer_data" role="form">
					<fieldset>
						<legend>Datos del Cliente</legend>
						<div class="form-group">
							<label>Nro. Documento</label>
							<input type="text" name="" value="" placeholder="" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Cliente</label>
							<input type="text" name="" value="" placeholder="" class="form-control"/>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("partial/footer"); ?>