<?php
/* @var $this TheatreBannerController */
/* @var $data TheatreBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tb_id), array('view', 'id'=>$data->tb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_id')); ?>:</b>
	<?php echo CHtml::encode($data->t_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tb_banner')); ?>:</b>
	<?php echo CHtml::encode($data->tb_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tb_published')); ?>:</b>
	<?php echo CHtml::encode($data->tb_published); ?>
	<br />


</div>