<?php
/* @var $this BeautyandhealthController */
/* @var $data Beautyandhealth */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bh_id), array('view', 'id'=>$data->bh_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_name')); ?>:</b>
	<?php echo CHtml::encode($data->bh_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_image')); ?>:</b>
	<?php echo CHtml::encode($data->bh_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_published')); ?>:</b>
	<?php echo CHtml::encode($data->bh_published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_adress')); ?>:</b>
	<?php echo CHtml::encode($data->bh_adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_phone')); ?>:</b>
	<?php echo CHtml::encode($data->bh_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bh_banner')); ?>:</b>
	<?php echo CHtml::encode($data->bh_banner); ?>
	<br />


</div>