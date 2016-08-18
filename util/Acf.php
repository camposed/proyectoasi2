<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/8/16
 * Time: 11:01 PM
 */

namespace util;

use yii;

class Acf
{
    public static function hasRol($rol){
        $array = yii::$app->user->identity->getRoles();
        foreach ($array as $row){
            if ($row['rol'] === $rol){
                echo 1;
            }
        }
        return false;
    }
}