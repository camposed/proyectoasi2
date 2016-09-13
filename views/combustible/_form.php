<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Combustible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="combustible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_combustible')->textInput() ?>

    <?= $form->field($model, 'combustible')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
