<?php

class ControladorAdministradoras{

	/*=============================================
	CREAR ADMINISTRADORAS
	=============================================*/

	static public function ctrCrearAdministradora(){

		echo '<script>console.log("ctrCrearAdministradora");</script>';

		if(isset($_POST["nuevaRazonSocial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRazonSocial"])){

				$tabla = "administradoras";

				$datos = $_POST["nuevaRazonSocial"];

				$datos = array("razon_social" => $_POST["nuevaRazonSocial"],
					           "rut" => $_POST["nuevoRut"]);
				
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
		
		echo '<script>console.log("ctrMostrarAdministradoras");</script>';

		$tabla = "administradoras";

		$respuesta = ModeloAdministradoras::mdlMostrarAdministradoras($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ADMINISTRADORA
	=============================================*/

	static public function ctrEditarAdministradora(){

		echo '<script>console.log("ctrEditarAdministradora");</script>';

		if(isset($_POST["editarRazonSocial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRazonSocial"])){

				$tabla = "administradoras";

				$datos = array("razon_social"=>$_POST["editarRazonSocial"],
							   "id"=>$_POST["idAdministradora"]);

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
