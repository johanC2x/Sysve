<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<?php
echo form_open('items/save/'.$item_info->item_id,array('id'=>'item_form'));
?>
<fieldset id="item_basic_info">
<legend><?php echo $this->lang->line("items_basic_information"); ?></legend>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_item_number').':', 'name',array('class'=>'wide required')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'item_number',
		'id'=>'item_number',
		'class'=>'form-control',
		'value'=>$item_info->item_number)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_name').':', 'name',array('class'=>'required wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'name',
		'id'=>'name',
		'class'=>'form-control',
		'value'=>$item_info->name)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_category').':', 'category',array('class'=>'required wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'category',
		'id'=>'category',
		'class'=>'form-control',
		'value'=>$item_info->category)
	);?>
	</div>
</div>

<div class="field_row clearfix" style="display: none;">
<?php echo form_label($this->lang->line('items_supplier').':', 'supplier',array('class'=>'required wide')); ?>
	<div class='form_field'>
	<?php echo form_dropdown('supplier_id', $suppliers, $selected_supplier,'class="form-control"');?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_cost_price').':', 'cost_price',array('class'=>'required wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'cost_price',
		'size'=>'8',
		'id'=>'cost_price',
		'class'=>'form-control',
		'value'=>$item_info->cost_price)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_unit_price').':', 'unit_price',array('class'=>'required wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'unit_price',
		'size'=>'8',
		'id'=>'unit_price',
		'class'=>'form-control',
		'value'=>$item_info->unit_price)
	);?>
	</div>
</div>

<div class="field_row clearfix">
	<?php echo form_label($this->lang->line('items_tax_1').':', 'tax_percent_1',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php 
		echo form_input(array(
			'name'=>'tax_names[]',
			'id'=>'tax_name_1',
			'size'=>'8',
			'value'=> isset($item_tax_info[0]['name']) ? $item_tax_info[0]['name'] : $this->config->item('default_tax_1_name'))
		);
	?>
	</div>
	<div class='form-group'>
	<?php 
		echo form_input(array(
			'name'=>'tax_percents[]',
			'id'=>'tax_percent_name_1',
			'size'=>'3',
			'value'=> isset($item_tax_info[0]['percent']) ? $item_tax_info[0]['percent'] : $default_tax_1_rate)
		);
	?>
	%
	</div>
</div>

<div class="field_row clearfix" style="display: none;">
<?php echo form_label($this->lang->line('items_tax_2').':', 'tax_percent_2',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php 
		
		echo form_input(array(
			'name'=>'tax_names[]',
			'id'=>'tax_name_2',
			'size'=>'8',
			'value'=> isset($item_tax_info[1]['name']) ? $item_tax_info[1]['name'] : $this->config->item('default_tax_2_name'))
		);
		
	?>
	</div>
	<div class='form-group'>
	<?php 
		
		echo form_input(array(
			'name'=>'tax_percents[]',
			'id'=>'tax_percent_name_2',
			'size'=>'3',
			'value'=> isset($item_tax_info[1]['percent']) ? $item_tax_info[1]['percent'] : $default_tax_2_rate)
		);

	?>
	%
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_quantity').':', 'quantity',array('class'=>'required wide')); ?>
	<div class='form-group'>
	<?php 
		echo form_input(array(
				'name'=>'quantity',
				'id'=>'quantity',
				'class'=>'form-control',
				'value'=> number_format((!empty($item_info->quantity) ? $item_info->quantity : 0))
			));
	?>
	</div>
</div>

<div class="field_row clearfix">
	<?php echo form_label($this->lang->line('items_reorder_level').':', 'reorder_level',array('class'=>'required wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
				'name'=>'reorder_level',
				'id'=>'reorder_level',
				'class'=>'form-control',
				'value'=> number_format((!empty($item_info->reorder_level) ? $item_info->reorder_level : 0)) 
			));
		?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('items_location').':', 'location',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_input(array(
		'name'=>'location',
		'id'=>'location',
		'class'=>'form-control',
		'value'=>$item_info->location)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('items_description').':', 'description',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_textarea(array(
		'name'=>'description',
		'id'=>'description',
		'class'=>'form-control',
		'value'=>$item_info->description,
		'rows'=>'5',
		'cols'=>'17')
	);?>
	</div>
</div>

<div class="field_row clearfix" >
	<?php if(sizeof($propertys) > 0){ ?>
		<?php foreach($propertys as $prop){ ?>
			<?php if($prop["type"] === "select"){ ?>
				<label class="wide"><?=$prop["name"];?></label>
				<select id="cbo_property_<?=$prop["id"];?>" class="form-control" onchange="getPropertyItems(<?=$prop["id"];?>,'<?=$prop["type"];?>')">
					<option>Seleccionar</option>
					<?php if(sizeof($prop["children"]) > 0){ ?>
						<?php foreach($prop["children"] as $child){ ?>
							<option value="<?=$child["id"];?>"><?=$child["name"];?></option>
						<?php } ?>
					<?php } ?>
				</select>
			<?php } ?>
		<?php } ?>
		<input type="hidden" id="data_items" name="data_items"/>
	<?php } ?>
</div>

<div class="field_row clearfix" style="display: none;">
<?php echo form_label($this->lang->line('items_allow_alt_description').':', 'allow_alt_description',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_checkbox(array(
		'name'=>'allow_alt_description',
		'id'=>'allow_alt_description',
		'value'=>1,
		'checked'=>($item_info->allow_alt_description)? 1  :0)
	);?>
	</div>
</div>

<div class="field_row clearfix" style="display: none;">
<?php echo form_label($this->lang->line('items_is_serialized').':', 'is_serialized',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_checkbox(array(
		'name'=>'is_serialized',
		'id'=>'is_serialized',
		'value'=>1,
		'checked'=>($item_info->is_serialized)? 1 : 0)
	);?>
	</div>
</div>

<!-- Parq 131215 Start -->
<div class="field_row clearfix" style="display: none;">
<?php echo form_label($this->lang->line('items_is_deleted').':', 'is_deleted',array('class'=>'wide')); ?>
	<div class='form-group'>
	<?php echo form_checkbox(array(
		'name'=>'is_deleted',
		'id'=>'is_deleted',
		'value'=>1,
		'checked'=>($item_info->deleted)? 1 : 0)
	);?>
	</div>
</div>
<!-- Parq End -->



<!--  GARRISON ADDED 4/21/2013 -->
<div class="field_row clearfix">	
<?php
if($this->config->item('custom1_name') != NULL)
{
	echo form_label($this->config->item('custom1_name').':', 'custom1',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom1',
			'id'=>'custom1',
			'class'=>'form-control',
			'value'=>$item_info->custom1)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom2_name') != NULL)
{
	echo form_label($this->config->item('custom2_name').':', 'custom2',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom2',
			'id'=>'custom2',
			'class'=>'form-control',
			'value'=>$item_info->custom2)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom3_name') != NULL)
{
	echo form_label($this->config->item('custom3_name').':', 'custom3',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom3',
			'id'=>'custom3',
			'class'=>'form-control',
			'value'=>$item_info->custom3)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom4_name') != NULL)
{
	echo form_label($this->config->item('custom4_name').':', 'custom4',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom4',
			'id'=>'custom4',
			'class'=>'form-control',
			'value'=>$item_info->custom4)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom5_name') != NULL)
{
	echo form_label($this->config->item('custom5_name').':', 'custom5',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom5',
			'id'=>'custom5',
			'class'=>'form-control',
			'value'=>$item_info->custom5)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom6_name') != NULL)
{
	echo form_label($this->config->item('custom6_name').':', 'custom6',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom6',
			'id'=>'custom6',
			'class'=>'form-control',
			'value'=>$item_info->custom6)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom7_name') != NULL)
{
	echo form_label($this->config->item('custom7_name').':', 'custom7',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom7',
			'id'=>'custom7',
			'class'=>'form-control',
			'value'=>$item_info->custom7)
		);?>
	</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom8_name') != NULL)
{
	echo form_label($this->config->item('custom8_name').':', 'custom8',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom8',
			'id'=>'custom8',
			'class'=>'form-control',
			'value'=>$item_info->custom8)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom9_name') != NULL)
{
	echo form_label($this->config->item('custom9_name').':', 'custom9',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom9',
			'id'=>'custom9',
			'class'=>'form-control',
			'value'=>$item_info->custom9)
		);?>
		</div>
	</div>
<?php }//end if?>

<div class="field_row clearfix">
<?php
if($this->config->item('custom10_name') != NULL)
{
	echo form_label($this->config->item('custom10_name').':', 'custom10',array('class'=>'wide')); ?>
	<div class='form-group'>
		<?php echo form_input(array(
			'name'=>'custom10',
			'id'=>'custom10',
			'class'=>'form-control',
			'value'=>$item_info->custom10)
		);?>
		</div>
	</div>
<?php }//end if?>

<!--   END GARRISON ADDED -->

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

	/* SETEANDO VALORES POR DEFECTO */
	$("#tax_percent_name_1").val(0);
	$("#tax_percent_name_2").val(0);
	/* ============================ */

	$("#category").autocomplete("<?php echo site_url('items/suggest_category');?>",{max:100,minChars:0,delay:10});
    $("#category").result(function(event, data, formatted){});
	$("#category").search();

/** GARRISON ADDED 5/18/2013 **/	
	$("#location").autocomplete("<?php echo site_url('items/suggest_location');?>",{max:100,minChars:0,delay:10});
    $("#location").result(function(event, data, formatted){});
	$("#location").search();

	$("#custom1").autocomplete("<?php echo site_url('items/suggest_custom1');?>",{max:100,minChars:0,delay:10});
    $("#custom1").result(function(event, data, formatted){});
	$("#custom1").search();

	$("#custom2").autocomplete("<?php echo site_url('items/suggest_custom2');?>",{max:100,minChars:0,delay:10});
    $("#custom2").result(function(event, data, formatted){});
	$("#custom2").search();

	$("#custom3").autocomplete("<?php echo site_url('items/suggest_custom3');?>",{max:100,minChars:0,delay:10});
    $("#custom3").result(function(event, data, formatted){});
	$("#custom3").search();

	$("#custom4").autocomplete("<?php echo site_url('items/suggest_custom4');?>",{max:100,minChars:0,delay:10});
    $("#custom4").result(function(event, data, formatted){});
	$("#custom4").search();

	$("#custom5").autocomplete("<?php echo site_url('items/suggest_custom5');?>",{max:100,minChars:0,delay:10});
    $("#custom5").result(function(event, data, formatted){});
	$("#custom5").search();

	$("#custom6").autocomplete("<?php echo site_url('items/suggest_custom6');?>",{max:100,minChars:0,delay:10});
    $("#custom6").result(function(event, data, formatted){});
	$("#custom6").search();

	$("#custom7").autocomplete("<?php echo site_url('items/suggest_custom7');?>",{max:100,minChars:0,delay:10});
    $("#custom7").result(function(event, data, formatted){});
	$("#custom7").search();

	$("#custom8").autocomplete("<?php echo site_url('items/suggest_custom8');?>",{max:100,minChars:0,delay:10});
    $("#custom8").result(function(event, data, formatted){});
	$("#custom8").search();

	$("#custom9").autocomplete("<?php echo site_url('items/suggest_custom9');?>",{max:100,minChars:0,delay:10});
    $("#custom9").result(function(event, data, formatted){});
	$("#custom9").search();

	$("#custom10").autocomplete("<?php echo site_url('items/suggest_custom10');?>",{max:100,minChars:0,delay:10});
    $("#custom10").result(function(event, data, formatted){});
	$("#custom10").search();
/** END GARRISON ADDED **/

	$('#item_form').bootstrapValidator({
        container: '#messages',
	    feedbackIcons: {
	      valid: 'glyphicon glyphicon-ok',
	      invalid: 'glyphicon glyphicon-remove',
	      validating: 'glyphicon glyphicon-refresh'
	    },
	    fields: {
	    	name: {
	    		validators: {
	    			notEmpty: { message: "<?php echo $this->lang->line('items_name_required'); ?>"}
	    		}
	    	},
	    	category: {
	    		validators: {
	    			notEmpty: { message: "<?php echo $this->lang->line('items_category_required'); ?>"}
	    		}
	    	},
	    	supplier_id: {
	    		validators: {
	    			notEmpty: { message: "<?php echo $this->lang->line('items_supplier_required'); ?>"}
	    		}
	    	},
            unit_price: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('items_unit_price_required'); ?>"},
                    numeric: { message: "<?php echo $this->lang->line('items_is_number'); ?>" }
                }
            },
            cost_price:{
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('items_cost_price_required'); ?>"},
                    numeric: { message: "<?php echo $this->lang->line('items_is_number'); ?>" } 
                }
            },
            tax_percent:{
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('items_tax_percent_required'); ?>"}
                }
            },
            quantity:{
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('items_quantity_required'); ?>"},
                    integer: { message: "<?php echo $this->lang->line('items_is_number'); ?>" } 
                }
            },
            reorder_level:{
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('items_reorder_level_required'); ?>"}
                }
            }
	    }
    }).on('success.form.bv', function(e) {
		e.preventDefault();
		$( "#submit" ).prop("disabled", false);
		var msg = "";
		$.ajax({
            type:"POST",
            url:$("#item_form").attr('action'),
            data:$("#item_form").serialize(),
            success:function(msg){
                console.log(msg);
                var kit = JSON.parse(msg);
                if(kit.success == true){
                    msg = getMessageSuccess('Operación realizada con exito...');
                    $("#messages").html(msg);	
                    location.reload();				
                }else{
                    msg = getMessageError('Se ha producido un error...');
                    $("#messages").html(msg);					
                }
            }
		});
	});

    <?php if(!empty($item_info->data_items) && isset($item_info->data_items)){ ?>
    	setProperties(JSON.parse('<?= $item_info->data_items; ?>'));
    <?php } ?>
});

function getPropertyItems(idObj,typeObj){
	var childrens = [];
	var children = {};
	if(typeObj === "select"){
		children.idObj = "cbo_property_"+idObj; 
		children.id = $("#cbo_property_"+idObj+" option:selected").val();
		children.name = $("#cbo_property_"+idObj+" option:selected").text();
		children.type = typeObj;
		children.parent = idObj;
		childrens.push(children);
		localStorage.setItem("childrens", JSON.stringify(childrens));
	}
	$("#data_items").val(localStorage.getItem("childrens"));
}

function setProperties(properties){
	if(properties.length > 0){
		for(var i=0;i < properties.length;i++){
			if(properties[i].type === "select"){
				$("#"+properties[i].idObj).val(properties[i].id);
			}
		}
	}
}

</script>