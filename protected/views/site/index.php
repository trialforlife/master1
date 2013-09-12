<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

	<div class="main_slider_wrap">
		<div class="main_slider_controls">
			<div class="main_slider_view">
				<ul class="main_slider">
					<?php $models = Banner::model()->findAll('city_id=:city_id', array(':city_id'=>Yii::app()->params['city']));
					foreach ($models as $model) {
					?>
					<li class="main_slider__item">
						<a class="main_slider__item__link" href="<?php echo $model->banner_href; ?>">
							<img src="<?php echo $model->banner_back; ?>" class="main_slider__item__layer main_slider__item__layer_1" alt=""/>
							<img src="<?php echo $model->banner_middle; ?>" class="main_slider__item__layer main_slider__item__layer_2" alt=""/>
							<img src="<?php echo $model->banner_front; ?>" class="main_slider__item__layer main_slider__item__layer_3" alt=""/>
							<div class="main_slider__item__desc">
								<?php echo $model->banner_title; ?>
							</div>
						</a>
					</li>
					<?php  }  ?>
				</ul>
			</div>

			<div class="main_slider_controls__prev"></div>
			<div class="main_slider_controls__next"></div>
		</div>
	</div>

	<div class="main_slider_separator"></div>

	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
		var slide_width = 615,
			center = false;

		$('.main_slider__item:not(.main_slider__item_active) .main_slider__item__desc').hide();

		$('.main_slider').bxSlider({
			slideWidth: slide_width,
			pager:false,
			prevSelector: '.main_slider_controls__prev',
			nextSelector: '.main_slider_controls__next',
			prevText: '',
			nextText: '',
			minSlides: 3,
			maxSlides: 3,
			moveSlides: 1,
			onSlideBefore: function($slideElement, oldIndex, newIndex){
				$('.main_slider__item').removeClass('main_slider__item_active');
				$('.main_slider__item__desc').fadeOut(200);
				$('.main_slider__item__layer').animate({'margin-left':0},200);
				center = false;
			},
			onSlideAfter: function($slideElement, oldIndex, newIndex){
				$('.main_slider__item__desc', $slideElement.next()).fadeIn(100);
				$slideElement.next().addClass('main_slider__item_active');
			}
		});

		/* parallax */
		$(window).on('mousemove', function(e) {
			if(!center) {
				center = e.pageX;
			}

			var active = $('.main_slider__item_active'),
				layer_1 = $('.main_slider__item__layer_1', active),
				layer_2 = $('.main_slider__item__layer_2', active),
				layer_3 = $('.main_slider__item__layer_3', active),
				mouseX = e.pageX,
				newPos = (mouseX - center) / 6;

			layer_1.css({'margin-left':newPos / 4});
			layer_2.css({'margin-left':newPos / 2.5});
			layer_3.css({'margin-left':newPos / 1.4});
		})
	</script>

	<div class="wrapper_v1">
		<ul class="list_v1 list_4 clearfix mt_50">
			<?php foreach ($events as $event) { ?>
			<li class="list_v1__item">
				<a href="/events/details/id/<?php echo $event->item_id; ?>" class="photo_w168h116 photo_bordered mb_11">
					<img src="<?php echo $event->image_path; ?>" alt="" width="168" height="116"/>
				</a>
				<div class="list_date mb_2"><?php echo $event->event_date; ?></div>
				<a href="/events/details/id/<?php echo $event->item_id; ?>" class="list_title link_v2"><?php echo $event->title; ?></a>
			</li>
			<?php } ?>
		</ul>

		<div class="text_right">
			<a class="link_btn" href="/events"><?php echo Yii::t('main', 'Все новости, акции и события'); ?></a>
		</div>
	</div>