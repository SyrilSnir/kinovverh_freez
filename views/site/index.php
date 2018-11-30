<?php

//use Yii;
use \yii\helpers\Html;
use app\assets\AppAsset;


/* @var $this yii\web\View */
$this->registerJsFile('@web/js/owl.carousel.min.js',[
    'depends' => '\app\assets\AppAsset']);
$this->registerCssFile('@web/css/owl.carousel.css');
$this->registerCssFile('@web/css/owl.theme.css');
$this->title = 'ДОБРО ПОЖАЛОВАТЬ В ОНЛАЙН КИНОЗАЛ КИНОКОМПАНИИ "ВВЕРХ"!';
$carousel_js = <<<JS
    jQuery (function($) {
    function setSlider(){
	$("#1top_slider .1carousel-inner").owlCarousel({
		singleItem: true,
		navigation: true,
		autoplayTimeout: 3000,
		responsiveClass: true,
		//Basic Speeds
	    slideSpeed: 800,
	    paginationSpeed : 800,
	    rewindSpeed : 1000,
	 
	    //Autoplay
	    autoPlay : true,
	    stopOnHover : true,
	    navigationText: ["<a class=\"left carousel-control\" href=\"#top_slider\" data-slide=\"prev\"><span class=\"glyphicon  fa fa-arrow-left\" aria-hidden=\"true\"></span><span class=\"sr-only\">Prev</span>",
	    				"<a class=\"right carousel-control\" href=\"#top_slider\" data-slide=\"next\"><span class=\"glyphicon fa fa-arrow-right\" aria-hidden=\"true\"></span><span class=\"sr-only\">Next</span></a>"],
	});
    };
 setTimeout(function(){setSlider()}, 100);   
});
JS;
$this->registerJs($carousel_js,yii\web\View::POS_END);
        


?>
            <div id="1top_slider" class="1carousel 1slide" data-ride="1carousel">
		<div class="1carousel-inner">
							<div class="1item active">
						<a href="/kinozal/skaz-o-petre-i-fevronii/view/">
							<?= Html::img('@web/img/carousel/petr.jpg',array('class' => 'img-responsive'))?>
						</a>
							<div class="container">
								<div class="carousel-caption hidden-mobile">
									<div class="col-md-offset-6">
																					<p class="caption-btn">
												<a class="caption-btn__btn " href="/kinozal/skaz-o-petre-i-fevronii/view/" role="button">Смотреть онлайн</a>
												<a class="caption-btn__btn " href="/kinozal/skaz-o-petre-i-fevronii/panorama/" role="button">Кинопанорама</a>
												<a class="caption-btn__btn caption-btn__btn--inverse" href="#pop-enter" role="button" data-id="608" data-toggle="modal">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
											</p>
																			</div>
								</div>
							</div>
						</div>
							<div class="1item ">
						<a href="/kinozal/zashchitniki-asteroid-1aya-seriya/view/">
							<?= Html::img('@web/img/carousel/zaschitniki.jpg',array('class' => 'img-responsive'))?>
						</a>
							<div class="container">
								<div class="carousel-caption hidden-mobile">
									<div class="col-md-offset-6">
																					<p class="caption-btn">
												<a class="caption-btn__btn " href="/kinozal/zashchitniki-asteroid-1aya-seriya/view/" role="button">Смотреть онлайн</a>
												<a class="caption-btn__btn " href="/kinozal/zashchitniki-asteroid-1aya-seriya/panorama/" role="button">Кинопанорама</a>
												<a class="caption-btn__btn caption-btn__btn--inverse" href="#pop-enter" role="button" data-id="564" data-toggle="modal">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
											</p>
																			</div>
								</div>
							</div>
						</div>
							<div class="1item ">
						<a href="/kinozal/gnev/view/">
							<?= Html::img('@web/img/carousel/gnev.jpg',array('class' => 'img-responsive'))?>
						</a>
							<div class="container">
								<div class="carousel-caption hidden-mobile">
									<div class="col-md-offset-6">
																					<p class="caption-btn">
												<a class="caption-btn__btn " href="/kinozal/gnev/view/" role="button">Смотреть онлайн</a>
												<a class="caption-btn__btn " href="/kinozal/gnev/panorama/" role="button">Кинопанорама</a>
												<a class="caption-btn__btn caption-btn__btn--inverse" href="#pop-enter" role="button" data-id="548" data-toggle="modal">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
											</p>
																			</div>
								</div>
							</div>
						</div>
							<div class="1item ">
						<a href="/kinozal/khudozhestvennyy-film-ryabinovyy-vals/view/">
							<?= Html::img('@web/img/carousel/vals.jpg',array('class' => 'img-responsive'))?>
						</a>
							<div class="container">
								<div class="carousel-caption hidden-mobile">
									<div class="col-md-offset-6">
																					<p class="caption-btn">
												<a class="caption-btn__btn " href="/kinozal/khudozhestvennyy-film-ryabinovyy-vals/view/" role="button">Смотреть онлайн</a>
												<a class="caption-btn__btn " href="/kinozal/khudozhestvennyy-film-ryabinovyy-vals/panorama/" role="button">Кинопанорама</a>
												<a class="caption-btn__btn caption-btn__btn--inverse" href="#pop-enter" role="button" data-id="219" data-toggle="modal">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
											</p>
																			</div>
								</div>
							</div>
						</div>
								 

		</div>	
            </div>
            <section id="f-cat" class="f-cat-home">
  		<div class="f-cat-bg"></div>
  		<div class="container">
                    <p class="h-title">Выберите категорию:</p>
                    <div class="cat-buttons row">
                        <div class=" col-xs-3 col-xs-offset-0">
                            <a href="/kinozal/categories/6plus/" class="f-btton">6<span>+</span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="/kinozal/categories/10plus/" class="f-btton">10<span>+</span></a>
                       </div>
                        <div class="col-xs-3">
                            <a href="/kinozal/categories/14plus/" class="f-btton">14<span>+</span></a>
                        </div>
                        <div class="f-btton-all col-xs-3">
                            <a href="/kinozal/categories/" class="f-btton f-btton__all">Все<span>фильмы</span></a>
                        </div>
                    </div>
		</div>
            </section>

