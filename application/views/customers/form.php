<?php
echo form_open('customers/save/'.$person_info->person_id,array('id'=>'customer_form')); 
?>
<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<fieldset id="customer_basic_info">
<legend><?php echo $this->lang->line("customers_basic_information"); ?></legend>

<?php $this->load->view("people/form_basic_info"); ?>
<?php $this->load->view("property/form_basic",$propertys); ?>


<div class="field_row clearfix" style="display: none;"> 
<?php echo form_label($this->lang->line('customers_account_number').':', 'account_number'); ?>
    <div class='form_field'>
    <?php echo form_input(array(
        'name'=>'account_number',
        'id'=>'account_number',
        'value'=>$person_info->account_number)
    );?>
    </div>
</div>
<div class="field_row clearfix">    
<?php echo form_label($this->lang->line('customers_taxable').':', 'taxable'); ?>
    <div class='form_field'>
    <?php echo form_checkbox('taxable', '1', $person_info->taxable == '' ? TRUE : (boolean)$person_info->taxable);?>
    </div>
</div>
<?php
echo form_submit(array(
    'name'=>'submit',
    'id'=>'submit',
    'value'=>$this->lang->line('common_submit'),
    'class'=>'submit_button float_right')
);
?>
<div class='form-group'>
    <div id='messages' class='col-md-9 col-md-offset-3'></div>
</div>
</fieldset>
<?php 
echo form_close();
?>
<script type='text/javascript'>
//validation and submit handling
    $(document).ready(function(){

        customer.validarInfoCustomer();

    <?php if(!empty($person_info->data)){ ?>
        //viejo setProperties
        // setProperties(JSON.parse('<?= $person_info->data_nueva; ?>'));
        setProperties('<?= $person_info->data_nueva; ?>');
    <?php } ?>
    
    //viejo setProperties

    // function setProperties(data){
    //     console.log('setProperties:');
    //     console.log(data);
    //     if(data.length > 0){
    //         for (var i = 0; i < data.length; i++) {
    //             console.log(data[i].id);
    //             if(data[i].type === "text" || data[i].type === "date"){
    //                 $("#"+data[i].id).val(data[i].value);
    //             }
    //         }
    //     }
    // }

    // function setProperties(data){
    //     // result = data.slice(1, -1).slice(0, -1);;

    //     result = data.split("],[").join("]*[").split('*');
    //     for (var i = result.length - 1; i >= 0; i--) {
    //         dato = result[i].split(':');
    //         indice = dato[0].replace('[', '');
    //         valores = JSON.parse(dato[1].replace('["', '').replace('"]]', ''));

    //         //completar arreglo de valores dependiendo del contenedor
    //         cant_inputs = getCantidadInputs(indice);
    //         cant_datos_actuales = valores.length;
    //         faltantes = parseInt(cant_inputs) - parseInt(cant_datos_actuales);
    //         for (var j = faltantes - 1; j >= 0; j--) {
    //             valores.push(' ');
    //         }
    //         console.log('cant_input:'+cant_inputs);
    //         console.log('cant_datos_actuales:' + cant_datos_actuales);
    //         console.log(indice);
    //         console.log(valores);
    //         //get onclick 
    //         onclick = $('#'+indice).find('.fa-plus').attr('onclick');
    //         console.log("$('#"+indice+"').find('.fa-plus').attr('onclick');")
    //         // onclick = onclick.replace(');', valores+');');
    //     }

    // }

    function getCantidadInputs(contenedor){
        var cant_inputs = 1;
        switch(contenedor){
            case 'tbl_empresas':
                cant_inputs = '2';
                break;
            case 'tbl_passport':
                cant_inputs = '5';
                break;
            case 'tbl_visado':
                cant_inputs = '4';
                break;
            case 'tbl_address':
                cant_inputs = '6';
                break;
            case 'tbl_company':
                cant_inputs = '8';
                break;
            case 'tbl_contact':
                cant_inputs = '3';
                break;
            case 'tbl_card':
                cant_inputs = '3';
                break;
            case 'tbl_pasj':
                cant_inputs = '5';
                break;
            case 'tbl_phone':
                cant_inputs = '2';
                break;
            case 'tbl_emails':
                cant_inputs = '2';
                break; 
            case 'tbl_fam':
                cant_inputs = '3';
                break; 
            case 'tbl_asis':
                cant_inputs = '2';
                break;         
        }
        return cant_inputs;
    }


    function generarTablaDatos(contenedor, inputs, width, valores = null){
        var tabla = '';
        var select = '';
        var idObj = "";
        if(typeof valores === 'undefined'){
            valores = '';
        }
        // inputs = ['razon_social', 'direccion', 'nro_doc'];
        //tabla += '<table style="width:'+width+'px" class="generada" id="'+contenedor+'">';
        tabla += '<tr>';
        arr = [];
        for (var i = 0; i < inputs.length; i++) {
            if((contenedor == 'datos_dni' || contenedor == 'datos_dni2' )&& inputs[i] == 'documento'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="" disabled>Seleccionar</option>';
                    select += '<option value="DNI">DNI</option>';
                    select += '<option value="CE">CE</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_generales' && inputs[i] == 'tipo'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="" disabled>Seleccionar</option>';
                    select += '<option value="DOMICILIO">DOMICILIO</option>';
                    select += '<option value="ENTREGA">ENTREGA</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_celulares' && inputs[i] == 'tipo_contacto'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="CELULAR PERSONAL">CELULAR PERSONAL</option>';
                    select += '<option value="CELULAR EMPRESA">CELULAR EMPRESA</option>';
                    select += '<option value="OTROS">OTROS</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_emails' && inputs[i] == 'tipo_email'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="EMPRESA">EMPRESA</option>';
                    select += '<option value="PERSONAL">PERSONAL</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'pais_visado'){
                select += '<select class="form-control '+inputs[i]+'">';
                    select += '<option value="AMERICANO">AMERICANO</option>';
                    select += '<option value="ESTA">ESTA</option>';
                select += '</select>';
                tabla += '<td>'+ select +'</td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'fecha_emision'){
                tabla += '<td><input class="'+inputs[i]+' form-control" type="date"></td>';
            }else if(contenedor == 'datos_visado' && inputs[i] == 'fecha_expiracion'){  
                tabla += '<td><input class="'+inputs[i]+' form-control" type="date"></td>';
            }else if(contenedor == 'datos_asiento' && inputs[i] == 'tipo_asiento'){
                select += '<select name="pref_asiento" class="form-control">'
                    select += '<option value="VENTANA">VENTANA</option>'
                    select += '<option value="PASILLO">PASILLO</option>'
                    select += '<option value="SALIDA DE EMERGENCIA">SALIDA DE EMERGENCIA</option>'
                    select += '<option value="COMPRA DE ASIENTOS">COMPRA DE ASIENTOS</option>'
                    select += '<option value="UPGRADE">UPGRADE</option>'
                    select += '<option value="SILLA DE RUEDAS">SILLA DE RUEDAS</option>'
                select += '</select>'
                tabla += '<td>'+ select +'</td>';
            }else{
                tabla += '<td><input class="'+inputs[i]+' form-control"></td>';
            }

            arr[i] = inputs[i];
            json = $('#json_'+contenedor).val(JSON.stringify(arr));
        }
        tabla += '<td><button type="button" class="borrar fa fa-trash"></button></td>';
        tabla += '</tr>';
        
        //tabla += '<table>';
        switch(contenedor){
            case 'datos_dni':
                idObj = 'tbl_empresas';
                // customer.saveCustomerDocumentos();
                break;
            case 'datos_pasaportes':
                idObj = 'tbl_passport';
                // customer.saveCustomerPasaportes();
                break;
            case 'datos_visado':
                idObj = 'tbl_visado';
                // customer.self.saveCustomerVisado();
                break;
            case 'datos_generales':
                idObj = 'tbl_address';
                // customer.saveCustomerDirecciones();
                break;
            case 'datos_empresa':
                idObj = 'tbl_company';
                // customer.saveCustomerEmpresa();
                break;
            case 'datos_contactar':
                idObj = 'tbl_contact';
                // customer.saveCustomerContactar();
                break;
            case 'datos_tarjetas':
                idObj = 'tbl_card';
                // customer.saveCustomerTarjetas();
                break;
            case 'datos_pasajeros':
                idObj = 'tbl_pasj';
                // customer.saveCustomerPasajeros();
                break;
            case 'datos_celulares':
                idObj = 'tbl_phone';
                // customer.saveCustomerCelulares();
                break;
            case 'datos_emails':
                idObj = 'tbl_emails';
                // customer.saveCustomerEmails();
                break; 
            case 'datos_familiares':
                idObj = 'tbl_fam';
                // customer.saveCustomerFamiliares();
                break; 
            case 'datos_asiento':
                idObj = 'tbl_asis';
                // customer.saveCustomerAsiento();
                break;         
        }
        if(idObj !== ''){
            $('#'+idObj+' > tbody').append(tabla);
        }else{
            $('#'+contenedor+' > tbody').append(tabla);
        }



        $('.borrar').click(function(){
            fila = $(this).parent().parent();
            fila.remove();
        })
    }

    function generarJson(){
        inputs = ['razon_social', 'direccion', 'nro_doc'];
        arr = [];
        j = 0;
        for (var i = 0; i < inputs.length; i++) {
            $.each('.'+inputs[i], function(){
                arr[j][i] = $(this).val();
                j++;
            })
        }

        console.log(arr);
        
    }


    function setValoresTablas(){
        var info = [];
        // $('.generada').each(function(){
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
            info.push("["+id+":"+JSON.stringify(arr)+"]");
            // info[id]= arr;
            // console.log(arr);
            // console.log(info[id]);
        })
        antes = JSON.stringify(info);
        despues = JSON.parse(antes);

        $('#hidden_tablas').val(despues);
    }

    function prueba(){
        $('.generada')
    }

    generarTablaDatos('datos_dni', ['documento', 'nro'], 200);
    generarTablaDatos('datos_pasaporte', ['pais', 'nro_pasaporte', 'fecha_ven'], 500);
    generarTablaDatos('datos_direcciones', ['direccion', 'distrito', 'referencia'], 500);
    generarTablaDatos('datos_tarjetas', ['tipo_tarjeta', 'nro_tarjeta', 'debito_credito'], 500);
    
    generarTablaDatos('datos_pasaportes', ['nro', 'fecha_emision', 'fecha_expiracion', 'pais_emision', 'nacionalidad'], 900);
    generarTablaDatos('datos_generales', ['tipo','direccion', 'distrito', 'pais', 'tlfono', 'referencia'], 900);
    generarTablaDatos('datos_empresa', ['ruc', 'razon_social', 'direccion', 'distrito', 'estado', 'correo' ,'tlfono', 'referencia'], 1000)
    generarTablaDatos('datos_contactar', ['ruc', 'telefono', 'correo'], 451);
    generarTablaDatos('datos_pasajeros', ['millaje', 'nro', 'usuario', 'clave', 'fin'], 400);

    generarTablaDatos('datos_emails', ['tipo_email', 'email'], 400);
    generarTablaDatos('datos_celulares', ['tipo_contacto', 'nro'], 400);
    generarTablaDatos('datos_familiares', ['relacion', 'nombre', 'telefono'], 300);
    generarTablaDatos('datos_visado', ['pais_visado', 'numero', 'fecha_emision', 'fecha_expiracion'], 610);
    generarTablaDatos('datos_asiento', ['tipo_asiento', 'indicaciones'], 400);

    <?php if(!empty($person_info->data)){ ?>
        //viejo setProperties
        // setProperties(JSON.parse('<?= $person_info->data_nueva; ?>'));
        console.log('<?= $person_info->data_nueva; ?>');  
        setProperties('<?= $person_info->data_nueva; ?>');  
    <?php } ?>
});

</script>