<?php

class ControladorMovimientos{

	/*=============================================
	CREAR
	=============================================*/

	static public function ctrCrearMovimiento(){

		echo '<script>console.log("ctrCrearMovimiento");</script>';
		
		if(isset($_POST["nOperacion"])){

			$tabla = "movimientos";

			$datos = array("fecha" => $_POST["nFechaMaterializacion"],
				           "id_operacion" => $_POST["nOperacion"],
				           "id_instrumento"=>$_POST["nInstrumento"],
				           "monto"=>$_POST["nMonto"]);

			//$datos = $_POST["nuevoInstrumento"];

			$respuesta = ModeloMovimientos::mdlIngresarMovimiento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El movimiento ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "movimientos";

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

							window.location = "movimientos";

							}
						})

			  	</script>';
			}



		}

	}

	/*=============================================
	MOSTRAR
	=============================================*/

	static public function ctrMostrarMovimientos($item, $valor){

		$tabla = "movimientos";

		$respuesta = ModeloMovimientos::mdlMostrarMovimientos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR
	=============================================*/

	static public function ctrEditarMovimiento(){

		if(isset($_POST["idMovimiento"])){

			//echo '<script>console.log("ctrEditarMovimiento 1");</script>';

			//if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["eNombre"])){

				$tabla = "movimientos";

				$datos = array("fecha" => $_POST["eFechaMaterializacion"],
				           "id_operacion" => $_POST["eOperacion"],
				           "id_instrumento"=>$_POST["eInstrumento"],
				           "monto"=>$_POST["eMonto"],
				       	   "id"=>$_POST["idMovimiento"]);

				$respuesta = ModeloMovimientos::mdlEditarMovimiento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El movimiento ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "movimientos";

									}
								})

					</script>';

				}


			/*}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El movimiento no puede ir vacío o llevar caracteres especiales!",
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

	static public function ctrBorrarMovimiento(){

		if(isset($_GET["idMovimiento"])){

			$tabla ="movimientos";
			$datos = $_GET["idMovimiento"];

			$respuesta = ModeloMovimientos::mdlBorrarMovimiento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El movimiento ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "movimientos";

									}
								})

					</script>';
			}
		}
		
	}
}
