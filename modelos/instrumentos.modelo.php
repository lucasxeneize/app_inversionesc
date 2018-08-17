<?php

require_once "conexion.php";

class ModeloInstrumentos{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarInstrumento($tabla, $datos){

		echo '<script>console.log("mdlIngresarInstrumento 1");</script>';

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_administradora, nombre, serie) VALUES (:id_administradora, :nombre, :serie)");

		/*echo '<script>console.log("mdlIngresarInstrumento  $datos_id_administradora='.$datos["id_administradora"].'");</script>';
		echo '<script>console.log("mdlIngresarInstrumento  Nombre='. $datos["nombre"].'");</script>';
		echo '<script>console.log("mdlIngresarInstrumento  Serie='. $datos["serie"].'");</script>';*/

		$stmt->bindParam(":id_administradora", $datos["id_administradora"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		//INSERT INTO `instrumentos` (`id`, `nombre`, `id_administradora`, `serie`) VALUES (NULL, '1', '1', '');


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

	static public function mdlMostrarInstrumentos($tabla, $item, $valor){

		return Conexion::query($tabla, $item, $valor);
		
	}

	/*=============================================
	EDITAR
	=============================================*/

	static public function mdlEditarInstrumento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_administradora= :id_administradora, nombre = :nombre, serie= :serie WHERE id = :id");

		$stmt -> bindParam(":id_administradora", $datos["id_administradora"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

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

	static public function mdlBorrarInstrumento($tabla, $datos){

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

