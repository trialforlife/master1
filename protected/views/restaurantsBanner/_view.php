<?php
/* @var $this RestaurantsBannerController */
/* @var $data RestaurantsBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rb_id), array('view', 'id'=>$data->rb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_id')); ?>:</b>
	<?php echo CHtml::encode($data->r_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rb_banner')); ?>:</b>
	<?php echo CHtml::encode($data->rb_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rb_published')); ?>:</b>
	<?php echo CHtml::encode($data->rb_published); ?>
	<br />


</div>