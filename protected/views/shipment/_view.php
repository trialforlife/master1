<?php
/* @var $this ShipmentController */
/* @var $data Shipment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->s_id), array('view', 'id'=>$data->s_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_name')); ?>:</b>
	<?php echo CHtml::encode($data->s_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_content')); ?>:</b>
	<?php echo CHtml::encode($data->s_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_image')); ?>:</b>
	<?php echo CHtml::encode($data->s_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_published')); ?>:</b>
	<?php echo CHtml::encode($data->s_published); ?>
	<br />


</div>