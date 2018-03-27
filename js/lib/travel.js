var travel = function () {

    var self = {
        current_url : "",
        list_customer : [],
        list_comision : [],
        last_travel : '',
        last_list_comision: []
    };

    self.changeRow = function(idObj){
    	var open = $("#row_travel_"+idObj).is(':visible');
    	if(!open){
    		$("#row_travel_"+idObj).show();
    		$("#row_open_"+idObj).html('<i class="fa fa-angle-down"></i>');
    	}else{
    		$("#row_travel_"+idObj).hide();
    		$("#row_open_"+idObj).html('<i class="fa fa-angle-right"></i>');
    	}
    };

    self.setCustomerFilter = function(){
        var val = $('#search_value').val();
       var current = $('#list_travel_search').find('option[value="'+val+'"]').data('id');
       if(current !== null){
        $.ajax({
            type:"POST",
            data:{
                "person_id" : current
            },
            url: travel.current_url + "index.php/travel/info",
            success:function(response){
                var data = JSON.parse(response);
                console.log(data);
                if(data.success){
                    self.list_customer.push(data.data);
                    self.populateTable();
                }
            }
        });
       }
    };

    self.getSolicitud = function(){
       var key = $('#code_travel_search').val();
       if(key !== null){
        $.ajax({
            type:"POST",
            data:$("#form_travel_code_search").serialize(),
            url: $("#form_travel_code_search").attr("action"),
            success:function(response){
                var data = JSON.parse(response);
                var data_travel = JSON.parse(data.data);
                $('#destiny_origin_travel').val(data.destiny_origin);
                $('#destiny_end_travel').val(data.destiny_end);
                $('#name_travel').val(data.name);
                $('#customer_document').val(data.customer_id);
                $('#customer_name').val(data.first_name + ' ' + data.last_name);
                $('#customer_address').text(data.address_1);
                document.getElementById("date_init_travel").value = data.date_init.replace(" ","T");
                document.getElementById("date_end_travel").value = data.date_end.replace(" ","T");
                self.list_comision = [];
                if(data_travel.hasOwnProperty("comisiones")){
                    self.list_comision = data_travel.comisiones;
                    self.makeTableComision();
                }
            }
        });
       }
    };

    self.populateTable = function(){
        var html = "";
        if(self.list_customer.length > 0){
            $("#table_customer_travel tbody").empty();
            for (var i = 0; i < self.list_customer.length; i++) {
                $('#customer_id').val(self.list_customer[i].person_id);
                $('#customer_document').val(self.list_customer[i].person_id);
                $('#customer_name').val(self.list_customer[i].first_name + " " + self.list_customer[i].last_name);
                $('#customer_address').text(self.list_customer[i].address_1);
            }
        }else{
            $("#table_customer_travel tbody").empty();
            html += `<tr>
                        <td colspan="6">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
            $("#table_customer_travel tbody").append(html);
        }
    };

    self.getOption = function(idObj,index){
        var html = "";
        html = `<center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:void(0);" onclick="travel.removeCustomer(`+ idObj +`,`+ index +`)" >Remover</a></li>
                            <li><a href="javascript:void(0);" onclick="travel.openModalCustomer(`+ idObj +`)">Viajes</a></li>
                        </ul>
                    </div>
                </center>`;
        return html;
    };

    self.saveDetailTravel = function(idObj){
        $.ajax({
            url: travel.current_url + "index.php/travel/updateCustomer/" + idObj,
            type: "POST",
            data: $("#frm_travel_customer_detail_" + idObj).serialize(),
            success: function(response){
                console.log(response);
            }
        });
    };

    self.registerTravel = function(){
        //ID DEL CLIENTE
        customer_document = $('#customer_document').val();
        //DATOS DEL VIAJE
        code_travel = $('#code_travel').val();
        name_travel = $('#name_travel').val();
        //DESTINOS DE VIAJE
        destiny_origin_travel = $('#destiny_origin_travel').val();
        destiny_end_travel = $('#destiny_end_travel').val();
        //FECHAS DE SALIDA
        date_init_travel = $("#date_init_travel").val();
        date_end_travel = $("#date_end_travel").val();
        //TIPO DE VIAJE
        type_travel = $('#type_travel').val();
        data = { 
            'data': travel.list_comision, 
            'customer_document': customer_document,
            'code_travel': code_travel,
            'name_travel': name_travel,
            'destiny_origin_travel': destiny_origin_travel,
            'destiny_end_travel': destiny_end_travel,
            'date_init': date_init_travel,
            'date_end': date_end_travel,
            'type_travel': type_travel
        };
        $.ajax({
            url: travel.current_url + "index.php/travel/registerTravel/",
            type: "POST",
            data: data,
            success: function(response){
                var data = JSON.parse(response);
                if(!data.success){
                    $(".messages_modal").text("Ha ocurrido un error");
                }
                // $("#modal_success").modal("show");
                travel.showLastRegisterTravel(data.travel);
                $('#showLastTravel').show();
            }
        })
    };

    self.showLastRegisterTravel = function(travel){
        self.last_travel = travel;
        self.last_list_comision = self.list_comision;
        self.list_comision = [];
        $('input').val('');
        $('input[type="datetime-local"').val('');
        self.makeTableComision();
        self.setTravelCode();
    };

    self.showLastTravel = function(){
        if(self.last_travel != ''){
            $.ajax({
                url: travel.current_url + "index.php/travel/getLastTravelInfo/",
                type: "POST",
                data: { 
                    'travel_id' : self.last_travel
                },
                success: function(response){
                    console.log(response);
                    ///////////////////
                    var data = JSON.parse(response);
                    ////info cliente
                    $('#customer_document').val(data.person_id);
                    $('#customer_name').val(data.first_name + ' ' + data.last_name);
                    $('#customer_address').val(data.customer_address);


                    $('#code_travel').val(data.code);
                    $('#name_travel').val(data.name);
                    $('#destiny_origin_travel').val(data.destiny_origin);
                    $('#destiny_end_travel').val(data.destiny_end);
                    $('#date_init_travel').val(data.date_init.replace(' ','T').replace(':00', ''));
                    $('#date_end_travel').val(data.date_end.replace(' ','T').replace(':00', ''));
                    $('#type_travel').val(data.type_travel);

                    self.list_comision = self.last_list_comision;
                    self.makeTableComision();
                }
            })  
        }
        
    }

    self.suggest = function(obj){
        var value = obj.value || '';
        if(value.length > 3){
            $.ajax({
                url: $("#form_travel_search").attr('action'),
                type: "POST",
                data: { 
                    'key' : value
                },
                success: function(response){
                    var data = JSON.parse(response);
                    if(data.success){
                        $("#list_travel_search").empty();
                        for (var i = 0; i < data.data.length; i++) {
                            var opt = $("<option></option>").attr("value", data.data[i].value).attr("data-id",data.data[i].person_id);
                            $("#list_travel_search").append(opt);
                        }
                    }
                }
            });
        }
    };

    self.removeCustomer = function(idObj,index){
        self.list_customer.splice(index,1);
        self.populateTable();
    };

    self.openModalCustomer = function(idObj){
        $("#modal_travel").modal("show");
    };

    self.search = function(obj){
        var value = obj.value || '';
        if(value.length > 3){
           $.ajax({
                url: $("#form_travel_search").attr('action'),
                type: "POST",
                data: { 
                    'key' : value
                },
                success: function(data){
                    console.log(data);
                    data = JSON.parse(data);
                    names = [];
                    dnis = [];
                    items = '';
                    console.log(data.length);

                    for (var i = 0; i < data.length ; i++) {
                        names[i] = data[i].first_name + ' ' + data[i].last_name;
                        dnis[i] = data[i].person_id;
                        items += "<span onclick='travel.fillTable(this)' dni='"+data[i].person_id+"' fullname='"+names[i]+"' class='form-control item' style='float:left; clear:left;width: 600px;'>"+ names[i] +"</span>";

                    }
                    $('#result').html(items);
                }

            }) 
        }
        
    };

    self.fillTable = function(obj){
        var row = '';
        row += '<tr>';
        row += '<td>';
        row += '<center><a id="row_open_1" href="javascript:void(0);" title="Agregar Detalles" onclick="travel.changeRow(1);"><i class="fa fa-angle-right"></i></a></center>';
        row += '</td>';
        row += '<td>'+ obj.getAttribute('dni') +'</td>';
        row += '<td>'+ obj.getAttribute('fullname') +'</td>';
        row += '<td>valor_random</td>';
        row += '<td>valor_random</td>';
        row += '<td>';
        row += '<center>';
        row += '<div class="btn-group">';
        row += '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">';
        row += '<span class="caret"></span>';
        row += '<span class="sr-only">Toggle Dropdown</span>';
        row += '</button>';
        row += '<ul class="dropdown-menu" role="menu">';
        row += '<li><a href="javascript:void(0);">Remover</a></li>';
        row += '<li><a href="javascript:void(0);">Agregar Comisiones</a></li>';
        row += '<li><a href="javascript:void(0);">Agregar Vuelos</a></li>';
        row += '</ul>';
        row += '</div>';
        row += '</center>';
        row += '</td>';
        row += '</tr>;';

        $('.table.table-hover.table-bordered').append(row);
        $('#result').html('');
    }

        self.addComision = function(val = null){
        var data = {};
        data.key = $("#cbo_comision_payment option:selected").attr("data-key");
        data.name = $("#cbo_comision_payment option:selected").text();
        data.ammount = $("#amount_travel").val();

        if(val === 'fee'){
            data.key = 'fee';
            data.name = 'FEE';
            data.ammount = 0;
        }
        if(parseInt(data.ammount) === 0 && data.name != 'FEE'){
            $(".error_comision").text("El monto no puede ser cero");
            $(".error_comision").show().delay(1000).fadeOut();
        }else{
            $(".error_comision").hide();
            self.list_comision.push(data);
            self.makeTableComision();
        }
    };

    self.makeTableComision = function(){
        var html = '';
        $("#table_customer_travel tbody").empty();
        if(self.list_comision.length === 0){
            html = `<tr>
                        <td colspan="5">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }else{
            for (var i = 0; i < self.list_comision.length; i++) {
                html += "<tr>";
                    html += "<td><center>"+ (i+1) +"</center></td>";
                    html += "<td><center>"+ self.list_comision[i].name +"</center></td>";
                    if(self.list_comision[i].name !== 'FEE'){
                        html += "<td style='text-align: right;'>"+ self.list_comision[i].ammount +"</td>";    
                    }else{
                        html += "<td style='text-align: right;'>"+ '<input type="text" name="amount" size="8">' +"</td>";    
                    }
                    
                    html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComision(`+ i +`)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                    html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Agregar Detalle' onclick='travel.openComisionDetail(`+ i +`)' >
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>";
            }
        }
        $("#table_customer_travel tbody").append(html);
    };

    self.showRow = function(row){
        $("#row_" + row).removeClass("hidden");
        $("#row_" + row).addClass("block");
    };

    self.openComisionDetail = function(row){
        document.getElementById("form_travel_comision_update").reset();
        $("#comision_obj_id").val(row);
        $("#modal_detail_comision").modal("show");
        data = travel.list_comision[row];
        
        ////rellanar campos
        $('#comision_code').val(data.comision_code);
        $('#monto_detalle').val(data.monto_detalle);
        $('#fee_servicio').val(data.fee_servicio);
        $('#nombre_ruc').val(data.nombre_ruc);
        $('#dni_ruc').val(data.dni_ruc);
        $('#direccion_fiscal').val(data.direccion_fiscal);
        $('#tipo_doc').val(data.tipo_doc);
        $('#comision_fee[value="'+data.comision_fee+'"]').prop('checked',true)
        $('#comision_percentage').val(data.comision_percentage);
        $('#acumula_millas').val(data.acumula_millas);
        $('#tipo_tarjeta_milla').val(data.tipo_tarjeta_milla);
        $('#nro_tarjeta_milla').val(data.nro_tarjeta_milla);
        $('#incentivos_turifax').val(data.comision_incentive_turifax);
        $('#incentivos_otros').val(data.comision_incentive_otros);
        $('#comision_code').val(data.comision_code);
        $('#comision_type_operator').val(data.comision_type_operator);
    };

    self.setTravelCode = function(){
        $.ajax({
            url: travel.current_url + "index.php/travel/getTravelCode/",
            success: function(response){
                $('#code_travel').val(response);
                $('#code_travel').attr('disabled', true);
            }
        })
    };

    self.removeComision = function(obj){
        self.list_comision.splice(obj,1);
        self.makeTableComision();
    };

    self.validateFormTravel = function(){
        $('#form_travel_save').bootstrapValidator({
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
            travel.registerTravel();
       });
    };

    self.validateFormUpdateComision = function(){
        $('#form_travel_comision_update').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                comision_code: {
                    validators: {
                        notEmpty: { message: "El campo código es requerido."}
                    }
                },
                comision_amount: {
                    validators: {
                        notEmpty: { message: "El campo comisión es requerido."}
                    }
                },
                comision_percentage: {
                    validators: {
                        notEmpty: { message: "El campo porcentaje es requerido."}
                    }
                },
                comision_type_operator: {
                    validators: {
                        notEmpty: { message: "El campo tipo de operador es requerido."}
                    }
                },
                comision_incentive: {
                    validators: {
                        notEmpty: { message: "El campo incentivo es requerido."}
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            var idObj = parseInt($("#comision_obj_id").val());
            var current = self.list_comision[idObj];
            current.comision_code = $("#comision_code").val();
            current.monto_detalle = $("#monto_detalle").val();
            current.fee_servicio = $("#fee_servicio").val();
            current.nombre_ruc = $("#nombre_ruc").val();
            current.dni_ruc = $("#dni_ruc").val();
            current.direccion_fiscal = $("#direccion_fiscal").val();
            current.tipo_doc = $("#tipo_doc").val();
            current.comision_fee = $("#comision_fee:checked").val();
            current.comision_percentage = $("#comision_percentage").val();
            current.acumula_millas = $("#acumula_millas").val();
            current.tipo_tarjeta_milla = $("#tipo_tarjeta_milla").val();
            current.nro_tarjeta_milla = $("#nro_tarjeta_milla").val();
            current.comision_type_operator = $("#comision_type_operator").val();
            current.comision_incentive_turifax = $("#incentivos_turifax").val();
            current.comision_incentive_otros = $("#incentivos_otros").val();
            self.list_comision[idObj] = current;
            $('#table_customer_travel').find('tr:eq('+(idObj+1)+')').find('td:eq(2)').text($("#monto_detalle").val());

            $('.close').trigger('click');
            /* HAY QUE ENVIAR AL CONTROLADOR PARA QUE PUEDA ACTUALIZAR ESTE CAMPO DATA */
       });
    };

    self.getConfiguration = function(){
        $('#pagado').toggle(function(){
            console.log($('#pagado').is(':checked'));
            if($('#pagado').is(':checked')){
                $.ajax({
                    url: travel.current_url + "index.php/travel/getConfig",
                    type: "POST",
                    dataType: 'JSON',
                    success: function(response){
                        console.log(response);
                        $('#customer_document').val(response[0].value);
                        $('#customer_name').val(response[1].value);
                        $('#customer_address').text(response[2].value);
                    }
                });
            }

        })
    };


    self.openModalCustomer = function(){
        document.getElementById("form_customer_register").reset();
        $("#modal_customer").modal("show");
    };

    self.saveCustomer = function(){
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
    };

	return self;
}(jQuery);
