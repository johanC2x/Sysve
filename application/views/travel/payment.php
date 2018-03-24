<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/payment.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<!-- FORM FOR SEARCH ORDER -->
<div class="row">
	<div class="col-md-12">
		<?php echo form_open('travel/searchTravel',array('id'=>'form_travel_code_search','class' => 'form-inline')); ?>
			<fieldset>
				<div class="form-group">
					<input type="text" class="form-control" id="code_travel" name="code_travel" placeholder="Ingresar Código" size="15" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="document_travel" name="document_travel" placeholder="Ingresar documento" size="20" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="customer_travel" name="customer_travel" placeholder="Ingresar Cliente" size="40" />
				</div>
				<button type="button" class="btn btn-primary" onclick="payment.filterPayment()">Buscar</button>
			</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

	});
</script>
<?php $this->load->view("partial/footer"); ?>