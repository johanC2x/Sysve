var payment = function () {
	var self = {
		current_url : "",
		list_payment : [],
		data_payment : {
			cuotas : []
		},
		list_cuotas : [
			{
				amount : 0,
				payment : false
			}
		],
		state_pay : true,
		current : {}
	};

	self.changeTypePay = function(){
		var key = $( "#payment_type_id option:selected" ).attr("data-key");
		$(".card").prop("checked",false);
		if(key === "cuotas"){
			$(".cuotas").show();
			$(".tarjeta").hide();
			$("#table_payment_cuota").show();
		}else if(key === "tarjeta"){
			$(".cuotas").hide();
			$(".tarjeta").show();
			$("#table_payment_cuota").hide();
		}else{
			$(".cuotas").hide();
			$(".tarjeta").hide();
			$("#table_payment_cuota").hide();
		}
	};

	self.makeCuota = function(){
		var html = '';
		if(self.list_cuotas.length > 0){
			$("#table_payment_cuota tbody").empty();
			for (var i = 0; i < self.list_cuotas.length; i++) {
				var check = (self.list_cuotas[i].payment) ? "checked":"";
				html += `<tr>
	                        <td>
	                        	<div class="form-group">
									<input type="number" id="amount_`+i+`" name="amount_`+i+`" class="form-control" placeholder="Monto" 
								 		onchange="payment.changeInputCuota(`+i+`);" value="`+ self.list_cuotas[i].amount +`"/>
								</div>
	                        </td>
	                        <td>
	                        	<div class="form-group">
									<center>
										<input class="card" type="checkbox" id="payment_`+i+`" name="payment_`+i+`" `+ check +` onchange="payment.changeInputCuota(`+i+`);">
									</center>
								</div>
	                        </td>
	                        <td>
	                        	<center>
									<button class="btn btn-primary" type="button" onclick="payment.addPayCuota()" >Agregar +</button>
	                        	</center>
	                        </td>
	                    </tr>`;
			}
			$("#table_payment_cuota tbody").append(html);
		}
	};

	self.changeInputCuota = function(obj){
		var data = {};
		data.amount = $("#amount_"+obj).val();
		data.payment = $("#payment_"+obj).prop("checked");
		self.list_cuotas[obj] = data;
	};

	self.addPayCuota = function(){
		var data = {};
		data.amount = 0;
		data.payment = false;
		self.list_cuotas.push(data);
		self.makeCuota();
	};

	self.filterPayment = function(){
		$.ajax({
			type: 'POST',
			url: $("#form_travel_code_search").attr("action"),
			data: $("#form_travel_code_search").serialize(),
			success: function(response){
				var data = JSON.parse(response);
				self.list_payment = data;
				self.makeTable();
			}
		});
	};

	self.makeTable = function(){
		var html = "";
		$("#table_payment tbody").empty();
		if(self.list_payment.length > 0){
            for (var i = 0; i < self.list_payment.length; i++) {
            	var customer = self.list_payment[i].first_name + " " + self.list_payment[i].last_name;
            	html += "<tr>";
            		html += "<td><center><input type='checkbox' style='display:none;' id='ck_pay_"+ self.list_payment[i].id +"' onclick='payment.addCkPay("+ self.list_payment[i].id +", "+ i +");'/></center></td>";
	                html += "<td><center>"+ self.list_payment[i].code +"</center></td>";
	                html += "<td><center>"+ customer +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].name +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].destiny_origin +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].destiny_end +"</center></td>";
	                html += `<td>
								<a href="javascript:void(0);" title="Ver" 
								   onclick="payment.addCkPaySecond( `+ self.list_payment[i].id +`, `+ i +`)" >
									<center>
										<i class="fa fa-eye"></i>
									</center>
								</a>
							</td>
							<td>
								<a href="javascript:void(0);" title="Anular" onclick="payment.openModalPay()">
									<center>
										<i class="fa fa-trash"></i>
									</center>
								</a>
	                		 </td>`;
	            html += "</tr>";
            }
		}else{
            html += `<tr>
                        <td colspan="7">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
		}
		$("#table_payment tbody").append(html);
	};

	self.addCkPaySecond = function(idObj,index){
		self.current = self.list_payment[index];		
		if(self.current.code !== ""){
			self.getPayment(self.current.code);
			self.getPaymentData(self.current.code);
		}
		$("#ck_pay_"+idObj).prop("checked",true);
		self.current.check = $("#ck_pay_"+idObj).prop("checked");
		self.list_payment[index] = self.current;
		self.changeTypePay();
		self.makeTablePay();
		$("#modal_add_pay").modal("show");
		$("#table_payment_cuota").hide();
	};

	self.addCkPay = function(idObj,index){
		self.current = self.list_payment[index];		
		if(self.current.code !== ""){
			self.getPayment(self.current.code);
			self.getPaymentData(self.current.code);
		}
		self.current.check = $("#ck_pay_"+idObj).prop("checked");
		self.list_payment[index] = self.current;
	};

	self.getPayment = function(code){
		 $.ajax({
            type:"POST",
            data:{
                "code" : code
            },
            url: self.current_url + "index.php/travel/getByCode",
            success:function(response){
            	var data = JSON.parse(response);
            	if(data.success){
            		$("#payment_type_id").val(data.data.payment_type_id);
            		$("#dscto").val(data.data.dscto);
            		$("#dscto_type_id").val(data.data.dscto_type_id);
            		$("#total").val(data.data.total);
            	}
            }
        });
	};

	self.getPaymentData = function(code){
		 $.ajax({
            type:"POST",
            data:{
                "code" : code
            },
            url: self.current_url + "index.php/travel/getPayByCode",
            success:function(response){
            	if(response){
            		var data = JSON.parse(response);
            		if(Object.keys(data).length !== 0){
            			if(data.hasOwnProperty("cuotas_type")){
            				$(".cuotas").show();
            				$("#cuotas").val(data.cuotas_type.cuotas);
            				$("#cbo_type_cuotas").val(data.cuotas_type.type);
            			}else{
            				$(".cuotas").hide();
            			}
            			self.list_cuotas = [];
            			self.list_cuotas = data.cuotas;
            			self.makeCuota();
            		}
            	}
            }
        });
	};



	self.openModalPay = function(){
		$("#modal_add_pay").modal("show");
		$("#table_payment_cuota").hide();
		self.changeTypePay();
		self.makeTablePay();
	};

	self.openModalPayent = function(idObj,index){
		$("#modal_add_pay").modal("show");
		self.addCkPay(idObj,index);
		self.makeTablePay();
	};

	self.makeTablePay = function(){
		var html = '';
		var total = 0;
		var travels = '';
		$("#table_payment_detail tbody").empty();
		if(self.list_payment.length > 0){
			var customer = self.list_payment[0].first_name + " " + self.list_payment[0].last_name;
			html += `<tr>
						<td colspan="4">
							<form role="form">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" disabled="true"
												value="`+ self.list_payment[0].code +`">
										</div>			
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" disabled="true"
												value="`+ self.list_payment[0].name +`">
										</div>			
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" disabled="true"
												value="`+ customer +`">
										</div>	
									</div>
								</div>
							</form>
						</td>
					</tr>`;
			for (var i = 0; i < self.list_payment.length; i++) {
				if(self.list_payment[i].hasOwnProperty("data") && self.list_payment[i].hasOwnProperty("check") && self.list_payment[i].check){
					var data_travel = JSON.parse(self.list_payment[i].data);
					travels += self.list_payment[i].travel_id + ',';
					if(data_travel.comisiones.length > 0 && data_travel.hasOwnProperty("comisiones")){
						for (var j = 0; j < data_travel.comisiones.length; j++) {
							total += parseFloat(data_travel.comisiones[j].ammount);
							var code = 'SIN CODIGO';
							var tipo_doc = 'S/D';
							if(data_travel.comisiones[j].comision_code !== '' && data_travel.comisiones[j].comision_code !== undefined){
								code = data_travel.comisiones[j].comision_code;
							}
							if(data_travel.comisiones[j].tipo_doc !== '' && data_travel.comisiones[j].tipo_doc !== undefined){
								tipo_doc = data_travel.comisiones[j].tipo_doc;
							}
							html += `<tr>
										<td><center>`+ code +`</center></td>
										<td><center>`+ data_travel.comisiones[j].name +`</center></td>
										<td style="text-align:right;">`+ parseFloat(data_travel.comisiones[j].ammount).toFixed(2) +`</td>
										<td><center>`+ tipo_doc +`</center></td>
									</tr>`;
						}
					}
				}
			}
		}else{
			html += `<tr>
                        <td colspan="3">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
		}
		$(".total_pay").text(total.toFixed(2));
		$("#total").val(total.toFixed(2));
		$("#travels").val(travels);
		$("#table_payment_detail tbody").append(html);
	};

	self.savePayment = function(){
		$('#form_save_payment').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                dscto_type_id: {
                    validators: {
                        notEmpty: { message: "El campo tipo de descuento es requerido."}
                    }
                },
                dscto: {
                    validators: {
                        notEmpty: { message: "El campo descuento es requerido."}
                    }
                },
                payment_type_id: {
                	validators: {
                        notEmpty: { message: "El campo tipo de pago es requerido."}
                    }
                },
                total:{
                	validators: {
                        notEmpty: { message: "El campo total es requerido."}
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            self.state_pay = true;
            if($("#payment_type_id option:selected").attr("data-key") === 'cuotas'){
            	var data_cuota = {};
            	data_cuota.cuotas = $("#cuotas").val();
            	data_cuota.type = $("#cbo_type_cuotas").val();
            	self.data_payment.cuotas = self.list_cuotas;
            	self.data_payment.cuotas_type = data_cuota;
            	var obj_error_pay = self.list_cuotas.find(x => x.payment == false);
            	self.state_pay = (obj_error_pay === undefined) ? true : false;
            }
            $("#data").val(JSON.stringify(self.data_payment));
            $("#state_pay").val(self.state_pay);
            $.ajax({
				type: 'POST',
				url: $("#form_save_payment").attr("action"),
				data: $("#form_save_payment").serialize(),
				success:function(response){
					var data = JSON.parse(response);
					if(data.success){
						$("#modal_success").modal("show");
					}else{
						$(".messages_modal").text("Ha ocurrido un error");
					}
				}
			});
        });
	};

	return self;
}(jQuery);