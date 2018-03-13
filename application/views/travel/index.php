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
	<?php 
		echo form_open('travel/suggest',array('id'=>'form_travel_search','class' => 'form-inline'));
	?>
	<div class="form-group">
		<label for="search_value">Ingresar Cliente:</label>
		<input type="text" class="form-control" id="search_value" onkeyup="travel.suggest(this);" style="width: 600px;"
			   list="list_travel_search" autocomplete="off"/>
		<datalist id="list_travel_search"></datalist>
	</div>
	<a href="#" class="btn btn-primary" title="" data-toggle="modal" data-target="#modal_customer">
		Nuevo Cliente
	</a>
	<a href="#" class="btn btn-primary" title="" data-toggle="modal" data-target="#modal_travel">
		Registrar Viaje
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
				<td colspan="6">
					<center>
						No se registraron datos.
					</center>
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
		travel.current_url = '<?php echo base_url();?>';
		//OBTENER CLIENTE POR FILTRO
		$("#search_value").on('input', function () {
		   travel.setCustomerFilter();
		});

		//VALIDANDO FORMULARIO DE CLIENTES
		$('#form_customer_register').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                person_id: {
                    validators: {
                        notEmpty: { message: "El campo documento es requerido."}
                    }
                },
                first_name: {
                    validators: {
                        notEmpty: { message: "El campo nombres es requerido."}
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: { message: "El campo apellidos es requerido."}
                    }
                },
                email: {
                    validators: {
                        notEmpty: { message: "El campo email es requerido."}
                    }
                },
                phone_number: {
                    validators: {
                        notEmpty: { message: "El campo teléfono es requerido."}
                    }
                },
                address_1: {
                    validators: {
                        notEmpty: { message: "El campo dirección es requerido."}
                    }
                },
                passport: {
                    validators: {
                        notEmpty: { message: "El campo pasaporte es requerido."}
                    }
                },
                date_expire: {
                    validators: {
                        notEmpty: { message: "El campo fecha de expiración es requerido."}
                    }
                },
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            var data = {};
            data.passport = $("#passport").val();
            data.date_expire = $("#date_expire").val();
            $("#data_customer").val(JSON.stringify(data));
            $.ajax({
                type:"POST",
                url:$("#form_customer_register").attr('action'),
                data:$("#form_customer_register").serialize(),
                success:function(response){
                	console.log(response);
                	var data = JSON.parse(response);
                	if(data.success){
                		getMessages("messages",data.message,'success');
                	}
                }
            });
	   	});

		//VALIDANDO FORMULARIO DE VUELOS
		$('#form_travel_register').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                code_travel: {
                    validators: {
                        notEmpty: { message: "El campo código es requerido."}
                    }
                },
                name_travel: {
                    validators: {
                        notEmpty: { message: "El campo nombre es requerido."}
                    }
                },
                destiny_origin_travel: {
                    validators: {
                        notEmpty: { message: "El campo desde es requerido."}
                    }
                },
                destiny_end_travel: {
                    validators: {
                        notEmpty: { message: "El campo hasta es requerido."}
                    }
                },
                date_init_travel: {
                    validators: {
                        notEmpty: { message: "El campo salida es requerido."}
                    }
                },
                date_end_travel: {
                    validators: {
                        notEmpty: { message: "El campo llegada es requerido."}
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:$("#form_travel_register").attr('action'),
                data:$("#form_travel_register").serialize(),
                success:function(response){
                	console.log(response);
                }
            });
	   });
	});
</script>
<?php $this->load->view("travel/modal"); ?>
<?php $this->load->view("partial/footer"); ?>