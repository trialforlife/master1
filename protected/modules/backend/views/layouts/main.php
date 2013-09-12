<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adm/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adm/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adm/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adm/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adm/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Кинотеатры', 'url'=>array('/backend/cinema'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Театры', 'url'=>array('/backend/theatre'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Мероприятия', 'url'=>array('/backend/events'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Рестораны', 'url'=>array('/backend/restaurants'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Здоровье', 'url'=>array('/backend/beautyandhealth'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Клубы', 'url'=>array('/backend/restaurants'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Доставка', 'url'=>array('/backend/shipment'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Развлечения', 'url'=>array('/backend/entertainment'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'О нас', 'url'=>array('/backend/company'),
					'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Войти', 'url'=>array('/backend/auth/login'),
					'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/backend/auth/logout'), 
					'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php /*if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> AI llc.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
