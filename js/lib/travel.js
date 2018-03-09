var travel = function () {

    var self = {};

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
                    console.log(response);
                    var data = JSON.parse(response);
                    console.log(data);
                    if(data.success){
                        $("#list_travel_search").empty();
                        console.log(data);
                        for (var i = 0; i < data.data.length; i++) {
                            var opt = $("<option></option>").attr("value", data.data[i].value).attr("data-id",data.data[i].person_id);
                            $("#list_travel_search").append(opt);
                        }
                    }
                }
            });
        }
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
