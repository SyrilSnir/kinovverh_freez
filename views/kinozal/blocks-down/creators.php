<div class="films-tabs__content tab-content">
    <div role="tabpanel" class="tab-pane active" id="tab6">
        <div class="col-md-9">
            <?php if (count($model->editors) > 0): ?>
            <?php if (count($model->editors) == 1): ?>
            <p class="reg-title">РЕЖИССЕР</p>
            <?php else:?>
            <p class="reg-title">РЕЖИССЕРЫ</p>
            <?php endif;
                $editorsList = '';
                foreach ($model->editors as $editor) {
                    $editorsList.=$editor->name .', ';
                }
                $editorsList = trim($editorsList,', ');
            ?>
		<ul class="reg-list">
                    <li class="reg-list__name"><?php echo $editorsList ?></li>
                </ul>
            <?php endif ;?>
            <?php if (count($model->actors) > 0): ?>
            <p class="akt-title">АКТЕРЫ</p>
                <ul class="akt-list">
                    <?php foreach ($model->actors as $actor ): ?>
                    <?php $index = 0 ?>
                    <li class="act-list__name"  data-toggle="collapse" data-target="#collapse<?php echo $index++?>" >
                        <span><?php echo $actor->name ?></span>
                    <ul class="act-list__desk collapse" id="collapse0">
                        <li><p></p></li>
                    </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
							</div>
							
							<div class="col-md-3">
								<div class="tabs-show">
									<div class="tabs-show__wrapper">
										<a class="tabs-show__button btn active" href="/kinozal/skaz-o-petre-i-fevronii/view/">Смотреть онлайн</a>
										<a class="tabs-show__button btn" href="#pop-enter" data-toggle="modal" data-id="608">Смотреть позже <i class="glyphicon glyphicon-bookmark"></i></a>
										<a href="#" class="tabs-show__img">
											<img src="/upload/iblock/6bc/6bc2e2248f8b17cbcb70023c1200be6e.jpg" class="img-responsive" alt="Image">
										</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
