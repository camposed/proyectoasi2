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
   


    public function actionIndex()
    {
		
    }



    
    function defineRules(){
    	return [
    			'index'=>[
    					Acf::ADMIN
    			],
    			'create'=>[
    					Acf::ADMIN
    			],
    			'update'=>[
    					Acf::ADMIN
    			],
    			'delete'=>[
    					Acf::ADMIN
    			]
    	];
    }
}