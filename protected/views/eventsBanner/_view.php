<?php
/* @var $this EventsBannerController */
/* @var $data EventsBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('evb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->evb_id), array('view', 'id'=>$data->evb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ev_id')); ?>:</b>
	<?php echo CHtml::encode($data->ev_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evb_banner')); ?>:</b>
	<?php echo CHtml::encode($data->evb_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evb_published')); ?>:</b>
	<?php echo CHtml::encode($data->evb_published); ?>
	<br />


</div>