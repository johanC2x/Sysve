var travel = function () {

    var self = {
        current_url : "",
        list_customer : [],
        list_comision : []
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
                $("#modal_success").modal("show");
            }
        })
    };

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

        self.addComision = function(){
        var data = {};
        data.key = $("#cbo_comision_payment option:selected").attr("data-key");
        data.name = $("#cbo_comision_payment option:selected").text();
        data.ammount = $("#amount_travel").val();
        self.list_comision.push(data);
        self.makeTableComision();
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
                    html += "<td style='text-align: right;'>"+ self.list_comision[i].ammount +"</td>";
                    html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComision(`+ i +`)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>"; 
            }
        }
        $("#table_customer_travel tbody").append(html);
    };

    self.setTravelCode = function(){
        $.ajax({
            url: travel.current_url + "index.php/travel/getTravelCode/",
            success: function(response){
                $('#code_travel').val(response);
                $('#code_travel').attr('readonly', true);
            }
        })
    };

    self.removeComision = function(obj){
        self.list_comision.splice(obj,1);
        self.makeTableComision();
    };

	return self;
}(jQuery);
