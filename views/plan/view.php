<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */

//$this->title = $model->id_plan;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .plan-view{
        padding-left: 20px;
    }
</style>
<div class="plan-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-md-1">
            <label>Nombre:</label>
        </div>
        <div class="col-md-8">
            <span><?= $model->descripcion ?></span>
        </div>
        <div class="col-md-3">
            <label>Estado:</label>
            <span><?= $model->estado ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1">
            <label>Periodo:</label>
        </div>
        <div class="col-md-8">
            <?= date_format(date_create($model->fecha_inicia),'d/m/Y') .' - '. date_format(date_create($model->fecha_final),'d/m/Y') ?>
        </div>
    </div>
    <div class="row">
    	<hr />
    	<h4>Detalle de actividades del plan</h4>
        <div>
        <?= GridView::widget([
        'dataProvider' => $actividades,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

               [
                    'attribute' => 'fecha_inicio',
                    'format' => ['date', 'php:d/m/Y'],
               		'label'=>'Fecha Inicial',
               ]
            ,
            [
                'attribute' => 'fecha_final',
                'format' => ['date', 'php:d/m/Y'],
            		'label'=>'Fecha Final',
            ],
        	[
        		'attribute' => 'tipo',
        	],
        		[
        		'attribute' => 'actividad',
        		],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>

</div>
