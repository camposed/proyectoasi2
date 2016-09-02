<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RutaColonia */

$this->title = 'Update Ruta Colonia: ' . $model->id_ruta_colonia;
$this->params['breadcrumbs'][] = ['label' => 'Ruta Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ruta_colonia, 'url' => ['view', 'id' => $model->id_ruta_colonia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ruta-colonia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
