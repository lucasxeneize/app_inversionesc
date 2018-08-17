<?php

require_once "../controladores/administradoras.controlador.php";
require_once "../modelos/administradoras.modelo.php";

class AjaxAdministradoras{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idAdministradora;

	public function ajaxEditarAdministradora(){

		$item = "id";
		$valor = $this->idAdministradora;

		$respuesta = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	

if(isset($_POST["idAdministradora"])){

	$administradora = new AjaxAdministradoras();
	$administradora -> idAdministradora = $_POST["idAdministradora"];
	$administradora -> ajaxEditarAdministradora();
}
