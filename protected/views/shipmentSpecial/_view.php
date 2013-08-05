<?php
/* @var $this ShipmentSpecialController */
/* @var $data ShipmentSpecial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ss_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ss_id), array('view', 'id'=>$data->ss_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_id')); ?>:</b>
	<?php echo CHtml::encode($data->s_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ss_name')); ?>:</b>
	<?php echo CHtml::encode($data->ss_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ss_image')); ?>:</b>
	<?php echo CHtml::encode($data->ss_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ss_content')); ?>:</b>
	<?php echo CHtml::encode($data->ss_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ss_price')); ?>:</b>
	<?php echo CHtml::encode($data->ss_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ss_published')); ?>:</b>
	<?php echo CHtml::encode($data->ss_published); ?>
	<br />


</div>