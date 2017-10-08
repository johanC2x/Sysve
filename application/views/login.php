<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/login.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Sysve</title>
	<script src="<?php echo base_url();?>js/jquery-1.2.6.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#login_form input:first").focus();
		});
	</script>
</head>
<body>

	<h1>Sistema de Ventas</h1>
	<div class="logo">
	<img src="<?php echo base_url();?>images/ventas.png" alt="" />
	</div>
	<?php echo form_open('login') ?>
	<div id="container">
		<?php echo validation_errors(); ?>
		<div id="top">
			<?php //echo $this->lang->line('login_login'); ?>
		</div>
		<div id="login_form">
			<div id="welcome_message">
				<?php echo $this->lang->line('login_welcome_message'); ?>
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
				</div>
				<?php echo form_close(); ?>
			</body>
			</html>
