<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ev_id), array('view', 'id'=>$data->ev_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_name')); ?>:</b>
	<?php echo CHtml::encode($data->ev_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_time')); ?>:</b>
	<?php echo CHtml::encode($data->ev_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_image')); ?>:</b>
	<?php echo CHtml::encode($data->ev_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_content')); ?>:</b>
	<?php echo CHtml::encode($data->ev_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_published')); ?>:</b>
	<?php echo CHtml::encode($data->ev_published); ?>
	<br />


</div>