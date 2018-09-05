<?php

require_once "conexion.php";

class ModeloAdministradoras{

	/*=============================================
	CREAR ADMINISTRADORA
	=============================================*/

	static public function mdlIngresarAdministradora($tabla, $datos){

		echo '<script>console.log("mdlIngresarAdministradora");</script>';
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rut, razon_social,nombre_fantasia,sitio_Web) VALUES (:rut, :razon_social,:nombre_fantasia,:sitio_web)");

		$stmt->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$stmt->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_fantasia", $datos["nombre_fantasia"], PDO::PARAM_STR);
		$stmt->bindParam(":sitio_web", $datos["sitio_web"], PDO::PARAM_STR);

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

	static public function mdlMostrarAdministradoras($tabla, $item, $valor){

		return Conexion::query($tabla, $item, $valor);

	}

	/*=============================================
	EDITAR ADMINISTRADORA
	=============================================*/

	static public function mdlEditarAdministradora($tabla, $datos){

		/*echo '<script>console.log("NUEVOmdlEditarAdministradora");</script>';
		echo '<script>console.log("id:'.$datos["id"].'");</script>';*/

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET rut = :rut, razon_social = :razon_social, nombre_fantasia = :nombre_fantasia, sitio_web = :sitio_web  WHERE id = :id");

		$stmt -> bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$stmt -> bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre_fantasia", $datos["nombre_fantasia"], PDO::PARAM_STR);
		$stmt -> bindParam(":sitio_web", $datos["sitio_web"], PDO::PARAM_STR);
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

