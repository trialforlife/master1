<?php
/* @var $this CinemaController */
/* @var $data Cinema */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->r_id), array('view', 'id'=>$data->r_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_name')); ?>:</b>
	<?php echo CHtml::encode($data->r_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_adress')); ?>:</b>
	<?php echo CHtml::encode($data->r_adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_published')); ?>:</b>
    <?php echo ($data->r_published==0 ? CHtml::encode("Нет") : CHtml::encode("Да")); ?>
	<br />


</div>