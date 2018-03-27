var payment = function () {
	var self = {
		list_payment : []
	};

	self.changeTypePay = function(){
		var key = $( "#payment_type_id option:selected" ).attr("data-key");
		if(key === "cuotas"){
			$(".cuotas").show();
			$(".tarjeta").hide();
		}else if(key === "tarjeta"){
			$(".cuotas").hide();
			$(".tarjeta").show();
		}
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
            		html += "<td><center><input type='checkbox' id='ck_pay_"+ self.list_payment[i].id +"' onclick='payment.addCkPay("+ self.list_payment[i].id +", "+ i +");'/></center></td>";
	                html += "<td><center>"+ self.list_payment[i].code +"</center></td>";
	                html += "<td><center>"+ customer +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].name +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].destiny_origin +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].destiny_end +"</center></td>";
	                html += "<td></td>";
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

	self.addCkPay = function(idObj,index){
		var current = self.list_payment[index];
		current.check = $("#ck_pay_"+idObj).prop("checked");
		self.list_payment[index] = current;
	};

	self.openModalPay = function(){
		$("#modal_add_pay").modal("show");
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
						<td colspan="3">
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
							html += `<tr>
										<td></td>
										<td><center>`+ data_travel.comisiones[j].name +`</center></td>
										<td style="text-align:right;">`+ parseFloat(data_travel.comisiones[j].ammount).toFixed(2) +`</td>
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

	return self;
}(jQuery);