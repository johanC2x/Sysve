<?php $this->load->view("partial/header"); ?>




<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
                <?php
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
                    $numerodeletras=4; //numero de letras para generar el texto
                    $cadena = ""; //variable para almacenar la cadena generada
                            for($i=0;$i<$numerodeletras;$i++) {
                                        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
                                    }
                    $fecha = date("dm");
                    $cotizacion_id = $this->lang->lin.strtoupper("$user_info->first_name")."-".$cadena."-".$fecha."-C";
                ?>

        <h4 class="modal-title">Cotizacion Nro: <?php echo $cotizacion_id; ?></h4>
        </div>
    </div>
</div>
<hr/>
<div class="row">
        <div class="col-md-12">
                <fieldset>
                    <legend>Datos del Cliente</legend>
                </fieldset>
    <?php if (isset($datos)): ?>
            <form role="form" id="datos_cotizacion">
                <div class="col-md-2" class="form-group">
                    <label>Nro. de Identificacion</label>
                    <input type="text" id="customer_document" name="customer_document" value="<?php echo $datos['person_id']; ?>" class="form-control" disabled />
                    <input type="hidden" id="customer_id" name="customer_id" />
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Nombres y Apellidos</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo $datos['firstname']; ?> <?php echo $datos['middlename']; ?> <?php echo $datos['lastname']; ?> <?php echo $datos['mother_lastname']; ?>" class="form-control" disabled/>
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Email</label>
                    <input id="customer_address" name="customer_address" class="form-control" disabled/>
                </div>
                <div class="col-md-2" class="form-group">
                    <label>Telefono</label>
                    <input id="customer_address" name="customer_address" class="form-control" placeholder="celular_personal" disabled="true">
                </div><br>
                <div class="col-md-12">
                     <label>Observaciones</label>
                        <div class="form-group">
                           <textarea disabled id="descripcion" class="form-control" style="height: 90px;" value="<?php echo $datos['descripcion']; ?>" ></textarea>
                        </div>
                </div>
            </form>
    <?php else: echo 'La entrada no existe.'; endif; ?>
        </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <?php echo form_open('travel/saveComision',array('id'=>'form_travel_comision_save','class' => 'form-inline')); ?>
            <fieldset>
                <legend>Registro de Servicios</legend>
                  <div class="form-group mx-sm-3 mb-2">
                    <select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
                        <option value="">Seleccionar Tipo de Servicio</option>
                        <option value="">Vuelo</option>
                        <option value="">Hotel</option>
                        <option value="">Auto</option>
                        <option value="">Seguro</option>
                        <option value="">Paquete</option>
                        <option value="">Tours</option>
                        <option value="">Crucero</option>
                        <option value="">Trenes</option>
                        <option value="">Entradas</option>
                        <option value="">Vuelos de Regreso</option>
                        <option value="">Otros</option>
                    </select>
                  </div>
                <div class="form-group">
                    <input type="number" id="amount_travel" name="amount_travel" class="form-control" value="0" style="display: none"/>
                </div>
                  <button id="btn_save_com" type="button" class="btn btn-primary">Agregar Servicio</button>




<input type="button" class="btn btn-primary pull-right" onclick="printDiv('areaImprimir')" value="Generar Cotizacion" />

<script type="text/javascript">
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}
</script>







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
                        <th class="col-md-4"><center>Codigo</center></th>
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


<div id="modal_detail_comision" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Informacion del Servicio - Cotizacion Nro: <?php echo $this->lang->lin.strtoupper("$user_info->first_name"); ?>-<?php echo "$cadena"."-"."$fecha"; ?>-C</h4>
      </div>
            <div class="modal-body">
            <?php echo form_open('travel/updateDetailComision',array('id'=>'form_travel_comision_update')); ?>

<br/>

                        <div class="col-md-4" class="form-group">
                            <label for="code_travel">Servicio:</label>
                            <input type="text" name="code_travel" id="code_travel" class="form-control" />
                        </div>
                         <div class="col-md-4" class="form-group">
                            <label for="name_travel">Codigo:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                         <div class="col-md-4" class="form-group">
                            <label for="total_servicios">Monto:</label>
                            <input type="text" id="total_servicios" name="total_servicios" class="form-control" />
                        </div>


            <!-- =========== FORM ADDRESS ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>&nbsp;</legend>
                <div class="form-group">
                  <textarea id="descripcion" class="form-control" style="height: 300px;"></textarea>
                </div>
              </fieldset>
            </div>
            <!-- ===================================== -->


            <div class="form-group">
                    <input type="file" name="">
            </div>
                <?php echo form_close(); ?>
      <div class="modal-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-left" >Siguiente</button> 
                <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
            </div>

      </div>

            </div>
            </div>
            
        </div>


<div class="col-md-10" id="areaImprimir">

<div class="col-md-6">
    <img src="http://mundigea.com.pe/tpl/img/usuarios/666/logo1_img_250x100.png">
</div>
<br>
            <h4 class="modal-title">Cotizacion Nro: <?php echo $cotizacion_id; ?></h4>
<br>
                <div class="col-md-2" class="form-group">
                    <label>Nro. de Identificacion</label>
                    <input type="text" id="customer_document" name="customer_document" value="<?php echo $datos['person_id']; ?>" class="form-control" disabled />
                    <input type="hidden" id="customer_id" name="customer_id" />
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Nombres y Apellidos</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo $datos['firstname']; ?> <?php echo $datos['middlename']; ?> <?php echo $datos['lastname']; ?> <?php echo $datos['mother_lastname']; ?>" class="form-control" disabled/>
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Email</label>
                    <input id="customer_address" name="customer_address" class="form-control" disabled/>
                </div>
                <div class="col-md-2" class="form-group">
                    <label>Telefono</label>
                    <input id="customer_address" name="customer_address" class="form-control" placeholder="celular_personal" disabled="true">
                </div>
    <div class="col-md-12">
        <br/>
        <form>
            <table id="table_customer_travel" class="table table-hover table-bordered" >
                <thead>
                    <tr>
                        <th class="col-md-1"><center>Nro.</center></th>
                        <th class="col-md-4"><center>Servicios</center></th>
                        <th class="col-md-4"><center>Codigo</center></th>
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

        function imprimir_cotizacion(){
            VentanaCentrada('./pdf/documentos/ver_factura.php?id_factura='+id_cotizacion,'Factura','','1024','768','true');
        }


    });

</script>
<?php $this->load->view("partial/footer"); ?>
















