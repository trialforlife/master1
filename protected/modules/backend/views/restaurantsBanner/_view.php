<?php
/* @var $this CinemaBannerController */
/* @var $data CinemaBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rb_id), array('view', 'id'=>$data->rb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_id')); ?>:</b>
	<?php
    $cinema=Restaurants::model()->findByPk($data->r_id);
    echo CHtml::encode($cinema->r_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rb_banner')); ?>:</b>
	<?php echo CHtml::image($data->rb_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rb_published')); ?>:</b>
    <?php
    $pub=($data->rb_published==0?"Нет":"Да");
    echo CHtml::encode($pub); ?>
	<br />


</div>