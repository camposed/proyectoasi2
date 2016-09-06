<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planes de Trabajo';
$this->params['breadcrumbs'][] = $this->title;
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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>




