<?php
/* @var $this ShipmentBannerController */
/* @var $data ShipmentBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sb_id), array('view', 'id'=>$data->sb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_id')); ?>:</b>
	<?php echo CHtml::encode($data->s_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sb_banner')); ?>:</b>
	<?php echo CHtml::encode($data->sb_banner); ?>
	<br />


</div>