<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/8/16
 * Time: 7:59 PM
 */

namespace app\controllers;



use yii\web\Controller;

class PlanificacionController extends Controller
{
    public function actionIndex(){

        return $this->render("/planifiacion/index",['model'=>new HeaderForm()]);
    }
}


class HeaderForm extends \yii\base\Model{
    public $startdate;
    public $enddate;
    public $nombre;
    public $status;

    public function rules()
    {
       return [
           [['nombre','status'],'required'],
           [['startdate','enddate'],'required'],
           [['startdate','enddate'], 'safe'],
           ['startdate', 'date', 'format' => 'yyyy-M-d'],
           ['enddate', 'date', 'format' => 'yyyy-M-d']
       ];
    }
}