<?php

class ControladorAdministradoras{

	/*=============================================
	CREAR ADMINISTRADORAS
	=============================================*/

	static public function ctrCrearAdministradora(){

		//echo '<script>console.log("ctrCrearAdministradora");</script>';

		if(isset($_POST["nRazonSocial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nRazonSocial"])){

				$tabla = "administradoras";

				//$datos = $_POST["nRazonSocial"];

				$datos = array("razon_social" => $_POST["nRazonSocial"],
					           "rut" => $_POST["nRut"],
					       		"nombre_fantasia" => $_POST["nNombreFantasia"],
					       		"sitio_web" => $_POST["nSitioWeb"],);
				
				$respuesta = ModeloAdministradoras::mdlIngresarAdministradora($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La administradora ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "administradoras";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La administradora no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "administradoras";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ADMINISTRADORAS
	=============================================*/

	static public function ctrMostrarAdministradoras($item, $valor){

		$tabla = "administradoras";

		$respuesta = ModeloAdministradoras::mdlMostrarAdministradoras($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	BUSCAR INSTRUMENTOS ADMINISTRADORAS
	=============================================*/

	static public function ctrBuscarInstrumentos($item, $valor){

		//echo '<script>console.log("ctrBuscarInstrumentos");</script>';

		$tabla = "instrumentos";

		$respuesta = ModeloAdministradoras::mdlMostrarAdministradoras($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ADMINISTRADORA
	=============================================*/

	static public function ctrEditarAdministradora(){

		echo '<script>console.log("ctrEditarAdministradora");</script>';
		//echo '<script>console.log("POST idAdministradora"'.$_POST["eRazonSocial"].');</script>';
		
		if(isset($_POST["eRazonSocial"])){

			echo '<script>console.log("rz:'.$_POST["eRazonSocial"].'");</script>';

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["eRazonSocial"])){

				$tabla = "administradoras";

				$datos = array("rut"=>$_POST["editarRut"],
							   "razon_social"=>$_POST["eRazonSocial"],
							   "nombre_fantasia"=>$_POST["eNombreFantasia"],
							   "sitio_web"=>$_POST["eSitioWeb"],
							   "id"=>$_POST["idAdministradora"]);

				//echo '<script>console.log("aa:'.print_r($_POST["idAdministradora"]).'");</script>';

				$respuesta = ModeloAdministradoras::mdlEditarAdministradora($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La administradora ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "administradoras";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La administradora no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "administradoras";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ADMINISTRADORA
	=============================================*/

	static public function ctrBorrarAdministradora(){
		echo '<script>console.log("ctrBorrarAdministradora");</script>';

		if(isset($_GET["idAdministradora"])){

			$tabla ="Administradoras";
			$datos = $_GET["idAdministradora"];

			$respuesta = ModeloAdministradoras::mdlBorrarAdministradora($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La administradora ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "administradoras";

									}
								})

					</script>';
			}
		}
		
	}
}
