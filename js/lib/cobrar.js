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
		$('#contenedor').html();
		$.ajax({
            type:"POST",
            url: "index.php/cobrar/info",
            type:"POST",
            data:{
                "id" : i
            },
            success:function(data){
                data = JSON.parse(data);
                console.log(data);
                info = data[0];
                cobrar.dibujarDetalle(info);
            }
        });
	};

	self.dibujarDetalle = function(data){
		//info basica
		var tabla1 = '';
		var tabla2 = '';
		var tabla3 = '';
		var estado = 'Activo';
		if(parseInt(data.status) < 1){
			estado = 'Inactivo';
		}

		tabla1+= '<fieldset><legend>Información básica</legend>';
		tabla1+= '<table border="1" style="width: 100%">';
		tabla1+= '<tr><td>Cod: '+data.code+'</td><td>Creado: '+data.created_at+'</td></tr>';
		tabla1+= '<tr><td>Origen:'+data.destiny_origin+'</td><td>Destino:'+data.destiny_end+'</td></tr>';
		tabla1+= '<tr><td>Fecha inicio'+data.date_init+'</td><td>Fecha llegada'+data.date_end+'</td></tr>';
		tabla1+= '</table>';
		tabla1+= '</fieldset>';


		//informacion de comisiones/servicios
		tabla2+= '<fieldset><legend>Información de Servicios</legend>';
		comisiones = JSON.parse(data.data_travel).comisiones;
		for (var i = comisiones.length - 1; i >= 0; i--) {
			console.log(comisiones[i]);
			tabla2+= '<table border="1" style="width: 100%">';
			tabla2+= '<tr><td colspan="3">'+comisiones[i].name+'</td></tr>';
			tabla2+= '<tr><td>Apellidos:'+comisiones[i].apellidos+'</td><td>Nombres:'+comisiones[i].nombres+'</td><td>DNI/RUC:'+comisiones[i].dni_ruc+'</td></tr>';
			tabla2+= '<tr><td>Direccion:'+comisiones[i].direccion_fiscal+'</td><td>Comision:'+comisiones[i].monto_comision+'</td><td>Fee del servicio:'+comisiones[i].fee_servicio+'</td></tr>';
			tabla2+= '<tr><td>Comision Fee:'+comisiones[i].comision_fee+'</td><td>Incentivo otros:'+comisiones[i].comision_incentive_otros+'</td><td>Incentivo Turifax'+comisiones[i].comision_incentive_turifax+'</td></tr>';
			tabla2+= '<tr><td></td><td></td><td></td></tr>';
			tabla2+= '</table>';
			tabla2+= '<hr>';
		}
		tabla2+= '</fieldset>';
		hr = '<hr>';

		//informacion de cotizacion
		// cotizacion = JSON.parse(JSON.parse(data.data_cotizacion));
		// console.log(cotizacion);

		// tabla2+= '<fieldset><legend>Información de cotizacion</legend>';
		// tabla3+= '<table border="1" style="width: 100%">';
		// tabla3+= '<tr><td>DNI:'+cotizacion.datos_dni+'</td><td>Fecha de Nacimiento:'+cotizacion.fecha_nacimiento+'</td><td>'+cotizacion.nacionalidad+'</td></tr>';
		// tabla3+= '<tr><td>Nombre:'+cotizacion.nombre+' '+cotizacion.ap_paterno+' '+ cotizacion.ap_materno+'</td><td>Penombre:'+cotizacion.penombre+'</td><td>Apellido casada:'+cotizacion.ap_casada+'</td></tr>';
		// tabla3+= '<tr><td>Telefono:'+cotizacion.datos_celulares+'</td><td colspan="2">Correos:'+cotizacion.datos_emails+'</td></tr>';
		// tabla3+= '<tr><td>Datos del viaje:'+cotizacion.datos_viaje+'</td></tr>';

		
		// tabla3+= '</fieldset';
		// hr = '<hr>';

		$('#contenedor').html(tabla1+hr+tabla2+hr+tabla3);
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
                                        <i class="far fa-calendar" data-toggle="modal" data-target="#myModal"></i>
                                    </a>
                                    <a href='index.php/travel/`+self.list_payment[i].id+`' title='Agregar Detalle' onclick='cobrar.borrarRegistro(`+ self.list_payment[i].id +`)' >
                                        <i class="far fa-edit" data-toggle="modal" data-target="#myModal"></i>
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