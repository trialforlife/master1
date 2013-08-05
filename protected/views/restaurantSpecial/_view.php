<?php
/* @var $this RestaurantSpecialController */
/* @var $data RestaurantSpecial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rs_id), array('view', 'id'=>$data->rs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_id')); ?>:</b>
	<?php echo CHtml::encode($data->r_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rs_name')); ?>:</b>
	<?php echo CHtml::encode($data->rs_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rs_image')); ?>:</b>
	<?php echo CHtml::encode($data->rs_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rs_content')); ?>:</b>
	<?php echo CHtml::encode($data->rs_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rs_price')); ?>:</b>
	<?php echo CHtml::encode($data->rs_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rs_published')); ?>:</b>
	<?php echo CHtml::encode($data->rs_published); ?>
	<br />


</div>