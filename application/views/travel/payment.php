<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/payment.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<!-- FORM FOR SEARCH ORDER -->
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary">
		    <div class="panel-heading">Filtros de Viajes</div>
		    <div class="panel-body">
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
					<!--
					<button type="button" class="btn btn-primary" onclick="payment.openModalPay()">Agregar Pago</button>
					-->
				</fieldset>
			<?php echo form_close(); ?>	
		    </div>
		</div>
	</div>
</div>
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
					<th class="col-md-1" colspan="2"><center>Acción</center></th>
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
									<th class="col-md-3"><center>Código</center></th>
									<th class="col-md-4"><center>Comisión</center></th>
									<th class="col-md-4"><center>Monto</center></th>
									<th class="col-md-2"><center>Comprobante</center></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td style="text-align:right;" colspan="3"><b>TOTAL</b></td>
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
											<option value="0">Ninguno</option>
											<?php if(sizeof($type_dscto_payment) > 0){ ?>
												<?php foreach($type_dscto_payment as $key => $value) { ?>
													<option value="<?= $value["id"]; ?>">
														<?= $value["name"]; ?>
													</option>
												<?php } ?>
											<?php } ?>
										</select>
										<input type="hidden" id="travels" name="travels">
										<input type="hidden" id="data" name="data">
										<input type="hidden" id="state_pay" name="state_pay">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="comision_code">Dsto.</label>
										<input type="number" id="dscto" name="dscto" class="form-control"
											   value="0.00" step="any"/>
									</div>
								</div>
								<div class="col-md-12">
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
								<div id="content_cuotas">
									<div class="col-md-4 cuotas">
										<div class="form-group">
											<input type="number" id="cuotas" name="cuotas" class="form-control" placeholder="Cuotas" />
										</div>
									</div>
									<div class="col-md-4 cuotas">
										<div class="form-group">
											<select id="cbo_type_cuotas" name="cbo_type_cuotas" class="form-control">
												<option value="">Seleccionar</option>
												<option value="1">Semanal</option>
												<option value="2">Mensual</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 cuotas">
										<button id="btn_calcular_cuota" type="button" class="btn btn-primary">
											Calcular
										</button>
									</div>
								</div>
								<div class="col-md-12">
									<table id="table_payment_cuota" class="table table-hover table-bordered">
										<thead>
											<tr>
												<th class="col-md-3"><center>Monto</center></th>
												<th class="col-md-1"><center>¿Pagado?</center></th>
												<th class="col-md-2"><center>Acción</center></th>
											</tr>
										</thead>
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
								<!-- CAMPOS PARA CUOTA -->
								<div id="content_cuota"></div>
								<!-- /CAMPOS PARA CUOTA -->

								<div class="col-md-12 tarjeta"> 
									<div class="form-group">
										<label class="checkbox-inline"><input class="card" type="checkbox" id="ck_visa" name="ck_visa" value="visa">Visa</label>
										<label class="checkbox-inline"><input class="card" type="checkbox" id="ck_masc" name="ck_masc" value="mastercard">MasterCard</label>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="total">Monto</label>
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

<div id="modal_success" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header">
				<center>
					<h3 class="modal-title messages_modal">Operación Correcta</h3>
					<br/>
					<button type="button" class="btn btn-primary btn_success" onclick="location.reload();" >Aceptar</button>
					<!-- data-dismiss="modal" -->
				</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".cuotas").hide();
		$(".tarjeta").hide();
		$("#payment_type_id").change(function() {
			payment.changeTypePay();
		});
		
		$(".btn_save_pay").on("click", function () {
			var validator = $('#form_save_payment').data('bootstrapValidator');
			validator.validate();
			return validator.isValid();
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

		$(".card").change(function(){
			if($(this).val() === "mastercard"){
				$("#ck_visa").prop("checked",false);
				$("#ck_masc").prop("checked",true);
			}else if($(this).val() === "visa"){
				$("#ck_visa").prop("checked",true);
				$("#ck_masc").prop("checked",false);
			}
			payment.data_payment.type = 'card';
			payment.data_payment.card = $(this).val();
		});

		$("#btn_calcular_cuota").click(function(){
			var cuota = $("#cuotas").val();
			var tcuota = $("#cbo_type_cuotas").val();
			var total = $("#total").val();
			var pagos = total/cuota;
			if(cuota !== 0 && tcuota !== ''){
				payment.list_cuotas = [];
				for (var i = 0; i < cuota; i++) {
					var pay = {};
					pay.amount = pagos;
					pay.payment = false;
					payment.list_cuotas.push(pay);
				}
				payment.makeCuota();
			}
		});

		/*
		$("#cuotas").change(function(){
			var cuota = $(this).val();
			if($(this).val() > 0){
				var template = '';
				for (var i = 0; i < cuota; i++) {
					template += `<div class="col-md-6">
										<div class="form-group">
											<label for="monto_cuotas"><b>Cuota `+ (i+1) +`</b> Desde</label>
											<input type="date" id="cuota_desde_`+ i +`" name="cuota_desde_`+ i +`" class="form-control" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="monto_cuotas">Hasta</label>
											<input type="date" id="cuota_hasta_`+ i +`" name="cuota_hasta_`+ i +`" class="form-control" />
										</div>
									</div>`;
				}
				payment.data_payment.type = 'cuotas';
				$("#content_cuota").html(template);
			}
		});
		*/

		$("#monto_cuotas").change(function(){
			if($(this).val() > 0 && parseFloat($("#total").val()) > parseFloat($(this).val())){
				var total = parseFloat($("#total").val()) - parseFloat($(this).val());
				$("#total").val(total);
			}
		});

		payment.savePayment();
	});
</script>
<?php $this->load->view("partial/footer"); ?>