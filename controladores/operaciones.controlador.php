<?php

class ControladorOperaciones{

	/*=============================================
	MOSTRAR OPERACIONES
	=============================================*/

	static public function ctrMostrarOperaciones($item, $valor){

		$tabla = "operaciones";

		$respuesta = ModeloOperaciones::mdlMostrarOperaciones($tabla, $item, $valor);

		return $respuesta;
	
	}
}
