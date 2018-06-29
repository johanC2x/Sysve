<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url();?>" />
	<title>YSUMMA</title>
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/ospos.css" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/ospos_print.css"  media="print"/>
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/ospos_print.css"  media="print"/>
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/app.css"  media="print"/>
<!--
	<link rel="stylesheet" rev="stylesheet" href="<?php //echo base_url();?>css/bootstrap.css" />
	<link rel="stylesheet" rev="stylesheet" href="<?php //echo base_url();?>css/bootstrap.css" />
-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

	<script>BASE_URL = '<?php echo site_url(); ?>';</script>
<!--
	<script src="<?php //echo base_url();?>js/jquery-1.9.1.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery-migrate-1.1.0.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.color.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.metadata.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.tablesorter.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.ajax_queue.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.bgiframe.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.autocomplete.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<!--
	<script src="<?php echo base_url();?>js/jquery.validate.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	-->
	<script src="<?php echo base_url();?>js/jquery.jkey-1.1.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/thickbox.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/common.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/manage_tables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/swfobject.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/date.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/datepicker.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	
	<script src='<?php echo base_url();?>/js/bootstrapValidator.min.js'></script>
	<script src='<?php echo base_url();?>/js/moment.js'></script>
	<script src='<?php echo base_url();?>/js/es_ES.min.js'></script>
	<script src="<?php echo base_url();?>js/lib/ysumma.js"></script>
	<script src='<?php echo base_url();?>/js/lib/utils.js'></script>
	<script src="<?php echo base_url();?>js/lib/travel.js"></script>


	<style type="text/css">
		html {
			overflow: auto;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid"  style="height: 20px;">
			<div class="navbar-header">
				<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand" style="color:#51c0cf;"><b>YSUMMA</b></a>
			</div>
			<div class="navbar-collapse collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<?php foreach($allowed_modules->result() as $module){ ?>
			            	<li>
			            		<a href="<?php echo site_url("$module->module_id");?>" >
			            			<?php //echo $this->lang->line("module_".$module->module_id) ?>
			            			<?php echo $module->name; ?>
			            		</a>
			            	</li>
			            <?php } ?>
			        </li>
					<?php foreach($allowed_modules->result() as $module){ ?>
					<li class="menu_item">
						<!-- <a href="<?php //echo site_url("$module->module_id");?>"><img src="<?php //echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image" /></a><br /> -->
						<a href="<?php ///echo site_url("$module->module_id");?>" ><?php //echo $this->lang->line("module_".$module->module_id) ?></a>
					</li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a><?php //echo date('F d, Y h:i a') ?></a></li>
					<li> <a> <?php echo $this->lang->line('common_welcome')." $user_info->first_name $user_info->last_name! | "; ?></a></li>
					<li><?php echo anchor("home/logout",$this->lang->line("common_logout")); ?></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
	
	<div id="content_area_wrapper" >
		<div id="content_area" class="container .bs-item" >