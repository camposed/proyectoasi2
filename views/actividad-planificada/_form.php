<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadPlanificada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-planificada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_actividad_planificacion')->textInput() ?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'U' => 'U', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_final')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodicidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_plan')->textInput() ?>

    <?= $form->field($model, 'id_ruta')->textInput() ?>

    <?= $form->field($model, 'actividad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
