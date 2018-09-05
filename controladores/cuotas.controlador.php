<?php

class ControladorCuotas{

	/*=============================================
	CREAR
	=============================================*/

	static public function ctrCrearCuota(){

		echo '<script>console.log("ctrCrearCuota");</script>';
		
		if(isset($_POST["nMonto"])){

			$tabla = "valores_cuotas";

			$datos = array("fecha" => $_POST["nFecha"],
				           "id_instrumento"=>$_POST["nInstrumento"],
				           "valor"=>$_POST["nMonto"]);

			//$datos = $_POST["nuevaCuota"];

			$respuesta = ModeloCuotas::mdlIngresarCuota($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La cuota ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "cuotas";

								}
							})

				</script>';

			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Algún dato ingresado no es correcto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cuotas";

							}
						})

			  	</script>';
			}



		}

	}

	/*=============================================
	MOSTRAR
	=============================================*/

	static public function ctrMostrarCuotas($item, $item2, $valor, $valor2){

		$tabla = "valores_cuotas";

		$respuesta = ModeloCuotas::mdlMostrarCuotas($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR
	=============================================*/

	static public function ctrEditarCuota(){

		if(isset($_POST["fecha"])){

			echo '<script>console.log("ctrEditarCuota");</script>';

			//if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["eNombre"])){

				$tabla = "valores_cuotas";

				$datos = array("fecha" => $_POST["eFecha"],
				           "id_instrumento"=>$_POST["eInstrumento"],
				           "valor"=>$_POST["eMonto"]);

				$respuesta = ModeloCuotas::mdlEditarCuota($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La cuota ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cuotas";

									}
								})

					</script>';

				}


			/*}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La cuota no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "movimientos";

							}
						})

			  	</script>';

			}*/

		}

	}

	/*=============================================
	BORRAR
	=============================================*/

	static public function ctrBorrarCuota(){
		
		echo '<script>console.log("ctrBorrarCuota");</script>';

		if(isset($_GET["fecha"])){

			$tabla ="valores_cuotas";
			$datos = $_GET["fecha"];
			$idInstrumento = $_GET["idInstrumento"];

			$respuesta = ModeloCuotas::mdlBorrarCuota($tabla, $datos, $idInstrumento);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La cuota ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cuotas";

									}
								})

					</script>';
			}
		}
		
	}
}
