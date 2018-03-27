<?php $propertys = isset($property_customer) ? $property_customer : [];?>

<?php if(sizeof($propertys) > 0 && !empty($propertys)){ ?>
	<div id="content_properties">
	<?php foreach ($propertys as $key => $value) { ?>
		<?php if($value["type"] === "date"){ ?>
			<div class="form-group">
			    <label class="wide" ><?= $value["name"]; ?></label>
			    <input type="date" id="date_<?=$value["id"];?>" name="date_<?=$value["id"];?>" class="date form-control" 
			     data-name="<?= $value["name"]; ?>"
			     data-type="<?= $value["type"]; ?>"/>
			    <!-- value="11/08/2012" -->
			</div>
		<?php } ?>
		<?php if($value["type"] === "text"){ ?>
			<div class="form-group">
				<label class="wide" ><?= $value["name"]; ?></label>
			    <input type="text_" id="text_<?=$value["id"];?>" name="text_<?=$value["id"];?>" class="form-control" 
			     data-name="<?= $value["name"]; ?>"
			     data-type="<?= $value["type"]; ?>"/>
			</div>
		<?php } ?>
	<?php } ?>
	</div>
<?php } ?>