<?php

class ControladorInstrumentos{

	/*=============================================
	CREAR
	=============================================*/

	static public function ctrCrearInstrumento(){

		//echo '<script>console.log("ctrCrearInstrumento 1");</script>';
		
		if(isset($_POST["nNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nNombre"])&&
			preg_match('/^[0-9]+$/', $_POST["nAdministradora"])
			){

				$tabla = "instrumentos";

				$datos = array("id_administradora" => $_POST["nAdministradora"],
					           "nombre" => $_POST["nNombre"],
					           "serie"=>$_POST["nSerie"]);

				//$datos = $_POST["nuevoInstrumento"];

				$respuesta = ModeloInstrumentos::mdlIngresarInstrumento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El instrumento ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "instrumentos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Algún dato ingresado no es correcto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "instrumentos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR
	=============================================*/

	static public function ctrMostrarInstrumentos($item, $valor){

	echo '<script>console.log("ctrMostrarInstrumentos");</script>';

		$tabla = "instrumentos";

		$respuesta = ModeloInstrumentos::mdlMostrarInstrumentos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR
	=============================================*/

	static public function ctrEditarInstrumento(){

		//echo '<script>console.log("ctrEditarInstrumento 1");</script>';


		if(isset($_POST["eNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["eNombre"])){

				$tabla = "instrumentos";

				$datos = array("id_administradora" => $_POST["nAdministradora"],
							    "nombre"=>$_POST["eNombre"],
								"serie"=>$_POST["eSerie"],
							   "id"=>$_POST["idInstrumento"]);

				$respuesta = ModeloInstrumentos::mdlEditarInstrumento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El instrumento ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "instrumentos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El instrumento no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "instrumentos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR
	=============================================*/

	static public function ctrBorrarInstrumento(){

		if(isset($_GET["idInstrumento"])){

			$tabla ="instrumentos";
			$datos = $_GET["idInstrumento"];

			$respuesta = ModeloInstrumentos::mdlBorrarInstrumento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El instrumento ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "instrumentos";

									}
								})

					</script>';
			}
		}
		
	}
}
