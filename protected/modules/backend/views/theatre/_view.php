<?php
/* @var $this CinemaController */
/* @var $data Cinema */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->t_id), array('view', 'id'=>$data->t_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_name')); ?>:</b>
	<?php echo CHtml::encode($data->t_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_adress')); ?>:</b>
	<?php echo CHtml::encode($data->t_adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_published')); ?>:</b>
    <?php echo ($data->t_published==0 ? CHtml::encode("Нет") : CHtml::encode("Да")); ?>
	<br />


</div>