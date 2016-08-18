<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/8/16
 * Time: 9:59 PM
 */

namespace app\controllers;

use yii;
use util\Acf;



class CargoController extends BaseController
{
    const ADMIN = 'ADMINISTRADOR';


    public function actionIndex()
    {

    }



    public function beforeAction($action)
    {
        parent::beforeAction($action);

        if (!Acf::hasRol(static::ADMIN)){
            throw new \yii\web\ForbiddenHttpException('No tienes permisos');
        }
    }
}