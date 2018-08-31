<?php

require_once "conexion.php";

class ModeloMovimientos{

	/*=============================================
	CREAR
	=============================================*/

	static public function mdlIngresarMovimiento($tabla, $datos){

		/*echo '<script>console.log("mdlIngresarMovimiento");</script>';
		echo '<script>console.log("id_instrumento:'.$datos["id_instrumento"].'");</script>';
		echo '<script>console.log('.json_encode($datos).');</script>';*/

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, id_instrumento, id_operacion, monto, cuotas, valor_cuota) VALUES (:fecha, :id_instrumento, :id_operacion, :monto, 10, 20)");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id_instrumento", $datos["id_instrumento"], PDO::PARAM_INT);
		$stmt->bindParam(":id_operacion", $datos["id_operacion"], PDO::PARAM_INT);
		$stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_INT);
		/*$stmt->bindParam(":cuotas", $datos["cuotas"], PDO::PARAM_INT);
		$stmt->bindParam(":valor_cuota", $datos["valor_cuota"], PDO::PARAM_INT);*/
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR
	=============================================*/

	static public function mdlMostrarMovimientos($tabla, $item, $valor){

		return Conexion::query($tabla, $item, $valor);

	}

	/*=============================================
	EDITAR
	=============================================*/

	static public function mdlEditarMovimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, id_instrumento = :id_instrumento, id_operacion = :id_operacion, monto = :monto WHERE id = :id");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id_instrumento", $datos["id_instrumento"], PDO::PARAM_INT);
		$stmt->bindParam(":id_operacion", $datos["id_operacion"], PDO::PARAM_INT);
		$stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR
	=============================================*/

	static public function mdlBorrarMovimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

