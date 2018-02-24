<?php
echo form_open('employees/save/'.$person_info->person_id,array('id'=>'employee_form'));
?>
<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<fieldset id="employee_basic_info">
<legend><?php echo $this->lang->line("employees_basic_information"); ?></legend>
<?php $this->load->view("people/form_basic_info"); ?>
</fieldset>

<fieldset id="employee_login_info">
<legend><?php echo $this->lang->line("employees_login_info"); ?></legend>
<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('employees_username').':', 'username',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'username',
		'id'=>'username',
		'value'=>$person_info->username));?>
	</div>
</div>

<?php
$password_label_attributes = $person_info->person_id == "" ? array('class'=>'required'):array();
?>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('employees_password').':', 'password',$password_label_attributes); ?>
	<div class='form_field'>
	<?php echo form_password(array(
		'name'=>'password',
		'id'=>'password'
	));?>
	</div>
</div>


<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('employees_repeat_password').':', 'repeat_password',$password_label_attributes); ?>
	<div class='form_field'>
	<?php echo form_password(array(
		'name'=>'repeat_password',
		'id'=>'repeat_password'
	));?>
	</div>
</div>
</fieldset>

<fieldset id="employee_permission_info">
<legend><?php echo $this->lang->line("employees_permission_info"); ?></legend>
<p><?php echo $this->lang->line("employees_permission_desc"); ?></p>

<ul id="permission_list">
<?php foreach($all_modules->result() as $module){ ?>
<li>	
    <?php echo form_checkbox("permissions[]",$module->module_id,$this->Employee->has_permission($module->module_id,$person_info->person_id)); ?>
    <span class="medium">
        <?php //echo $this->lang->line('module_'.$module->module_id);?>
        <?php echo $module->name; ?>
        :</span>
        <span class="small">
            <?php //echo $this->lang->line('module_'.$module->module_id.'_desc');?>
            <?php echo $module->decription; ?>
        </span>
</li>
<?php } ?>
</ul>
<?php
	echo form_submit(array(
		'name'=>'submit',
		'id'=>'submit',
		'value'=>$this->lang->line('common_submit'),
		'class'=>'submit_button float_right')
	);
?>
<div class='form-group'>
    <div class='col-md-9 col-md-offset-3'>
        <div id='messages'></div>
    </div>
</div>
</fieldset>
<?php 
echo form_close();
?>

<script type='text/javascript'>

//validation and submit handling
$(document).ready(function(){

	$('#employee_form').bootstrapValidator({
		container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('common_first_name_required'); ?>"
                	}
                }
            },
            last_name: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('common_last_name_required'); ?>"
                	}
                }
            },
            username: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('employees_username_required'); ?>"
                	}
                }
            },
            password:{
            	 validators: {
                    notEmpty: {
                        message: '<?php 
                        	echo $this->lang->line('employees_password_required'); 
                        ?>'
                    }
                }
            },
            repeat_password:{
            	validators: {
                    notEmpty: {
                        message: '<?php 
                        	echo $this->lang->line('employees_password_required'); 
                        ?>'
                    },
                    identical: {
                        field: 'password',
                        message: '<?php echo $this->lang->line('employees_password_must_match'); ?>'
                    }
                }
            },
            email:{
            	validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('common_email_invalid_format'); ?>'
                    },
                     emailAddress: {
                        message: '<?php echo $this->lang->line('common_email_invalid_format'); ?>'
                    }
                }
            }
        }
	}).on('success.form.bv', function(e) {
        e.preventDefault();
        $( "#submit" ).prop("disabled", false);
        var msg = "";
        $.ajax({
            type:"POST",
            url:$("#employee_form").attr('action'),
            data:$("#employee_form").serialize(),
            success:function(response){
                var employees = JSON.parse(response);
                if(employees.success == true){
                    msg = getMessageSuccess('Operación realizada con exito...');
                    $("#messages").html(msg);	
                    location.reload();				
                }else{
                	if(employees.message !== ""){
                		 msg = getMessageError(employees.message);
                    	$("#messages").html(msg);
                	}					
                }
            }
        });
	});
});
</script>