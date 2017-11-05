<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/login.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Sysve</title>
	<script src="<?php echo base_url();?>js/jquery-1.9.1.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#login_form input:first").focus();
		});
	</script>
</head>
<body>

	<h1>YSUMMA</h1>
	<div class="logo">
	<!--
	<img src="<?php //echo base_url();?>images/ventas.png" alt="" />
	-->
	</div>
	<?php echo form_open('login') ?>
	<div id="container">
		<?php echo validation_errors(); ?>
		<div id="top">
			<?php echo $this->lang->line('login_login'); ?>
		</div>
		<div id="login_form">
			<div id="welcome_message">
				<?php //echo $this->lang->line('login_welcome_message'); ?>
			</div>
			<div class="form_field_label"><?php echo $this->lang->line('login_username'); ?>: </div>
			<div class="form_field">
				<?php echo form_input(array(
					'class'=>'form-control', 
					'name'=>'username', 
					'size'=>'20')); ?>
				</div>
				<div class="form_field_label"><?php echo $this->lang->line('login_password'); ?>: </div>
				<div class="form_field">
					<?php echo form_password(array(
						'class'=>'form-control', 
						'name'=>'password', 
						'size'=>'20')); ?>
					</div>
					<div id="submit_button">
						<?php echo form_submit(array(
							'name'=>'loginButton',
							'value'=>'Aceptar',
							'class'=>'btn btn-lg btn-primary btn-block')); ?>
						</div>
					</div>
					<a style="cursor: pointer;" data-toggle="modal" 
						data-target="#modal_registrate" >
						Registrate
					</a>
				</div>
				<?php echo form_close(); ?>

		  <!-- Modal -->
		  <div class="modal fade" id="modal_registrate" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Registrate</h4>
		        </div>
		        <div class="modal-body">
		          <form role="form" >
		          	<div class="form-group">
		          		<label class="form_field_label" >Nombres</label> 
		          		<input type="text" name="name" id="name" class="form-control">	
		          	</div>
		          	<div class="form-group">
		          		<label>Apellidos</label>
		          		<input type="text" name="lastname" id="lastname" class="form-control">
		          	</div>
		          	<div class="form-group">
		          		<label>Email</label>
		          		<input type="text" name="email" id="email" class="form-control">
		          	</div>
		          </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">
		          	Close
		          </button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
  




			</body>
			</html>
