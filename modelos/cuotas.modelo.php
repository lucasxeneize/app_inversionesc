<?php

require_once "conexion.php";

class ModeloCuotas{

	/*=============================================
	CREAR
	=============================================*/

	static public function mdlIngresarCuota($tabla, $datos){

		echo '<script>console.log("mdlIngresarCuota");</script>';
		echo '<script>console.log("id_instrumento:'.$datos["id_instrumento"].'");</script>';
		echo '<script>console.log('.json_encode($datos).');</script>';

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, id_instrumento, valor) VALUES (:fecha, :id_instrumento, :valor)");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id_instrumento", $datos["id_instrumento"], PDO::PARAM_INT);
		$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_INT);
		
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

	static public function mdlMostrarCuotas($tabla, $item, $item2, $valor, $valor2){

		//echo '<script>console.log("mdlMostrarCuotas");</script>';

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
	
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR
	=============================================*/

	static public function mdlEditarCuota($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, id_instrumento = :id_instrumento, valor = :valor WHERE fecha = :fecha AND id_instrumento = :id_instrumento");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id_instrumento", $datos["id_instrumento"], PDO::PARAM_INT);
		$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_INT);

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

	static public function mdlBorrarCuota($tabla, $fecha, $idInstrumento){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE fecha = :fecha AND id_instrumento=:id_instrumento");

		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt -> bindParam(":id_instrumento", $idInstrumento, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

