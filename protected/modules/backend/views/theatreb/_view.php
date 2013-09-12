<?php
/* @var $this CinemaBannerController */
/* @var $data CinemaBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tb_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tb_id), array('view', 'id'=>$data->tb_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_id')); ?>:</b>
	<?php
    $cinema=Theatre::model()->findByPk($data->t_id);
    echo CHtml::encode($cinema->t_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tb_banner')); ?>:</b>
	<?php echo CHtml::image($data->tb_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tb_published')); ?>:</b>
    <?php
    $pub=($data->tb_published==0?"Нет":"Да");
    echo CHtml::encode($pub); ?>
	<br />


</div>