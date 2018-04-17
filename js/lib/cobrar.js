var cobrar = function () {
	var self = {
		current_url : "",
		list_payment : [],
		data_payment : {
			cuotas : []
		}
	};

	self.getViajes = function(){
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

	self.borrarRegistro = function(i){
		$('#id_borrar').val(i);
	};

	self.addCkPay = function(idObj,index){
		var current = self.list_payment[index];
		current.check = $("#ck_pay_"+idObj).prop("checked");
		self.list_payment[index] = current;
	};

	self.borrarViajes = function(){
		id_borrar = $('#id_borrar').val();
		$.ajax({
            type:"POST",
            data:{
                "id" : id_borrar
            },
            url: cobrar.current_url + "index.php/travel/anular",
            success : function(aata){
                // var data = JSON.parse(response);
                console.log(data);
                // if(data.success){
                //     self.list_customer.push(data.data);
                //     self.populateTable();
                // }
            }
        });
	}


	self.makeTable = function(){
		var html = "";
		$("#table_payment tbody").empty();
		if(self.list_payment.length > 0){
            for (var i = 0; i < self.list_payment.length; i++) {
            	var customer = self.list_payment[i].first_name + " " + self.list_payment[i].last_name;
            	html += "<tr>";
            		html += "<td><center><input type='checkbox' id='ck_pay_"+ self.list_payment[i].id +"' onclick='cobrar.addCkPay("+ self.list_payment[i].id +", "+ i +");'/></center></td>";
	                html += "<td><center>"+ self.list_payment[i].code +"</center></td>";
	                html += "<td><center>"+ customer +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].name +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].destiny_origin +"</center></td>";
	                html += "<td><center>"+ self.list_payment[i].destiny_end +"</center></td>";
	                html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Agregar Detalle' onclick='cobrar.borrarRegistro(`+ self.list_payment[i].id +`)' >
                                        <i class="fa fa-trash" data-toggle="modal" data-target="#myModal"></i>
                                    </a>
                                </center>
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

	return self;
}(jQuery);