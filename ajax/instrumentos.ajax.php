<?php

require_once "../controladores/instrumentos.controlador.php";
require_once "../modelos/instrumentos.modelo.php";

echo '<script>console.log("instrumentos.ajax.php");</script>';

class AjaxInstrumentos{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idInstrumento;

	public function ajaxEditarInstrumento(){

		$item = "id";
		$valor = $this->idInstrumento;

		$respuesta = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR
=============================================*/	

if(isset($_POST["idInstrumento"])){

	$categoria = new AjaxInstrumentos();
	$categoria -> idInstrumento = $_POST["idInstrumento"];
	$categoria -> ajaxEditarInstrumento();
}
