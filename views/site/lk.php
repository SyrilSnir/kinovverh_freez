<?php
$this->title = 'Личный кабинет';
$user = Yii::$app->user->getIdentity();

?>

<section class="section-lk container">
    <h1 class="section-lk__title">Личный кабинет</h1>
    <div class="film-tabs hidden-mobile" role="tabpanel">
    <!-- Nav tabs -->
        <div class="film-tabs__wrapper">
            <ul class="film-tabs--nav nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Главная</a>
                </li>
                <li role="presentation">
                    <a href="#tab1" aria-controls="tab" role="tab" data-toggle="tab">Избранное</a>
                </li>
                <li role="presentation">
                    <a href="#tab2" aria-controls="tab" role="tab" data-toggle="tab">Мои покупки</a>
                </li>
                <li role="presentation" class=" navbar-right">
                    <span class="lk-schet">
                        <a href="#" class="lk-schet__button"><i class="fa fa-database" aria-hidden="true"></i> Счет: <b>0</b> р.</a>
                        <a href="#pop-pay-add" class="btn lk-schet__add" data-toggle="modal">Пополнить счет</a>
                    </span>
                </li>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="films-tabs__content tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <form action="" method="POST" role="form" class="lk-form form-horizontal col-md-10">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label"><i class="glyphicon glyphicon-envelope"></i> E-mail</label>
                        <div class="col-xs-9">
                            <div id="lk-form__mail">
                                <div class="input-group">
                                    <input name="EMAIL" disabled="disabled" value="<?=$user->login?>" data-default="alexwolf@inbox.ru" class="form-control col-xs-10" placeholder="Указать E-mail" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label"><i class="glyphicon glyphicon-user"></i> Ваше имя</label>
                        <div class="col-xs-9">
                            <div id="lk-form__name">
                                <div class="input-group">
                                    <input name="fio" disabled="disabled" value="<?=$user->fio ?>" data-default="Алексей" class="form-control" placeholder="Указать имя" type="text">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-pencil" title="Редактировать"></i>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label"><i class="fa fa-key" aria-hidden="true"></i> Пароль</label>
                        <div class="col-xs-9">
                            <div id="lk-form__pass">
                                <div class="input-group">
                                    <input name="password_hash" value="*****************" disabled="disabled" class="form-control col-xs-10" placeholder="Указать Пароль" type="password">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-pencil" title="Редактировать"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label"><i class="glyphicon glyphicon-calendar"></i> Дата рождения</label>
                        <div class="col-xs-9">
                            <div id="lk-form__year">
                                <div class="input-group collapse" id="lk-form__year">
                                    <input name="birthday" disabled="disabled" class="form-control col-xs-10" value="13.06.2000" placeholder="Указать Дату рождения" type="text">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-pencil" title="Редактировать"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ИЗБРАННЫЕ -->
            <div role="tabpanel" class="tab-pane" id="tab1">
                <div class="row">
                        <form action="#tab1" method="post"><button name="action" class="btn" value="clear_fav">Очистить избранные</button></form><br><br>
                </div>
                <div class="row">
                    <div class="pop-film pop-film__left">
                        <div class="pop-film__wrapp">
                            <a class="pop-film__play" href="/kinozal/gnev/view/"></a>
                            <span class="pop-film__vozr">16+</span>
                            <a href="/kinozal/gnev/view/">
                                <img src="/upload/iblock/dae/daeaf84eb03e0a9b464f1fb34db871e3.jpg" class="img-rounded img-responsive">
                            </a>
                            <div class="pop_film__caption">
                                <h3>Гнев</h3>
                                <p>(2016)</p>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
            <!-- МОИ ПОКУПКИ -->
            <div role="tabpanel" class="tab-pane" id="tab2">
                    <div class="row">

                    </div>
            </div>
        </div>
    </div>
            <div class="hidden-dt mobile-lk__form">
            	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingOne">
					      <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					          Главная
					        </a>
					      </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					      <div class="panel-body">
					         <form action="" method="POST" role="form" class="lk-form form-horizontal col-md-10">
	                            <div class="form-group">
	                                <label for="" class="col-xs-6 control-label"><i class="glyphicon glyphicon-user"></i> Ваше имя</label>
	                                <div class="col-xs-6">
	                                	<div id="lk-form__name">
		                                	<div class="input-group">
		                                    	<input class="form-control" value="Алексей" data-default="Алексей" disabled="disabled" placeholder="Указать имя" type="text">
		                                    	<div class="input-group-addon">
		                                    		<i class="glyphicon glyphicon-pencil"></i>
												</div>
											</div>
										</div>	
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="" class="col-xs-6 control-label"><i class="glyphicon glyphicon-envelope"></i> E-mail</label>
	                                <div class="col-xs-6">
	                                	<div id="lk-form__mail">
		                                	<div class="input-group">
		                                    	<input class="form-control col-xs-10" disabled="disabled" value="alexwolf@inbox.ru" data-default="alexwolf@inbox.ru" placeholder="Указать E-mail" type="email">
			                                    <div class="input-group-addon">
			                                    	<i class="glyphicon glyphicon-pencil"></i>
												</div>
											</div>
										</div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="" class="col-xs-6 control-label"><i class="fa fa-key" aria-hidden="true"></i> Пароль</label>
	                                <div class="col-xs-6">

	                                	<div id="lk-form__pass">
		                                	<div class="input-group">
		                                    	<input name="PASSWORD" value="***************" class="form-control col-xs-10" disabled="disabled" placeholder="Указать Пароль" type="password">
		                                    	<div class="input-group-addon">
		                                    		<i class="glyphicon glyphicon-pencil"></i>
		                                    	</div>
											</div>
										</div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="" class="col-xs-6 control-label"><i class="glyphicon glyphicon-calendar"></i> Дата рождения</label>
	                                <div class="col-xs-6">
	                                	<div id="lk-form__year">
		                                	<div class="input-group collapse" id="lk-form__year">
			                                    <input class="form-control col-xs-10 datepicker" name="PERSONAL_BIRTHDAY" disabled="disabled" data-default="13.06.2000" placeholder="Указать Дату рождения" value="13.06.2000" type="text">
			                                    <div class="input-group-addon">
			                                    	<i class="glyphicon glyphicon-pencil"></i>
			                                    </div>
											</div>
										</div>
	                                </div>
	                            </div>
	                        </form>
		                        <table class="lk-schet">
									<tbody><tr>
										<td><a href="#" onclick="return false;" class="lk-schet__button"><i class="fa fa-database" aria-hidden="true"></i> Счет: <b>0</b> р.</a></td>
										<td><a href="#pop-pay-add" class="btn lk-schet__add" data-toggle="modal">Пополнить счет</a></td>
									</tr>
								</tbody></table>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingTwo">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          Избранное
					        </a>
					      </h4>
					    </div>
					    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					      <div class="panel-body"><!-- Избранные -->
					      	    <div class="row">
		                    		<form action="#tab1" method="post"><button name="action" class="btn" value="clear_fav">Очистить избранные</button></form><br><br>
		                    	</div>
					        <div class="row1">
						        		                    			<div class="pop-film pop-film__left">
								        <div class="pop-film__wrapp" data-id="1">
								        	<a class="pop-film__play" href="/kinozal/gnev/"></a>
								            <span class="pop-film__vozr">16+</span>
								            
								            <a href="/kinozal/gnev/"><img src="/upload/iblock/dae/daeaf84eb03e0a9b464f1fb34db871e3.jpg" class="img-rounded img-responsive"></a>
								            <div class="pop_film__caption">
								                <h3>Гнев</h3>
								                <p>(2016)</p>
								            </div>
								        </div>
								    </div>
		                    				                    </div><!-- row -->
					      </div><!-- Избранные -->
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          Мои покупки
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					      <div class="panel-body lk-form__pokupki"> <!-- Мои покупки -->
					       		 <div class="row1">
					       		 				                    </div>
					      </div><!-- Мои покупки -->
					    </div>
					  </div>
					</div>
            </div>
        </section>
