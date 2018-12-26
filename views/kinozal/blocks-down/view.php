<?php
/* @var $model app\models\ActiveRecord\Films */
use app\components\CommentsWidget;
?>
<div class="films-tabs__content tab-content">
    <div id="tab1" class="tab-pane active" role="tabpanel">
        <div class="row">
            <div class="col-md-3 hidden-mobile">
                <div class="film-tabs__img">                    
                    <img src="<?php echo _FILM_IMG_URI_ . $this->params['filmDetailImage'] ?>" class="img-responsive" alt="Image">
                </div>
            </div>
            <div class="film-tabs__description col-md-9">
                <p>
                    <span>Год выпуска:</span> <?php echo $model->year ?>
                    <span>Страна:</span> Россия    
                    <span>Рейтинг:</span> <?php echo $model->rating ?>
                    <span>Жанр:</span> 										<span>Время:</span> 78 мин. / 01:18 мин.
                </p>
                <p class="caption-btn">
                    <a class="caption-btn__btn" href="/kinozal/<?php echo $model->code ?>/view/" role="button">Смотреть онлайн</a>
                    <a class="caption-btn__btn" href="/download/Alice.mp4" role="button">Скачать</a>
                    <a class="caption-btn__btn caption-btn__btn--inverse" href="#pop-enter" data-toggle="modal" data-id="553" role="button">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
                </p>
                <p><?php echo $model->preview_text?></p>
                <?php echo CommentsWidget::widget(['film' => $model]) ?>
            </div>
        </div>                
    </div>  
</div>

