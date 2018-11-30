<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\LoginFormWidget;
use app\components\RegisterFormWidget;

AppAsset::register($this);
if (key_exists('model', $this->params)) {
    $model = $this->params['model'];
} else {
    $model = '';
}

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">    
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="robots" content="index, follow" />
    <meta name='viewport' content='width=1170' />
    <?= Html::csrfMetaTags() ?>
    <?php $this->head(); ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>  
    <?php $this->beginBody();
 //print_r($this->params);
    if (Yii::$app->user->isGuest) {
        $guest = true;
    } else {
        $user = Yii::$app->user->getIdentity();
    }
            ?>
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo" href="/"><?=Html::img('@web/img/logo.png') ?></a>
                            <div class="visible-mobile pull-right">
                                <a class="btn" href="/search/"><i class="glyphicon glyphicon-search"></i></a>
                                <a class="btn" href="#pop-enter" data-toggle="modal"><i class="glyphicon glyphicon-user"></i></a>
                            </div>
                        </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/kinozal/">Главная</a></li>
                                <li><a href="/about/o_kinozale/">О кинозале</a></li>
                                <li class="nav-dd"><a href="/kinozal/categories/">Фильмы</a><i class="glyphicon glyphicon-plus hidden-dt"></i>
                                    <ul class="dropdown-menu hidden-xs " role="menu" aria-labelledby="dLabel">
                                        <li><a  data-count='52' href="/kinozal/categories/6plus/">6+</a>                                                                                                                                                                                <a  data-count='3' href="/kinozal/categories/14plus/">14+</a>                                                                                        <a  data-count='43' href="/kinozal/categories/kinoniva/">Фильмы студии КиноНива</a>                                        </li><li>                                                                                                                                                                                                                                <a  data-count='1' href="/kinozal/categories/war/">Военное кино</a>                                                                                        <a  data-count='2' href="/kinozal/categories/drama/">Драмы</a>                                        </li><li>                                                <a  data-count='14' href="/kinozal/categories/mult/">Мультфильмы</a>                                                                                        <a  data-count='29' href="/kinozal/categories/child-film/">Детское кино</a>                                                                                                                                                                                <a  data-count='8' href="/kinozal/categories/serials/">Сериалы</a>                                        </li><li>                                                                                                                                        <a  data-count='1' href="/kinozal/categories/130/">Историческое кино</a>                                                                                        <a  data-count='1' href="/kinozal/categories/">Притча</a>                                         
                                    </ul>
                                    <ul class="visible-mobile">
                                        <li><a href="/kinozal/categories/10plus/">10+</a></li>
                                        <li><a href="/kinozal/categories/14plus/">14+</a></li>
                                        <li><a href="/kinozal/categories/6plus/">6+</a></li>
                                        <li><a href="/kinozal/categories/Biography/">Биографии</a></li>
                                        <li><a href="/kinozal/categories/war/">Военное кино</a></li>
                                        <li><a href="/kinozal/categories/child-film/">Детское кино</a></li>
                                        <li><a href="/kinozal/categories/documental/">Документальное кино</a></li>
                                        <li><a href="/kinozal/categories/drama/">Драмы</a></li>
                                        <li><a href="/kinozal/categories/130/">Историческое кино</a></li>
                                        <li><a href="/kinozal/categories/comedy/">Комедии</a></li>
                                        <li><a href="/kinozal/categories/melodramma/">Мелодрамы</a></li>
                                        <li><a href="/kinozal/categories/mult/">Мультфильмы</a></li>
                                        <li><a href="/kinozal/categories/">Притча</a></li>
                                        <li><a href="/kinozal/categories/serials/">Сериалы</a></li>
                                        <li><a href="/kinozal/categories/kinoniva/">Фильмы студии КиноНива</a></li>                     
                                    </ul>
                                </li> 
                                <li><a href="/audio/">Музыка</a></li> 
                                <li><a href="/about/usloviya/">Условия</a></li>
                                <li><a href="/contacts/kinozal/">Контакты</a></li>
                            </ul>
                            <span class="nav-bl3 navbar-left hidden-xs">		  					
                                <form class="navbar-form navbar-left" action="/search/" role="search">
                                    <div class="form-group">
                                        <input type="text" name="q" class="form-control" placeholder="Поиск" /><i class="glyphicon glyphicon-search"></i>
                                    </div>
                                </form>
                                <?php if ($guest): ?>
                                <a id="show-login-form" class="btn btn-default btn-xs" href="#pop-enter" data-toggle="modal">Войти <i class="glyphicon glyphicon-user"></i></a>
                                <?php else: ?>
                                <ul class="user">
                                    <li><a class="btn btn-default btn-xs" href="/lk"><?php echo $user->getName() ?><i class="glyphicon glyphicon-user"></i></a>
                                        <ul>
                                            <li>
                                                <?php   
                                                   echo Html::a('Выйти',['user/logout'],['class' => 'user__out']);
                                                ?>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php endif; ?>
                            </span>                        
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                </nav>
                
            </div>
        </div>
    </header>
    <div class="navbar-bg-right"></div>
    <div class="page-content">
      <?= $content ?>   
    </div>
    <?php if ($guest): ?>
    <?php 
        $loginFormModel = $this->params['showLoginForm'] ? $this->params['LoginFormModel'] : null;
        $registerFormModel = $this->params['showRegisterForm'] ? $this->params['RegisterFormModel'] : null;
    ?>
        <?php echo LoginFormWidget::widget(['model' => $loginFormModel]); ?>
        <?php echo RegisterFormWidget::widget(['model' => $registerFormModel]); ?>
    <?php endif; ?>
    <?php $this->endBody() ?> 
    <?php
    if ($this->params['showLoginForm']) : ?>
    <script>
    $(function(){
        console.log('Показать форму входа');
        $('#show-login-form').trigger('click');
    });
    </script>
    <?php endif ;?>
    <?php
    if ($this->params['showRegisterForm']) : ?>
    <script>
    $(function(){
        console.log('Показать форму регистрации');
        $('#register-form-submit').trigger('click');
    });
    </script>
    <?php endif ;?>
</body>
</html>
<?php $this->endPage() ?>