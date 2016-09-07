<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planes de Trabajo';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/plan.js',[\yii\web\View::POS_END]);

?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Plan', ['create'], ['class' => 'btn btn-success']) ?>
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
    ]);
?>
</div>
<style>
    .modal-backdrop {background: none;}
</style>
<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
]);
echo 'Say hello...';
\yii\bootstrap\Modal::end();
?>




