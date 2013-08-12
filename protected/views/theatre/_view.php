<?php
/* @var $this TheatreController */
/* @var $data Theatre */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->t_id), array('view', 'id'=>$data->t_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_name')); ?>:</b>
	<?php echo CHtml::encode($data->t_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_image')); ?>:</b>
	<?php echo CHtml::encode($data->t_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_published')); ?>:</b>
	<?php echo CHtml::encode($data->t_published); ?>
	<br />


</div>