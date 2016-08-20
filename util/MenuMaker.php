<?php

namespace util;

use yii\db\Query;
use app\models\Link;
use yii\helpers\Url;

class MenuMaker{
	 public static function make($userId = null){

         $rows  = Link::find()->
	 			from('link')->
	 			innerJoin('menu','link.menu = menu.id_menu')->
	 			innerJoin('rol', 'rol.id_rol = menu.rol')->
	 			innerJoin('usuario_rol','usuario_rol.id_rol = rol.id_rol')->
         		where(['usuario_rol.id_usuario'=>$userId])->
         		all();


            foreach ($rows as $row) {

                echo "<li><a href='".Url::to("@web".$row['url'])."'>".$row['label']."</a></li>";
            }
	 }		
}