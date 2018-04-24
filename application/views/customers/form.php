<?php
echo form_open('customers/save/'.$person_info->person_id,array('id'=>'customer_form')); 
?>
<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<fieldset id="customer_basic_info">
<legend><?php echo $this->lang->line("customers_basic_information"); ?></legend>

<?php $this->load->view("people/form_basic_info"); ?>
<?php $this->load->view("property/form_basic",$propertys); ?>

<input type="hidden" id="data" name="data" value="">

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

        $('#customer_form').bootstrapValidator({
            container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                person_id: {
                    validators: {
                        notEmpty: { message: "<?php echo $this->lang->line('common_document_required'); ?>"}
                    }
                },
                first_name: {
                    validators: {
                        notEmpty: { message: "<?php echo $this->lang->line('common_first_name_required'); ?>"}
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: { message: "<?php echo $this->lang->line('common_last_name_required'); ?>"}
                    }
                },
                email: {
                    validators: {
                        notEmpty: { message: "<?php echo $this->lang->line('common_email_required'); ?>"},
                        emailAddress: {message: '<?php echo $this->lang->line('common_email_invalid_format'); ?>'}
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            $( "#submit" ).prop("disabled", false);
            var msg = "";
            var data = populateProperties();
            $("#data").val(JSON.stringify(data));
            $.ajax({
                type:"POST",
                url:$("#customer_form").attr('action'),
                data:$("#customer_form").serialize(),
                success:function(msg){
                    var kit = JSON.parse(msg);
                    if(kit.success){
                        msg = getMessageSuccess('Operación realizada con exito...');
                        $("#messages").html(msg);	
                        location.reload();			
                    }else{
                        msg = getMessageError(kit.message);
                        $("#messages").html(msg);					
                    }
                }
            });
	   });
    });

    <?php if(!empty($person_info->data)){ ?>
        setProperties(JSON.parse('<?= $person_info->data; ?>'));
    <?php } ?>

    function setProperties(data){
        if(data.length > 0){
            for (var i = 0; i < data.length; i++) {
                console.log(data[i].id);
                if(data[i].type === "text" || data[i].type === "date"){
                    $("#"+data[i].id).val(data[i].value);
                }
            }
        }
    }

    function populateProperties(){
        var childrens = [];
        $("#content_properties input").each(function(){ 
            var element = this;
            var children = {};
            if(element.id !== undefined){
                var type = $("#"+element.id.toString()).attr("data-type");
                if(type === "text" || type === "date"){
                    children.idObj = element.id;
                    children.id = element.id;
                    children.value = $("#"+element.id.toString()).val();
                    children.name = $("#"+element.id.toString()).attr("data-name");
                    children.type = $("#"+element.id.toString()).attr("data-type");
                    children.parent = element.id;
                    childrens.push(children);
                }
            }
        });
        return childrens;
    }

    function generarTablaDatos(contenedor, inputs){
        var tabla = '';
        // inputs = ['razon_social', 'direccion', 'nro_doc'];
        tabla += '<table style="width:500px">';
        tabla += '<tr>';
        for (var i = 0; i < inputs.length; i++) {
            tabla += '<td style="padding: 3px"><input class="'+inputs[i]+'"></td>';
        }
        tabla += '<td><button class="borrar fa fa-trash"></button></td></tr>';
        tabla += '<table>';
        console.log(tabla);
        $('#'+contenedor).append(tabla);
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
    generarTablaDatos('datos_pasaporte', ['pais', 'nro_pasaporte', 'fecha_ven']);
    generarTablaDatos('datos_empresa', ['razon_social', 'direccion', 'nro_doc']);
    generarTablaDatos('datos_direcciones', ['direccion', 'distrito', 'referencia']);


</script>