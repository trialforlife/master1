<?php
/* @var $this FilmsController */
/* @var $data Films */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->f_id), array('view', 'id'=>$data->f_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::encode($data->c_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_name')); ?>:</b>
	<?php echo CHtml::encode($data->f_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_time')); ?>:</b>
	<?php echo CHtml::encode($data->f_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_price')); ?>:</b>
	<?php echo CHtml::encode($data->f_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_content')); ?>:</b>
	<?php echo CHtml::encode($data->f_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_image')); ?>:</b>
	<?php echo CHtml::encode($data->f_image); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('f_published')); ?>:</b>
	<?php echo CHtml::encode($data->f_published); ?>
	<br />

	*/ ?>

</div>