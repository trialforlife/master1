<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->com_id), array('view', 'id'=>$data->com_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_quote')); ?>:</b>
	<?php echo CHtml::encode($data->com_quote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_logo')); ?>:</b>
	<?php echo CHtml::encode($data->com_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_description')); ?>:</b>
	<?php echo CHtml::encode($data->com_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_phone')); ?>:</b>
	<?php echo CHtml::encode($data->com_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_site')); ?>:</b>
	<?php echo CHtml::encode($data->com_site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_published')); ?>:</b>
	<?php echo CHtml::encode($data->com_published); ?>
	<br />


</div>