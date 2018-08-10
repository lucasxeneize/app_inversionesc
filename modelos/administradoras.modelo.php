<?php

require_once "conexion.php";

class ModeloAdministradoras{

	/*=============================================
	CREAR ADMINISTRADORA
	=============================================*/

	static public function mdlIngresarAdministradora($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rut, razon_social) VALUES (:rut, :razon_social)");

		$stmt->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$stmt->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ADMINISTRADORAS
	=============================================*/

	static public function mdlMostrarAdministradoras($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

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
	EDITAR ADMINISTRADORA
	=============================================*/

	static public function mdlEditarAdministradora($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET rut = :rut, razon_social = :razon_social WHERE id = :id");

		$stmt -> bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$stmt -> bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
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
	BORRAR ADMINISTRADORA
	=============================================*/

	static public function mdlBorrarAdministradora($tabla, $datos){

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

