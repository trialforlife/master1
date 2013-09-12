<?php
/* @var $this CinemaController */
/* @var $data Cinema */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->c_id), array('view', 'id'=>$data->c_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_name')); ?>:</b>
	<?php echo CHtml::encode($data->c_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_adress')); ?>:</b>
	<?php echo CHtml::encode($data->c_adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_published')); ?>:</b>
    <?php echo ($data->c_published==0 ? CHtml::encode("Нет") : CHtml::encode("Да")); ?>
	<br />


</div>