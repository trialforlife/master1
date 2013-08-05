<?php
/* @var $this RestaurantsController */
/* @var $data Restaurants */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->r_id), array('view', 'id'=>$data->r_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_name')); ?>:</b>
	<?php echo CHtml::encode($data->r_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_image')); ?>:</b>
	<?php echo CHtml::encode($data->r_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_published')); ?>:</b>
	<?php echo CHtml::encode($data->r_published); ?>
	<br />


</div>