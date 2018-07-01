<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
                <?php
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
                    $numerodeletras=6; //numero de letras para generar el texto
                    $cadena = ""; //variable para almacenar la cadena generada
                            for($i=0;$i<$numerodeletras;$i++) {
                                        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
                                    }
                    $fecha = date("dmY");
                ?>
        <h4 class="modal-title">Cotizacion Nro: <?php echo "$cadena"."-"."$fecha"; ?> </h4>
        </div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
                <fieldset>
                    <legend>Datos del Cliente</legend>
                </fieldset>
    <?php if (isset($datos)): ?>
            <form id="form_customer_data" role="form">
                <div class="col-md-4" class="form-group">
                    <label>Nro. de Identificacion</label>
                    <input type="text" id="customer_document" name="customer_document" value="<?php echo $datos['person_id']; ?>" class="form-control" disabled />
                    <input type="hidden" id="customer_id" name="customer_id" />
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Nombres y Apellidos</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo $datos['firstname']; ?> <?php echo $datos['middlename']; ?> <?php echo $datos['lastname']; ?> <?php echo $datos['mother_lastname']; ?>" class="form-control" disabled/>
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Direccion</label>
                    <textarea id="customer_address" name="customer_address" class="form-control" placeholder="Dirección" disabled="true"></textarea>
                </div>
            </form>
    <?php else: echo 'La entrada no existe.'; endif; ?>
        </div>



    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo form_open('travel/saveComision',array('id'=>'form_travel_comision_save','class' => 'form-inline')); ?>
            <fieldset>
                <legend>Registro de Servicios</legend>
                  <div class="form-group mx-sm-3 mb-2">
                    <select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
                        <option value="">Seleccionar Tipo de Servicio</option>
                        <?php foreach ($property as $key => $value) {?>
                            <option value="<?= $value["id"]; ?>" data-key="<?= $value["key"]; ?>"><?= $value["name"]; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                <div class="form-group">
                    <input type="number" id="amount_travel" name="amount_travel" class="form-control" value="0" style="display: none"/>
                </div>
                  <button id="btn_save_com" type="button" class="btn btn-primary">Agregar Servicio</button>
                  <button style="float: right" type="button" class="btn btn-primary btn_save_travel">Guardar Viaje</button>
            </fieldset>
            <div class="alert alert-danger alert-dismissible error_comision"></div>
        <?php echo form_close(); ?>
    </div>

    <div class="col-md-12">
        <br/>
        <form>
            <table id="table_customer_travel" class="table table-hover table-bordered" >
                <thead>
                    <tr>
                        <th class="col-md-1"><center>Nro.</center></th>
                        <th class="col-md-4"><center>Servicios</center></th>
                        <th class="col-md-4"><center>Ticket</center></th>
                        <th class="col-md-2"><center>Monto</center></th> 
                        <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>
<!-- MODAL DE CONFIRMACIÓN -->

<div id="modal_success" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h3 class="modal-title messages_modal">Operación Correcta</h3>
                    <br/>
                    <button type="button" class="btn btn-primary btn_success" data-dismiss="modal">Aceptar</button>
                </center>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view("travel/modal"); ?>
<!-- ====================== -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".error_comision").hide();
        travel.setTravelCode();
        $("#search_value").on('input', function () {
           travel.setCustomerFilter();
        });
        $("#btn_save_com").click(function(){
            travel.addComision();
        });
        $(".btn_success").click(function(){
            location.reload();
        });
        $('.btn_save_travel').on("click", function () {
            var validator = $('#form_travel_save').data('bootstrapValidator');
            validator.validate();
            return validator.isValid();
        });
        $('.btn_update_comision').on("click", function () {
            var validator = $('#form_travel_comision_update').data('bootstrapValidator');
            validator.validate();
            return validator.isValid();
        });

        $('.btn_cotizacion').on("click", function () {
            $("#modal_cotizacion").modal("hide");
            travel.saveInfoTablas();
        });

        $('#showLastTravel').hide();

        $('form input').on('keypress', function(e) {
            return e.which !== 13;
        });

        $('#div_penalidad').hide();
        $('#div_feepenalidad').hide();

        travel.saveCustomer();
        //travel.addComision('fee');
        travel.validateFormTravel();
        travel.validateFormUpdateComision();
        travel.formCotizacion();
        travel.getViajes();

        $('#btn_nuevo_cliente2').click(function(){
            $('#modal_cotizacion').modal('show');
        });

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

    });

</script>