<?php

namespace util;

use yii\db\Query;

class MenuMaker{
	 public static function make($userId = null){
	 		$query = new Query;
	 		$query->
	 			select('link.*')->
	 			from('link')->
	 			innerJoin('menu','link.menu = menu.id_menu')->
	 			innerJoin('rol', 'rol.id_rol = menu.rol')->
	 			innerJoin('usuario_rol','usuario_rol.id_rol = rol.id_rol', ['id_usuario'=>$userId])->
	 			distinct();
	 			return $query->all();
	 		
	 }		
}