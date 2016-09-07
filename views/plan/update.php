<?php


/* @var $this yii\web\View */
/* @var $model app\models\Plan */

?>
<div class="plan-update">

    <?= $this->render('_form', [
        'model' => $model,
    	'action'=> 'update?id='.Yii::app()->request->getQuery('id')
    ]) ?>

</div>
