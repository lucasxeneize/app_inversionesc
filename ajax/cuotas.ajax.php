<?php

require_once "../controladores/cuotas.controlador.php";
require_once "../modelos/cuotas.modelo.php";

class AjaxCuotas{

	/*=============================================
	EDITAR CUOTA
	=============================================*/	

	public $fecha;
	public $idInstrumento;

	public function ajaxEditarCuota(){

		$item = "fecha";
		$item2 = "id_instrumento";
		$valor = $this->fecha;
		$valor2 = $this->idInstrumento;

		$respuesta = ControladorCuotas::ctrMostrarCuotas($item, $item2, $valor, $valor2);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MOVIMIENTO
=============================================*/	
if(isset($_POST["fecha"])){

	alert("feditar");

	$obj = new AjaxCuotas();
	$obj -> fecha = $_POST["fecha"];
	$obj -> ajaxEditarCuota();
}