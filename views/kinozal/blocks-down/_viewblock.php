<?php
/* @var $film app\models\ActiveRecord\Films */

?>
<div class="col-md-3">
        <div class="tabs-show">
                <div class="tabs-show__wrapper">
                    <a class="tabs-show__button btn active" href="/kinozal/<?php echo $film->code ?>/view/">Смотреть онлайн</a>
                        <a class="tabs-show__button btn" href="#pop-enter" data-toggle="modal" data-id="608">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
                        <a href="#" class="tabs-show__img">
                                <img src="<?php echo _FILM_IMG_URI_ . $this->params['filmDetailImage'] ?>" class="img-responsive" alt="Image">
                        </a>
                </div>
        </div>

</div>
