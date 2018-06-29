<?php $this->load->view("partial/header"); ?>
<!--
<script src='<?php //echo base_url();?>/js/lib/customer.js'></script>
-->
<script src="<?php echo base_url();?>js/lib/travel.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    init_table_sorting();
    enable_select_all();
    enable_row_selection();
    enable_search('<?php echo site_url("$controller_name/suggest")?>','<?php echo $this->lang->line("common_confirm_search")?>');
    enable_email('<?php echo site_url("$controller_name/mailto")?>');
	enable_delete('<?php echo $this->lang->line($controller_name."_confirm_delete")?>','<?php echo $this->lang->line($controller_name."_none_selected")?>');
	
	/* BOTON DE AGREGADO DE DIRECCIONES */
	if(document.getElementById("btn_add_customer_travel") !== null){
		const btn_add_customer_travel = document.getElementById("btn_add_customer_travel");
		btn_add_customer_travel.addEventListener("click" ,() => {
			travel.saveCustomerAddress();
		});
	}

	/* BOTON DE AGREGADO DE PASAPORTES */
	if(document.getElementById("btn_add_customer_passport") !== null){
		const btn_add_customer_passport = document.getElementById("btn_add_customer_passport");
		btn_add_customer_passport.addEventListener("click" ,() => {
			travel.saveCustomerPassport();
		});
	}

	/* BOTON DE AGREGADO DE PASAPORTES */
	if(document.getElementById("btn_add_customer_card") !== null){
		const btn_add_customer_card = document.getElementById("btn_add_customer_card");
		btn_add_customer_card.addEventListener("click" ,() => {
			travel.saveCustomerCard();
		});
	}

	/* BOTON DE AGREGADO DE PASAPORTES */
	if(document.getElementById("btn_add_customer_company") !== null){
		const btn_add_customer_company = document.getElementById("btn_add_customer_company");
		btn_add_customer_company.addEventListener("click" ,() => {
			travel.saveCustomerCompany();
		});
	}

	/* BOTON DE AGREGADO DE FAMILIARES */
	if(document.getElementById("btn_add_familiares") !== null){
		const btn_add_familiares = document.getElementById("btn_add_familiares");
		btn_add_familiares.addEventListener("click" ,() => {
			travel.saveFamiliar();
		});
	}

	/* BOTON DE AGREGADO DE PREFERENCIAS DE ASIENTO */
	if(document.getElementById("btn_add_indicaciones") !== null){
		const btn_add_indicaciones = document.getElementById("btn_add_indicaciones");
		btn_add_indicaciones.addEventListener("click" ,() => {
			travel.savePreferenciasAsiento();
		});
	}

	/* BOTON DE AGREGADO DE INFO DE TARJETAS */
	if(document.getElementById("btn_add_tarjetas") !== null){
		const btn_add_tarjetas = document.getElementById("btn_add_tarjetas");
		btn_add_tarjetas.addEventListener("click" ,() => {
			travel.saveTarjetas();
		});
	}

	/* BOTON DE AGREGADO DE VISADO */
	if(document.getElementById("btn_add_customer_visado") !== null){
		const btn_add_customer_visado = document.getElementById("btn_add_customer_visado");
		btn_add_customer_visado.addEventListener("click" ,() => {
			travel.saveCustomerVisado();
		});
	}

	/* BOTON DE AGREGADO DE CONTACTOS */
	if(document.getElementById("btn_add_customer_contacts") !== null){
		const btn_add_customer_contacts = document.getElementById("btn_add_customer_contacts");
		btn_add_customer_contacts.addEventListener("click" ,() => {
			travel.saveCustomerContacts();
		});
	}

	/* BOTON DE AGREGADO DE DOCUMENTOS */
	if(document.getElementById("btn_add_customer_doc") !== null){
		const btn_add_customer_doc = document.getElementById("btn_add_customer_doc");
		btn_add_customer_doc.addEventListener("click" ,() => {
			travel.saveCustomerDocuments();
		});
	}

	if(document.getElementById("btn_add_customer_phones") !== null){
		const btn_add_customer_phones = document.getElementById("btn_add_customer_phones");
		btn_add_customer_phones.addEventListener("click" ,() => {
			travel.saveCustomerPhones();
		});
	}

	if(document.getElementById("btn_add_customer_emails") !== null){
		const btn_add_customer_emails = document.getElementById("btn_add_customer_emails");
		btn_add_customer_emails.addEventListener("click", () => {
			travel.saveCustomerEmails();
		});
	}

	if(document.getElementById("btn_add_customer_frec") !== null){
		const btn_add_customer_frec = document.getElementById("btn_add_customer_frec");
		btn_add_customer_frec.addEventListener("click", () => {
			travel.saveCustomerFrec();
		});
	}

	if(document.getElementById("btn_add_customer_frec") !== null){
		const btn_save_customer = document.getElementById("btn_save_customer");
		btn_save_customer.addEventListener("click", () => {
			var validator = $('#form_customer_register').data('bootstrapValidator');
			validator.validate();
			return validator.isValid();
		});
	}

	$("#form_customer_register").bootstrapValidator({
		container: '#messages',
		feedbackIcons: {
	      valid: 'glyphicon glyphicon-ok',
	      invalid: 'glyphicon glyphicon-remove',
	      validating: 'glyphicon glyphicon-refresh'
	    },
	    fields: {
			type_customer_doc:{
				validators: {
	    			notEmpty: { message: "El campo tipo de documento es requerido"}
	    		}
			},
			nro_customer_doc:{
				validators: {
	    			notEmpty: { message: "El campo número de documento es requerido"}
	    		}
			},
			first_name: {
	    		validators: {
	    			notEmpty: { message: "El campo nombre es requerido"}
	    		}
			},
			midle_name: {
	    		validators: {
	    			notEmpty: { message: "El campo pre-nombre es requerido"}
	    		}
			},
			last_name:{
				validators: {
	    			notEmpty: { message: "El campo apellidos paterno es requerido"}
	    		}
			},
			last_name_mothers:{
				validators: {
	    			notEmpty: { message: "El campo apellidos materno es requerido"}
	    		}
			},
			last_name_casada:{
				validators: {
	    			notEmpty: { message: "El campo apellido de casada es requerido"}
	    		}
			},
			gender:{
				validators: {
	    			notEmpty: { message: "El campo género es requerido"}
	    		}
			},
			age:{
				validators: {
	    			notEmpty: { message: "El campo edad es requerido"}
	    		}
			},
			date_expire:{
				validators: {
					notEmpty: { message: "El campo fecha de nacimiento es requerido"}
	    		}
			}
		}
	}).on('success.form.bv', function(e) {
		e.preventDefault();
		$("#btn_save_customer").prop("disabled", false);
		var data = {};
		data.address = travel.customer_address_list;
		data.passport = travel.customer_passport_list;
		data.card = travel.customer_card_list;
		data.company = travel.customer_company_list;
		data.visado = travel.customer_visado_list;
		data.contact = travel.customer_contact_list;
		data.documents = travel.customer_documents_list;
		data.phones = travel.customer_phones_list;
		data.emails = travel.customer_emails_list;
		data.frec = travel.customer_frec_list;
		data.familiares = travel.customer_familiares_list;
		data.asiento = travel.preferencia_asiento_list;
		data.tarjtas = travel.customer_tarjtas_list;
		$("#client_data").val(JSON.stringify(data));
		$.ajax({
            type:"POST",
            url:$("#form_customer_register").attr('action'),
            data:$("#form_customer_register").serialize(),
            success:function(msg){
                console.log(msg);
            }
		});
	});

}); 

function init_table_sorting()
{
	//Only init if there is more than one row
	if($('.tablesorter tbody tr').length >1)
	{
		$("#sortable_table").tablesorter(
		{ 
			sortList: [[1,0]], 
			headers: 
			{ 
				0: { sorter: false}, 
				5: { sorter: false} 
			} 

		}); 
	}
}

function post_person_form_submit(response)
{
	if(!response.success)
	{
		set_feedback(response.message,'error_message',true);	
	}
	else
	{
		//This is an update, just update one row
		if(jQuery.inArray(response.person_id,get_visible_checkbox_ids()) != -1)
		{
			update_row(response.person_id,'<?php echo site_url("$controller_name/get_row")?>');
			set_feedback(response.message,'success_message',false);	
			
		}
		else //refresh entire table
		{
			do_search(true,function()
			{
				//highlight new row
				hightlight_row(response.person_id);
				set_feedback(response.message,'success_message',false);		
			});
		}
	}
}
</script>

<div id="title_bar">
	<div id="title" class="float_left"><?php echo $this->lang->line('common_list_of').' '.$this->lang->line('module_'.$controller_name); ?></div>
		<div id="new_button">
		<?php //echo anchor("$controller_name/view/-1/width:$form_width","".$this->lang->line($controller_name.'_new')."",array('class'=>'thickbox none btn btn-primary','title'=>$this->lang->line($controller_name.'_new')));?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_customer">
			Nuevo Cliente
		</button>
		<?php if ($controller_name =='customers') {?>
			<?php echo anchor("$controller_name/excel_import/width:$form_width",
			"Excel Import",
				array('class'=>'thickbox none btn btn-primary','title'=>'Import Items from Excel'));
			?>	
		<?php } ?>
	</div>
</div>
<?php echo $this->pagination->create_links();?>
<div id="table_action_header">
	<ul>
		<li class="float_left"><?php echo anchor("$controller_name/delete",$this->lang->line("common_delete"),array('id'=>'delete','class'=>'btn btn-primary')); ?></li>
		<li class="float_left"><a href="#" id="email" class="btn btn-primary"><?php echo $this->lang->line("common_email");?></a></li>
		<li class="float_right">
		<img src='<?php echo base_url()?>images/spinner_small.gif' alt='spinner' id='spinner' />
		<?php echo form_open("$controller_name/search",array('id'=>'search_form')); ?>
		<input type="text" name ='search' id='search'/>
		</form>
		</li>
	</ul>
</div>
<div id="table_holder">
	<?php echo $manage_table; ?>
</div>
<div id="feedback_bar"></div>
<?php $this->load->view("travel/modal"); ?>
<?php $this->load->view("partial/footer"); ?>