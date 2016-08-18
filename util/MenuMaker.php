<?php

namespace util;

use yii\db\Query;
use yii\helpers\Url;

class MenuMaker{
	 public static function make($userId = null){
	 		$query = new Query;
	 		$query->
	 			select('link.label,link.url,menu.nombre')->
	 			from('link')->
	 			innerJoin('menu','link.menu = menu.id_menu')->
	 			innerJoin('rol', 'rol.id_rol = menu.rol')->
	 			innerJoin('usuario_rol','usuario_rol.id_rol = rol.id_rol', ['id_usuario'=>$userId])->
                orderBy(['nombre'=>SORT_DESC])->
	 			distinct();
            $rows = $query->all();
            foreach ($rows as $row) {
                echo "<li><a href='".Url::to("@web".$row['url'])."'>".$row['label']."</a></li>";
            }
	 }		
}