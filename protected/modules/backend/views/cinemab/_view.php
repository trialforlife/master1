<?php
/* @var $this CinemaBannerController */
/* @var $data CinemaBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cb_id), array('view', 'id'=>$data->cb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php
    $cinema=Cinema::model()->findByPk($data->c_id);
    echo CHtml::encode($cinema->c_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cb_banner')); ?>:</b>
	<?php echo CHtml::image($data->cb_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cb_published')); ?>:</b>
    <?php
    $pub=($data->cb_published==0?"Нет":"Да");
    echo CHtml::encode($pub); ?>
	<br />


</div>