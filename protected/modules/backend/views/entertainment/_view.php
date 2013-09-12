<?php
/* @var $this EntertainmentController */
/* @var $data Entertainment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->en_id), array('view', 'id'=>$data->en_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_name')); ?>:</b>
	<?php echo CHtml::encode($data->en_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_content')); ?>:</b>
	<?php echo CHtml::encode($data->en_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_image')); ?>:</b>
	<?php echo CHtml::encode($data->en_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_type')); ?>:</b>
	<?php echo CHtml::encode($data->en_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_time')); ?>:</b>
	<?php echo CHtml::encode($data->en_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_price')); ?>:</b>
	<?php echo CHtml::encode($data->en_price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('en_content_add')); ?>:</b>
	<?php echo CHtml::encode($data->en_content_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_published')); ?>:</b>
	<?php echo CHtml::encode($data->en_published); ?>
	<br />

	*/ ?>

</div>