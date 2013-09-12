<?php
/* @var $this NightlifeController */
/* @var $data Nightlife */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->n_id), array('view', 'id'=>$data->n_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_name')); ?>:</b>
	<?php echo CHtml::encode($data->n_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_image')); ?>:</b>
	<?php echo CHtml::encode($data->n_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_adress')); ?>:</b>
	<?php echo CHtml::encode($data->n_adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_time')); ?>:</b>
	<?php echo CHtml::encode($data->n_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_date')); ?>:</b>
	<?php echo CHtml::encode($data->n_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_banner')); ?>:</b>
	<?php echo CHtml::encode($data->n_banner); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('n_site')); ?>:</b>
	<?php echo CHtml::encode($data->n_site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_phone')); ?>:</b>
	<?php echo CHtml::encode($data->n_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_content')); ?>:</b>
	<?php echo CHtml::encode($data->n_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_published')); ?>:</b>
	<?php echo CHtml::encode($data->n_published); ?>
	<br />

	*/ ?>

</div>