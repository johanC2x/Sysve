<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_person_id').':', 'person_id',array('class'=>'required wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'person_id',
		'id'=>'person_id',
		'class'=>'form-control',
		'value'=>$person_info->person_id));?>
	</div>
</div>
<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_first_name').':', 'first_name',array('class'=>'wide required')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'first_name',
		'id'=>'first_name',
		'class'=>'form-control',
		'value'=>$person_info->first_name)
	);?>
	</div>
</div>
<div class="field_row clearfix">
<?php echo form_label($this->lang->line('common_last_name').':', 'last_name',array('class'=>'wide required')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'last_name',
		'id'=>'last_name',
		'class'=>'form-control',
		'value'=>$person_info->last_name)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_email').':', 'email',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'email',
		'id'=>'email',
		'class'=>'form-control',
		'value'=>$person_info->email)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_phone_number').':', 'phone_number',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'phone_number',
		'id'=>'phone_number',
		'class'=>'form-control',
		'value'=>$person_info->phone_number));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_address_1').':', 'address_1',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'address_1',
		'id'=>'address_1',
		'class'=>'form-control',
		'value'=>$person_info->address_1));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_address_2').':', 'address_2',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'address_2',
		'id'=>'address_2',
		'class'=>'form-control',
		'value'=>$person_info->address_2));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_city').':', 'city',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'city',
		'id'=>'city',
		'class'=>'form-control',
		'value'=>$person_info->city));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_state').':', 'state',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'state',
		'id'=>'state',
		'class'=>'form-control',
		'value'=>$person_info->state));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_zip').':', 'zip',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php 
	/*
		echo form_input(array(
		'name'=>'zip',
		'id'=>'zip',
		'value'=>$person_info->zip));
	*/
	?>
    <?php 
    	$options = array(
			'01' => 'Cercado',
			'02' => 'Ancon',
			'03' => 'Ate',
			'04' => 'Barranco',
			'05' => 'Breña',
			'06' => 'Carabayllo',
			'07' => 'Comas',
			'08' => 'Chaclacayo',
			'09' => 'Chorrillos'
		);
    ?>
	<?php echo form_dropdown('zip', $options, $person_info->zip,'class="form-control" id="zip"'); ?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_country').':', 'country',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'country',
		'id'=>'country',
		'class'=>'form-control',
		'value'=>$person_info->country));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_comments').':', 'comments',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php 
		echo form_textarea(array(
			'name'=>'comments',
			'id'=>'comments',
			'class'=>'form-control',
			'value'=>$person_info->comments,
			'rows'=>'5',
			'cols'=>'17'
		));
	?>
	</div>
</div>
<div class="form-group">
    <label class="wide" >Fecha de Nacimiento</label>
    <input type="date" id="birthdate" name="birthdate" class="date form-control" />
</div>