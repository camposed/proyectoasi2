<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/8/16
 * Time: 8:03 PM
 */

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Planifiación';
$this->params['breadcrumbs'][] = $this->title;



$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
])

?>
<style>
    .form-control{
        padding: 5px;
    }
</style>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
            <div class="col-md-5">
                <?= $form->field($model, 'startdate')->label("Fecha Incial") ?>
            </div>
            <div class="col-md-5">
                <?= $form->field($model, 'enddate')->label("Fecha final") ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'status')->label("Estado") ?>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'nombre')->textArea(['rows' => '1'])->label("Nombre") ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>



    <div>
        <hr />
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nombre</td>
                    <td>Periodo</td>
                    <td>Estado</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Plan de recolección de desechos</td>
                    <td>01/01/2016 - 31/12/2016</td>
                    <td>Aprobado</td>
                    <td>
                        <button class="btn">Editar</button>
                        <button class="btn btn-primary">Ver</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>

                </tr>
                <tr>
                    <td>2</td>
                    <td>Plan de limpieza 2015</td>
                    <td>01/01/2016 - 31/12/2016</td>
                    <td>Aprobado</td>
                    <td>
                        <button class="btn">Editar</button>
                        <a href="./view/1" class="btn btn-primary">Ver</a>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Plan1</td>
                    <td>01/01/2016 - 31/12/2016</td>
                    <td>Aprobado</td>
                    <td>
                        <button class="btn">Editar</button>
                        <button class="btn btn-primary">Ver</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Plan1</td>
                    <td>01/01/2016 - 31/12/2016</td>
                    <td>Aprobado</td>
                    <td>
                        <button class="btn">Editar</button>
                        <button class="btn btn-primary">Ver</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>