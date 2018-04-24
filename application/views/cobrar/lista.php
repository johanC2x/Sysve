<?php $this->load->view("partial/header"); ?>
<script src="<?php echo base_url();?>js/lib/cobrar.js" type="text/javascript" language="javascript" charset="UTF-8"></script>


<div class="row">
	<div class="col-md-12">
		<table id="table_payment" class="table table-hover table-bordered" >
			<thead>
				<tr>
					<th class="col-md-1"></th>
					<th class="col-md-1"><center>Código.</center></th>
					<th class="col-md-3"><center>Cliente</center></th>
					<th class="col-md-2"><center>Viaje</center></th>
					<th class="col-md-2"><center>Origen</center></th>
					<th class="col-md-2"><center>Destino</center></th>
					<th class="col-md-1"><center>Acción</center></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="7">
						<center>
							No se registraron datos.
						</center>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
      	<input type="text" name="id_borrar" id="id_borrar">
        <p>¿Desea anular este viaje?.</p>
      </div>
      <div class="modal-footer">
        <button id="btn_aceptar" type="button" class="btn btn-default" data-dismiss="modal" onclick="cobrar.borrarViajes();">SI</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		cobrar.getViajes();
	})
</script>