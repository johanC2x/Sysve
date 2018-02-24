<?php $this->load->view("partial/header"); ?>
<br>
<h3><?php //echo $this->lang->line('common_welcome_message'); ?></h3>
<div id="home_module_list">
	<div class="container">
		<div class="row">
			<div class="col-md-12" >
				<?php foreach($allowed_modules->result() as $module) { ?>
					<div class="col-md-4" >
						<div class="panel panel-default col-md-10" >
							<div class="panel-header"> 
								<center>
									<a href="<?php echo site_url("$module->module_id");?>">
									<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" style="margin: 0 auto;width: 150px;" border="0" alt="Menubar Image" class="img-rounded"> 
									</a>
								</center>  
							</div>
    						<div class="panel-body">
    							<a href="<?php echo site_url("$module->module_id");?>">
    								<center>
    									<b>
    									<?php 
    										//echo strtoupper($this->lang->line("module_".$module->module_id));  
    										echo strtoupper($module->name);
    									?> 
    									</b> 
    								</center>
								</a>
	 							<?php //echo $this->lang->line('module_'.$module->module_id.'_desc');?>
    						</div>
  						</div>
					</div>
				<?php } ?>
			</div>		
		</div>
	</div> 
</div>
<?php $this->load->view("partial/footer"); ?>