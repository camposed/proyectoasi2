<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">


    <!-- <p>Please fill out the following fields to login:</p> -->

    <div id="login-form" class="form-horizontal"  >
   <h1>Login</h1>
        <div class="form-group field-loginform-username required">
<label class="col-lg-2 control-label" for="loginform-username">Usuario</label>

                            <div class="col-lg-10"><input type="text" id="loginform-username" class="form-control" name="LoginForm[username]" autofocus=""></div>

                            <div class="col-lg-10"><p class="help-block help-block-error">Usuario es requerido</p></div>
</div>        <div class="form-group field-loginform-password required has-success">
<label class="col-lg-2 control-label" for="loginform-password">Clave</label>

                            <div class="col-lg-10"><input type="password" id="loginform-password" class="form-control" name="LoginForm[password]"></div>

                            <div class="col-lg-10"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-loginform-rememberme has-success">
<div class="col-lg-offset-1 col-lg-5"><input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked=""> <label for="loginform-rememberme">Recuerda me</label></div>
<div class="col-lg-6"><p class="help-block help-block-error"></p></div>
</div>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::a('Entrar', ['/site/main'], ['class'=>'btn btn-primary']) ?>
        </div>
        </div>

    </form>

    <div class="col-lg-offset-1" style="color:#999;">
       <!-- You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
        -->
    </div>
</div>
<style>
    @media(min-width:768px) {
        #wrapper {
            padding-left: 0;
        }
    }
</style>
