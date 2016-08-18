<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/8/16
 * Time: 10:00 PM
 */

namespace app\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class BaseController extends Controller
{

    /**
     * @return array
     */
    public function behaviors()
    {


         return [
             'access' => [
                 'class' => AccessControl::className(),
                 'only' => ['logout'],
                 'rules' => [
                     [
                         'actions' => ['logout'],
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                 ],
                 'class'=>AccessControl::className(),
                 'only'=>['index'],
                 'rules'=>[
                     [
                         'actions'=>['index'],
                         'allow'=>true,
                         'roles' => ['@'],
                     ],
                 ],
             ],
             'verbs' => [
                 'class' => VerbFilter::className(),
                 'actions' => [
                     'logout' => ['post'],
                 ],
             ],
         ];

     }
}