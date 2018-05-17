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
                // var data = JSON.parse(response);
                var data = JSON.parse(response)[0];
                console.log(data);
                $('#destiny_origin_travel').val(data.destiny_origin);
                $('#destiny_end_travel').val(data.destiny_end);
                $('#name_travel').val(data.name);
                $('#customer_document').val(data.customer_id);
                $('#customer_name').val(data.first_name + ' ' + data.last_name);
                $('#customer_address').text(data.address_1);
                // document.getElementById("date_init_travel").value = data.date_init.replace(" ","T");
                // document.getElementById("date_end_travel").value = data.date_end.replace(" ","T");
                self.list_comision = [];
                if(data.hasOwnProperty("comisiones")){
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
        data_cotizacion = $('#json_cotizacion').val();
        data = { 
            'data': travel.list_comision,
            'data_cotizacion': data_cotizacion,
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
                    // $('#name_travel').val(data.name);
                    // $('#destiny_origin_travel').val(data.destiny_origin);
                    // $('#destiny_end_travel').val(data.destiny_end);
                    // $('#date_init_travel').val(data.date_init.replace(' ','T').replace(':00', ''));
                    // $('#date_end_travel').val(data.date_end.replace(' ','T').replace(':00', ''));
                    // $('#type_travel').val(data.type_travel);

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
        // if(parseInt(data.ammount) === 0){
        //     $(".error_comision").text("El monto no puede ser cero");
        //     $(".error_comision").show().delay(1000).fadeOut();
        // }else{
            $(".error_comision").hide();
            self.list_comision.push(data);
            self.makeTableComision();
            self.calcularComisiones();
        // }
    };

    self.calcularComisiones = function(){
        var suma = 0.00;
        for (var i = 0; i < self.list_comision.length; i++) {
            valor = parseFloat(self.list_comision[i].ammount) || 0;
            suma += valor;
        }
        $('#total_servicios').val(suma);
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
                    
                    html += "<td><center>"+ "" +"</center></td>";

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
        
        monto_tabla = $('#table_customer_travel').find('tr:eq('+(row+1)+')').find('td:eq(2)').text();
        monto_detalle = data.monto_detalle || monto_tabla;
        nombre_ruc = data.nombre_ruc || $('#customer_name').val();
        dni_ruc = data.dni_ruc || $('#customer_document').val();
        direccion_fiscal = data.direccion_fiscal || $('#customer_address').text();

        $('#monto_detalle').val(monto_detalle);
        $('#fee_servicio').val(data.fee_servicio);
        $('#porcentaje_cobro').val(data.porcentaje_cobro);
        $('#nombre_ruc').val(nombre_ruc);
        $('#dni_ruc').val(dni_ruc);
        $('#nombres').val(data.nombres);
        $('#apellidos').val(data.apellidos);
        $('#direccion_fiscal').val(direccion_fiscal);

        $('#comision_code').val(data.comision_code);
        $('#monto_comision').val(data.monto_comision);
        
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

    self.modalCotizacion = function(){
        // $('#muestra_cotizacion').attr('checked', false);
        if($('#muestra_cotizacion').is(':checked')){
            $('#btn_nuevo_cliente').hide()
            $('#btn_nuevo_cliente2').show();
        }else{
            $('#btn_nuevo_cliente').show();
            $('#btn_nuevo_cliente2').hide();
        }
        
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
        self.calcularComisiones();
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
            current.nombres = $("#nombres").val();
            current.apellidos = $("#apellidos").val();
            current.ammount = parseFloat($("#monto_detalle").val()) + parseFloat($('#fee_servicio').val());
            current.fee_servicio = $("#fee_servicio").val();
            current.monto_comision = $("#monto_comision").val();
            current.porcentaje_cobro = $("#porcentaje_cobro").val();
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
            if($("#monto_detalle").val() != ''){
                monto_tabla = parseFloat($("#monto_detalle").val()) + parseFloat($('#fee_servicio').val());
                $('#table_customer_travel').find('tr:eq('+(idObj+1)+')').find('td:eq(2)').text(monto_tabla);
            }
            self.calcularComisiones();
            $('.close').trigger('click');
            /* HAY QUE ENVIAR AL CONTROLADOR PARA QUE PUEDA ACTUALIZAR ESTE CAMPO DATA */
       });
    };

    self.formCotizacion = function(){
        $('#modal_cotizacion').bootstrapValidator({}).on('success.form.bv', function(e) {
            e.preventDefault();
        });
    };

    self.calcularPorcentaje = function(){
        porcentaje_cobro = parseInt($('#porcentaje_cobro').val()) || 0;
        monto_detalle = parseInt($('#monto_detalle').val()) || 0;
        if(porcentaje_cobro > 100){
            $('#cobro_total').val(0);
            $('#porcentaje_cobro').val(0);
            return false;
        }
        calculo = porcentaje_cobro*monto_detalle/100;
        console.log(calculo);
        $('#cobro_total').val(calculo);
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

    self.showInfo = function(){
        value = $('#type_travel').val();
        console.log(value);
        if(value == 'Re-emisión'){
            $('#div_feepenalidad').show(500);
            $('#div_penalidad').show(500);
            $('#info').html('<strong>Info!</strong> Los boletos de Re-emisión necesitan información de Penalidad y Fee de Penalidad.');
            $("#info").fadeTo(2000, 500).slideUp(500, function(){
                $("#info").slideUp(500);
            }); 
        }else{
            $('#div_feepenalidad').hide(500);
            $('#div_penalidad').hide(500);
        }
    }

    self.generarTablaDatos = function(contenedor, inputs, width){
        var tabla = '';
        var select = '';
        // inputs = ['razon_social', 'direccion', 'nro_doc'];
        tabla += '<table style="width:'+width+'px" class="generada" id="'+contenedor+'">';
        tabla += '<tr>';

        arr = [];
        for (var i = 0; i < inputs.length; i++) {
            if(contenedor == 'datos_dni' && inputs[i] == 'documento'){
                select += '<select>';
                select += '<option value="DNI">DNI</option>';
                select += '<option value="CE">CE</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">'+ select +'</td>';
            }else if(contenedor == 'datos_generales' && inputs[i] == 'tipo'){
                select += '<select>';
                select += '<option value="DOMICILIO">DOMICILIO</option>';
                select += '<option value="ENTREGA">ENTREGA</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">'+ select +'</td>';
            }else if(contenedor == 'datos_celulares' && inputs[i] == 'tipo_contacto'){
                select += '<select>';
                select += '<option value="CELULAR">CELULAR</option>';
                select += '<option value="FIJO">FIJO</option>';
                select += '<option value="OTROS">OTROS</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">'+ select +'</td>';
            }else if(contenedor == 'datos_emails' && inputs[i] == 'tipo_email'){
                select += '<select>';
                select += '<option value="EMPRESA">EMPRESA</option>';
                select += '<option value="PERSONAL">PERSONAL</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">'+ select +'</td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'pais_visado'){
                select += '<select>';
                select += '<option value="AMERICANO">AMERICANO</option>';
                select += '<option value="ESTA">ESTA</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">'+ select +'</td>';
            }else{
                tabla += '<td style="padding: 3px"><input class="'+inputs[i]+'"></td>';
            }

            arr[i] = inputs[i];

            json = $('#json_'+contenedor).val(JSON.stringify(arr));


        }
        tabla += '<td><button class="borrar fa fa-trash"></button></td></tr>';
        tabla += '<table>';
        console.log(arr);
        $('#'+contenedor).append(tabla);
        $('.borrar').click(function(){
            fila = $(this).parent().parent();
            fila.remove();
        })
    };

    self.saveInfoTablas = function(){
        var info = [];
        $('.generada').each(function(){
            var arr = [];
            id = $(this).attr('id');
            var temp = [];
            $('#'+id+' > tbody > tr').each(function(){
                td = $(this).find('td');
                var i = 0;
                $.each(td, function(index, value) {
                    var isLastElement = index == td.length -1;

                    if (isLastElement) {
                        arr.push(JSON.stringify(temp));
                        temp = [];
                    }
                    valor = $(this).find(':input').val();
                    if(valor != ''){
                        temp.push(valor);
                    }
                });
            });
            // info.push("["+id+":"+JSON.stringify(arr)+"]");
            info.push("{"+id+":"+arr+"}");
            // info[id]= arr;
            // console.log(arr);
            // console.log(info[id]);
        });
        info.push("[fecha_nacimiento: "+$('#fecha_nac').val()+"]");
        info.push("[nacionalidad: "+$('#nacionalidad').val()+"]");
        info.push("[nombre: "+$('#nombre').val()+"]");
        info.push("[penombre: "+$('#penombre').val()+"]");
        info.push("[ap_paterno: "+$('#ap_paterno').val()+"]");
        info.push("[ap_materno: "+$('#ap_materno').val()+"]");
        info.push("[ap_casada: "+$('#ap_casada').val()+"]");
        data = JSON.stringify(info);
        $('#json_cotizacion').val(data);
    }

    

	return self;
}(jQuery);
