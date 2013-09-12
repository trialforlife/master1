<?php
/* @var $this EntertainmentBannerController */
/* @var $data EntertainmentBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('enb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->enb_id), array('view', 'id'=>$data->enb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('en_id')); ?>:</b>
	<?php echo CHtml::encode($data->en_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enb_banner')); ?>:</b>
	<?php echo CHtml::encode($data->enb_banner); ?>
	<br />


</div>