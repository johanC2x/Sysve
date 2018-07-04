<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/travel.js"></script>
<div id="title_bar">
	<div id="title" class="float_left">
        Lista de Clientes
    </div>
    <div id="new_button">
        <button type="button" class="btn btn-primary" onclick="travel.openModal();">
            Nuevo Cliente
        </button>
    </div>
</div>
<div class="input-group"> <span class="input-group-addon">Buscar</span>

    <input id="filter" type="text" class="form-control" placeholder="Escriba aquí...">
</div>
<div id="table_holder">
    <table class="table table-bordered" id="table_clients">
        <thead>
            <tr class="well">
                <th><center>Nombres</center></th>
                <th><center>Apellidos</center></th>
                <th><center>Nro. DNI</center></th>
                <th><center>Genero</center></th>
                <th><center>Email</center></th>
                <th><center>Teléfono</center></th>
                <th colspan="2"><center>Acciones</center></th>
            </tr>
        </thead>
        <tbody class="searchable">
            <tr>
                <td colspan="7">
                    <center>
                        NO SE ENCONTRARON RESULTADOS
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div id="feedback_bar"></div>
<!-- MODAL DELETE CLIENT -->
<div class="modal fade" id="modal_delete_client" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h3>
					<center>
						¿Seguro desea eliminar el siguiente registro?
					</center>
				</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="travel.deleteClient(travel.current_id,true);">Eliminar</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        travel.current_url = "<?= base_url();?>";

        /* LISTANDO CLIENTES */
        travel.listClients();

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
                /*
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
                */
                first_name: {
                    validators: {
                        notEmpty: { message: "El campo nombre es requerido"}
                    }
                },
 /*               midle_name: {
                    validators: {
                        notEmpty: { message: "El campo pre-nombre es requerido"}
                    }
                },
 */               last_name:{
                    validators: {
                        notEmpty: { message: "El campo apellidos paterno es requerido"}
                    }
                },
/*                last_name_mothers:{
                    validators: {
                        notEmpty: { message: "El campo apellidos materno es requerido"}
                    }
                },
                last_name_casada:{
                    validators: {
                        notEmpty: { message: "El campo apellido de casada es requerido"}
                    }
                },
*/                gender:{
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
                url:travel.action_form,
                data:$("#form_customer_register").serialize(),
                success:function(res){
                    var response = JSON.parse(res);
                    $("#modal_customer").modal("hide");
                    if(response.success){
                        travel.listClients();
                        $("#modal_success").modal("show");
                    }else{
                        $("#modal_error").modal("show");
                    }
                }
            });
        });
    });
    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
</script>

<?php $this->load->view("travel/modal"); ?>
<?php $this->load->view("partial/footer"); ?>
