<?php
/* @var $this PlayController */
/* @var $data Play */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->p_id), array('view', 'id'=>$data->p_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_id')); ?>:</b>
	<?php echo CHtml::encode($data->t_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_name')); ?>:</b>
	<?php echo CHtml::encode($data->p_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_time')); ?>:</b>
	<?php echo CHtml::encode($data->p_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_content')); ?>:</b>
	<?php echo CHtml::encode($data->p_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_price')); ?>:</b>
	<?php echo CHtml::encode($data->p_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_image')); ?>:</b>
	<?php echo CHtml::encode($data->p_image); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('p_published')); ?>:</b>
	<?php echo CHtml::encode($data->p_published); ?>
	<br />

	*/ ?>

</div>