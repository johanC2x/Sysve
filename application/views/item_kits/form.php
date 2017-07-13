<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<?php
echo form_open('item_kits/save/'.$item_kit_info->item_kit_id,array('id'=>'item_kit_form'));
?>
<fieldset id="item_kit_info">
<legend><?php echo $this->lang->line("item_kits_info"); ?></legend>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('item_kits_nombre').':', 'name',array('class'=>'wide required')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'name',
		'class'=>'form-control',
		'id'=>'name',
		'value'=>$item_kit_info->name)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('item_kits_desc').':', 'description',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_textarea(array(
		'name'=>'description',
		'class'=>'form-control',
		'id'=>'description',
		'value'=>$item_kit_info->description,
		'rows'=>'5',
		'cols'=>'17')
	);?>
	</div>
</div>
 
	<div class="field_row clearfix">
	<?php echo form_label($this->lang->line('item_kits_add_item').':', 'item',array('class'=>'wide')); ?>
		<div class='form-group'>
			<?php echo form_input(array(
				'name'=>'item',
				'class'=>'form-control',
				'id'=>'item'
			));?>
		</div>
	</div>
	<table id="item_kit_items" class="table table-striped table-bordered table-hover" >
		<tr>
			<th><?php echo $this->lang->line('common_delete');?></th>
			<th><?php echo $this->lang->line('item_kits_item');?></th>
			<th><?php echo $this->lang->line('item_kits_quantity');?></th>
		</tr>
		<?php if(sizeof($this->Item_kit_items->get_info($item_kit_info->item_kit_id)) != 0){ ?>
			<?php foreach ($this->Item_kit_items->get_info($item_kit_info->item_kit_id) as $item_kit_item) { ?>
				<tr class="tr-data" >
					<?php $item_info = $this->Item->get_info($item_kit_item['item_id']); ?>
					<td><a href="#" onclick='return deleteItemKitRow(this);'>X</a></td>
					<td><?php echo $item_info->name; ?></td>
					<td><input class='quantity' id='item_kit_item_<?php echo $item_kit_item['item_id'] ?>' type='text' size='3' name=item_kit_item[<?php echo $item_kit_item['item_id'] ?>] value='<?php echo $item_kit_item['quantity'] ?>'/></td>
				</tr>
			<?php } ?>
			<?php }else{ ?>
				<tr class="tr-empty" >
					<td colspan="3">
						<div id="msg_empty_kit" class="warning_message" style="padding:7px;">
							<?php echo $this->lang->line('item_empty'); ?>
						</div>
					</td>
				</tr>
			<?php } ?> 
	</table>
<?php
	echo form_submit(array(
		'name'=>'submit',
		'id'=>'submit',
		'value'=>$this->lang->line('common_submit'),
		'class'=>'submit_button float_right')
	);
?>
<div id="messages"></div>
</fieldset>
<?php
echo form_close();
?>
<script type='text/javascript'>

$("#item").autocomplete('<?php echo site_url("items/item_search"); ?>',{
	minChars:0,
	max:100,
	selectFirst: false,
   	delay:10,
	formatItem: function(row) {
		return row[1];
	}
});

$("#item").result(function(event, data, formatted){
	$("#item").val("");
	$("#msg_empty_kit").html("");
	$("#msg_empty_kit").removeClass('warning_message');
	if ($("#item_kit_item_"+data[0]).length ==1){
		$("#item_kit_item_"+data[0]).val(parseFloat($("#item_kit_item_"+data[0]).val()) + 1);
	}else{
		$("#item_kit_items").append("<tr><td><a href='#' onclick='return deleteItemKitRow(this);'>X</a></td><td>"+data[1]+"</td><td><input class='quantity' id='item_kit_item_"+data[0]+"' type='text' size='3' name=item_kit_item["+data[0]+"] value='1'/></td></tr>");
	}
});

$(document).ready(function(){ 
	$("#item_kit_form").bootstrapValidator({
		live: 'enabled',
		container: '#messages',
	    feedbackIcons: {
	      valid: 'glyphicon glyphicon-ok',
	      invalid: 'glyphicon glyphicon-remove',
	      validating: 'glyphicon glyphicon-refresh'
	    },
	    fields: {
	    	name: {
		        validators: {
					notEmpty: { message: "<?php echo $this->lang->line('items_name_required'); ?>" }
		        } 
			},
			category: {
				validators: {
					notEmpty: { message: "<?php echo $this->lang->line('items_category_required'); ?>" }
				}
			}	
	    }
	}).on('success.form.bv', function(e) {
        e.preventDefault();
		$( "#submit" ).prop("disabled", false);
		var msg = "";
		$.ajax({
			type:"POST",
			url:$("#item_kit_form").attr('action'),
			data:$("#item_kit_form").serialize(),
			success:function(msg){
				var kit = JSON.parse(msg);
				if(kit.success == true){
					msg = getMessageSuccess('Operación realizada con exito...');
					$("#messages").html(msg);					
					clearTable("item_kit_items",3,"<?php echo $this->lang->line('item_empty'); ?>");
					location.reload();
				}else{
					msg = getMessageError('Se ha producido un error...');
					$("#messages").html(msg);					
				}
			}
		});
    });
});

function deleteItemKitRow(link){
	$(link).parent().parent().remove();
	return false;
}

</script>