<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->city_id), array('view', 'id'=>$data->city_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_ru')); ?>:</b>
	<?php echo CHtml::encode($data->city_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_ua')); ?>:</b>
	<?php echo CHtml::encode($data->city_ua); ?>
	<br />


</div>