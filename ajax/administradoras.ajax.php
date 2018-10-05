<?php

require_once "../controladores/administradoras.controlador.php";
require_once "../modelos/administradoras.modelo.php";


class AjaxAdministradoras{

	/*=============================================
	EDITAR ADMINISTRADORA
	=============================================*/	

	public $idAdministradora;

	public function ajaxEditarAdministradora(){

		$item = "id";
		$valor = $this->idAdministradora;

		$respuesta = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);

		echo json_encode($respuesta);


	}

	/*=============================================
	BUSCAR INSTRUMENTOS POR ADMINISTRADORA
	=============================================*/	

	public function ajaxBuscarInstrumentos(){
		
		$item = "id_administradora";
		$valor = $this->idAdministradora;

		$respuesta = ControladorAdministradoras::ctrBuscarInstrumentos($item, $valor);

		echo json_encode($respuesta);

	}
}

if(isset($_POST["idAdministradora"])){

	$administradora = new AjaxAdministradoras();
	$administradora -> idAdministradora = $_POST["idAdministradora"];
	$administradora -> ajaxEditarAdministradora();
}

if(isset($_POST["idAdministradora2"])){

	$administradora = new AjaxAdministradoras();
	$administradora -> idAdministradora = $_POST["idAdministradora2"];
	$administradora -> ajaxBuscarInstrumentos();
}

