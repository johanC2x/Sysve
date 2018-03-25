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
				<button type="button" class="btn btn-primary" onclick="payment.openModalPay()">Agregar Pago</button>
			</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>
<br/><br/>
<div class="row">
	<div class="col-md-12">
		<table id="table_payment" class="table table-hover table-bordered" >
			<thead>
				<tr>
					<th class="col-md-1"></th>
					<th class="col-md-1"><center>Código.</center></th>
					<th class="col-md-3"><center>Cliente</center></th>
					<th class="col-md-2"><center>Viaje</center></th>
					<th class="col-md-2"><center>Origen</center></th>
					<th class="col-md-2"><center>Destino</center></th>
					<th class="col-md-1"><center>Acción</center></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="7">
						<center>
							No se registraron datos.
						</center>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="modal_add_pay" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title messages_modal">Agregar Pagos</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<table id="table_payment_detail" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th><center>Código</center></th>
									<th><center>Comisión</center></th>
									<th><center>Monto</center></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td style="text-align:right;" colspan="2"><b>TOTAL</b></td>
									<td style="text-align:right;font-weight:bold;" class="total_pay"><b>0.00</b></td>
								</tr>
							</tfoot>
							<tbody>
								<tr>
			                        <td colspan="3">
			                            <center>
			                                No se registraron datos.
			                            </center>
			                        </td>
			                    </tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<?php echo form_open('travel/savePayment',array('id'=>'form_save_payment')); ?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="comision_code">Tipo de Dscto.</label>
										<select id="dscto_type_id" name="dscto_type_id" class="form-control">
											<option value="">Seleccionar</option>
											<?php if(sizeof($type_dscto_payment) > 0){ ?>
												<?php foreach($type_dscto_payment as $key => $value) { ?>
													<option value="<?= $value["id"]; ?>">
														<?= $value["name"]; ?>
													</option>
												<?php } ?>
											<?php } ?>
										</select>
										<input type="hidden" id="travels" name="travels">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="comision_code">Dsto.</label>
										<input type="number" id="dscto" name="dscto" class="form-control"
											   value="0.00" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="comision_code">Tipo de Pago.</label>
										<select id="payment_type_id" name="payment_type_id" class="form-control">
											<option value="">Seleccionar</option>
											<?php if(sizeof($payment_type) > 0){ ?>
												<?php foreach($payment_type as $key => $value) { ?>
													<option value="<?= $value["id"]; ?>" data-key="<?= $value["key"]; ?>">
														<?= $value["name"]; ?>
													</option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-6 cuotas">
									<div class="form-group">
										<label for="comision_code">Cuotas</label>
										<input type="text" id="cuotas" name="cuotas" class="form-control" disabled="true" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="comision_code">Monto</label>
										<input type="text" id="total" name="total" class="form-control"/>
									</div>
								</div>
							</div>
							<div id="messages"></div>
							<button type="button" class="btn btn-primary btn_save_pay">Pagar</button>
							<button type="button" class="btn" data-dismiss="modal">Cancelar</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#payment_type_id").change(function() {
			payment.changeTypePay();
		});
		
		$(".btn_save_pay").click(function() {
			$.ajax({
				type: 'POST',
				url: $("#form_save_payment").attr("action"),
				data: $("#form_save_payment").serialize(),
				success:function(response){
					console.log(response);
				}
			});
		});

		$("#dscto").change(function(){
			if(parseInt($(this).val()) !== 0){
				if(parseFloat($(this).val()) > parseFloat($("#total").val())){
					var messages = `<div class="alert alert-danger alert-dismissible fade in">
									   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   El descuento no puede ser mayor al monto
									 </div>`;
					$("#messages").html(messages);
				}else{
					var total = parseFloat($("#total").val()) - parseFloat($(this).val());
					$("#total")	.val(parseFloat(total).toFixed(2));
				}
			}
		});
	});
</script>
<?php $this->load->view("partial/footer"); ?>