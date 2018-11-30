<?php
/* @var $this yii\web\View */
/* @var $form yii\widget\ActiveForm */
/* @var $model app\models\LoginForm */

    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>  

<!-- Вход -->
	<div class="modal fade" id="pop-enter">
    	<div class="modal-dialog modal-sm">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    			</div>
    			<div class="modal-body">
<?php 
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => ['user/login'],
        'options' => ['class' => 'enter-form']
    ]); ?>
    <p class="modal-title">Вход / Регистрация</p>
<?php
     echo ($form->field($model, 'username')->label(false)->textInput(['autofocus' => true,'placeholder' => 'E-mail']));
     echo ($form->field($model, 'password')->label(false)->passwordInput(['placeholder' => 'Пароль']));
?>

    <?= Html::submitButton('Вход', ['class' => 'enter-form__button', 'name' => 'login-button']) ?>
        <a id="register-form-submit"  href="#pop-register" data-dismiss="modal" data-toggle="modal" class="enter-form__button">Регистрация</a>


                            
<?php ActiveForm::end(); ?>
        </div>
    				

                    <p class="enter-form__rez"></p>
    			</div>
    		</div>
    	</div>       

