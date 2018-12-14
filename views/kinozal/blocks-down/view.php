<?php
use app\components\CommentsWidget;

if (!empty($model['images'])) {
    $filmObjectImage = json_decode($model['images']);
    $filmDetailImage = $filmObjectImage->detail_image ? 
                    $filmObjectImage->detail_image : 'no-image.jpg';
    } else {
        $filmDetailImage = 'no-image.jpg';
    }
?>
<div class="films-tabs__content tab-content">
    <div id="tab1" class="tab-pane active" role="tabpanel">
        <div class="row">
            <div class="col-md-3 hidden-mobile">
                <div class="film-tabs__img">                    
                    <img src="<?php echo _FILM_IMG_URI_ . $filmDetailImage ?>" class="img-responsive" alt="Image">
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
                    <a class="caption-btn__btn" href="/kinozal/zagaday-zhelanie/view/?VIEW=START" role="button">Смотреть онлайн</a>
                    <a class="caption-btn__btn" href="/kinozal/download/0/zagaday-zhelanie.mp4" role="button">Скачать</a>
                    <a class="caption-btn__btn caption-btn__btn--inverse" href="#pop-enter" data-toggle="modal" data-id="553" role="button">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
                </p>
                <p><?php echo $model->preview_text?></p>
                <?php echo CommentsWidget::widget(['film' => $model]) ?>
            </div>
        </div>                
    </div>  
</div>

