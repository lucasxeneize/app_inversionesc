<?php

require_once "../controladores/cuotas.controlador.php";
require_once "../modelos/cuotas.modelo.php";


class AjaxCuotas{

	/*=============================================
	EDITAR
	=============================================*/	

	public $fecha;
	public $idInstrumento;

	public function ajaxEditarCuota(){

		$item = "fecha";
		$valor = $this->fecha;
		$item2 = "id_instrumento";
		$valor2 = $this->idInstrumento;

        $respuesta  = ControladorCuotas::ctrMostrarCuotas($item, $item2, $valor, $valor2);

		//$respuesta = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR
=============================================*/	

if(isset($_POST["fecha"])){

	$categoria = new AjaxCuotas();
	$categoria -> fecha = $_POST["fecha"];
	$categoria -> idInstrumento = $_POST["idInstrumento"];
	$categoria -> ajaxEditarCuota();
}
