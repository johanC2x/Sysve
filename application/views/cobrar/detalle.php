<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/cobrar.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<?php echo form_open('travel/searchTravel',array('id'=>'form_travel_code_search','class' => 'form-inline')); ?>
				<fieldset>
					<div class="form-group">
						<input type="text" class="form-control" id="code_travel_search" placeholder="Ingresar Código" name="code_travel" />
					</div>
					<button type="button" class="btn btn-primary" onclick="travel.getSolicitud()">Buscar Solicitud</button>
					<a type="button" class="btn btn-primary" href="<?php echo base_url();?>/index.php/travel/payment" >Generar Cobros</a>
					
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>