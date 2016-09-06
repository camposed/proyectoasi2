<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

               [
                    'attribute' => 'fecha_inicia',
                    'format' => ['date', 'php:d/m/Y'],
                    'label' => 'Fecha Inicial',
               ]
            ,
            [
                'attribute' => 'fecha_final',
                'format' => ['date', 'php:d/m/Y'],
                'label' => 'Fecha Final',
            ],
            'descripcion',
            [
                'attribute'=>'estado',
                'value'=>function ($model){
                    $st = array('A'=>'Aprobado','R'=>'Registrado','C'=>'Cancelado');
                    return $st[$model->estado];
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
