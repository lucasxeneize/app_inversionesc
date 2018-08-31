<?php

require_once "../controladores/movimientos.controlador.php";
require_once "../modelos/movimientos.modelo.php";

class AjaxMovimientos{

	/*=============================================
	EDITAR MOVIMIENTO
	=============================================*/	

	public $idMovimiento;

	public function ajaxEditarMovimiento(){

		$item = "id";
		$valor = $this->idMovimiento;

		$respuesta = ControladorMovimientos::ctrMostrarMovimientos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MOVIMIENTO
=============================================*/	
if(isset($_POST["idMovimiento"])){

	$categoria = new AjaxMovimientos();
	$categoria -> idMovimiento = $_POST["idMovimiento"];
	$categoria -> ajaxEditarMovimiento();
}
