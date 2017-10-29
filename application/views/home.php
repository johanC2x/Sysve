<?php $this->load->view("partial/header"); ?>
<br />
<h3><?php //echo $this->lang->line('common_welcome_message'); ?></h3>
<div id="home_module_list">
	<?php $var = 2; ?>
	<?php foreach($allowed_modules->result() as $module) { ?>
		<div class="col-md-6">
			<div class="col-md-4">
				<a href="<?php echo site_url("$module->module_id");?>">
					<center>
						<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image" />
					</center>
				</a>
			</div>
			<div class="col-md-8">
				<a href="<?php echo site_url("$module->module_id");?>">
					<?php echo $this->lang->line("module_".$module->module_id) ?></a>
	 				- <?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
			</div>
		</div>
		<?php if($var === 2){ ?>
			<?=  "<br/>"; ?>
			<?php $var = 0;?>
		<?php } ?>
		<?php $var++; ?>
	<?php } ?>
</div>
<?php $this->load->view("partial/footer"); ?>