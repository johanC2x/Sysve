var travel = function () {

    var self = {
        current_url : "",
        list_customer : []
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
                html = "";
                var options = self.getOption(self.list_customer[i].person_id,i);
                var data_customer = (travel.list_customer[i].data_customer !== null) ? JSON.parse(travel.list_customer[i].data_customer):"";
                var window_travel_detail = "";
                var pas_travel_detail = "";
                var mill_travel_detail = "";
                var visa_travel_detail = "";
                var vacuna_travel_detail  = "";
                if(data_customer !== ""){
                    window_travel_detail = data_customer.travel_detail.window_travel_detail;
                    pas_travel_detail = data_customer.travel_detail.pas_travel_detail;
                    mill_travel_detail = data_customer.travel_detail.mill_travel_detail;
                    visa_travel_detail = data_customer.travel_detail.visa_travel_detail;
                    vacuna_travel_detail = data_customer.travel_detail.vacuna_travel_detail;
                }
                html += "<tr>";
                    html += `<td>
                                <center>
                                    <a id="row_open_` + self.list_customer[i].person_id + `" href="javascript:void(0);" 
                                        title="Agregar Detalles" onclick="travel.changeRow(` + self.list_customer[i].person_id + `);">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </center>
                            </td>`;
                    html += "<td>"+ self.list_customer[i].person_id +"</td>";
                    html += "<td>"+ self.list_customer[i].first_name + " " + self.list_customer[i].last_name +"</td>";
                    html += "<td></td>";
                    html += "<td></td>";
                    html += "<td>" + options + "</td>";
                html += "</tr>";
                html += `<tr id="row_travel_` + self.list_customer[i].person_id + `" style="display: none;"> 
                            <td colspan="6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="frm_travel_customer_detail_` + self.list_customer[i].person_id + `" role="form">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Ventana</label>
                                                                <input type="text" id="window_travel_detail" name="window_travel_detail" 
                                                                       value="`+ window_travel_detail +`" 
                                                                       placeholder="" class="form-control">
                                                            </div>      
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Pasillo</label>
                                                                <input type="text" id="pas_travel_detail" name="pas_travel_detail" value="` + pas_travel_detail + `" placeholder="" class="form-control">
                                                            </div>      
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Millaje</label>
                                                                <input type="text" id="mill_travel_detail" name="mill_travel_detail" value="` + mill_travel_detail + `" placeholder="" class="form-control">
                                                            </div>      
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Visa</label>
                                                                <input type="text" id="visa_travel_detail" name="visa_travel_detail" value="` + visa_travel_detail + `" placeholder="" class="form-control">
                                                            </div>      
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Vacuna</label>
                                                                <input type="text" id="vacuna_travel_detail" name="vacuna_travel_detail" value="` + vacuna_travel_detail + `" placeholder="" class="form-control">
                                                            </div>      
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary" onclick="travel.saveDetailTravel(` + self.list_customer[i].person_id + `);"> Guardar </button>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                $("#table_customer_travel tbody").append(html);
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
                            <li><a href="javascript:void(0);">Agregar Vuelos</a></li>
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
        console.log(obj.getAttribute('fullname'));
        console.log(obj.getAttribute('dni'));

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

	return self;
}(jQuery);
