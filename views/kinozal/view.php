<?php 
/* @var $this yii\web\View */

if (!empty($model['images'])) {
    $filmObjectImage = json_decode($model['images']);
    $filmDetailImage = $filmObjectImage->detail_image ? 
                    $filmObjectImage->detail_image : 'no-image.jpg';
} else {
    $filmDetailImage = 'no-image.jpg';
}
$this->params['filmDetailImage'] = $filmDetailImage;
if ($showUpBlock) {    
    echo $this->render('blocks-up/'.$action,['model' => $model]);
}
    ?>
<section class="section-2">
    <div class="container">
        <p class="film-title"><?php echo $model->name ?></p>
        <div class="film-tabs" role=""tabpanel">
            <div class="film-tabs__wrapper">
                <ul class="film-tabs--nav nav nav-tabs" role="tablist">
                    <li role="presentation"<?php if (!empty($tabsConfig['view'])):?> class="<?php echo $tabsConfig['view']?>"<?php endif;?>>
                        <a href="/kinozal/<?php echo $slug ?>/view">Смотреть онлайн</a>
                    </li>
                    <li role="presentation" class="film-tabs__hidden">
                        <span>Кинопанорама</span>
                    </li>
                    <?php

                    ?>
                    <li role="presentation"<?php if (!empty($tabsConfig['comment'])):?> class="<?php echo $tabsConfig['comment']?>"<?php endif;?>>
                        <?php if ($showComments) :?>
                        <a href="/kinozal/<?php echo $slug ?>/comment">Комментарии</a>
                        <?php else :?>
                        <span>Комментарии</span>
                        <?php endif ;?>

                    </li>
                        <li role="presentation" class=" film-tabs__hidden">
                            <span>Трейлеры</span>
                        </li>
                    <li role="presentation" class=" film-tabs__hidden">
                        <span>Кадры из фильма</span>
                    </li>
                    <li role="presentation"<?php if (!empty($tabsConfig['creators'])):?> class="<?php echo $tabsConfig['creators']?>"<?php endif;?>>
                        <a href="/kinozal/<?php echo $slug ?>/creators">Создатели</a>
                    </li>
                    <li role="presentation">
                        <a href="#pop-enter" data-toggle="modal" data-id="555">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
                    </li>
                </ul>
            </div>
    <!--Tab panels-->
<?php echo $this->render('blocks-down/'.$action,['model' => $model]) ?>
    </div>
    </div>
</section>
<pre>
    
<?= count($model->availableComments) ?>
</pre>

