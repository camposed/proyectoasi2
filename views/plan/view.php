<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */

$this->title = "Plan de Trabajo";
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$estaus = array(
    "A"=>"Aprobado",
    "R"=>"Registrado",
    "C"=>"Cancelado"
);



?>
<style>
    .plan-view{
        padding-left: 20px;
    }
</style>
<div class="plan-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-1">
            <label>Nombre:</label>
        </div>
        <div class="col-md-8">
            <span><?= $model->descripcion ?></span>
        </div>
        <div class="col-md-3">
            <label>Estado:</label>
            <span><?= $estaus[$model->estado] ?></span>
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
    
 <div style="margin-top: 30px;">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#actividades" aria-controls="home" role="tab" data-toggle="tab">Actividades</a></li>
    <li role="presentation"><a href="#equipo" aria-controls="profile" role="tab" data-toggle="tab">Equipo</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="actividades">
    		
		    	<div style="text-align: right; margin-bottom: 10px;margin-top: 10px;" >	
		    		<?= Html::a('Crear Actividad', ['actividad-planificada/create'], ['class' => 'btn btn-success']) ?>
		    	</div>
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
                                'value' => function ($model){
                                    $tA = array(
                                        "U" => "Unica",
                                        "P" => "Periodica"
                                    );
                                    return $tA[$model->tipo];
                                }
				        	],
				        		[
				        		'attribute' => 'actividad',
				        		],
				            ['class' => 'yii\grid\ActionColumn'],
				        ],
				    ]); ?>
		        </div>
   </div>
    <div role="tabpanel" class="tab-pane" id="equipo">
    
    	<div style="text-align: right; margin-bottom: 10px;margin-top: 10px;" >	
		    		<?= Html::a('Crear Equipo', ['equipo/create'], ['class' => 'btn btn-success']) ?>
		    	</div>
		        <div>
		        
				        <?= GridView::widget([
				        'dataProvider' => $equipo,
				        'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],
				
				               [
				                    'attribute' => 'descripcion',
				               		'label'=>'Descripción',
				               ]
				            ,
				            [
				                'attribute' => 'estado',
				            	'label'=>'estado',
				            ],
				            ['class' => 'yii\grid\ActionColumn'],
				        ],
				    ]); ?>
		        </div>
    </div>
  </div>

</div>

</div>
