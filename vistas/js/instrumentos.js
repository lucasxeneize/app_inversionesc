/*=============================================
EDITAR
=============================================*/

$(".tablas").on("click", ".btnEditarInstrumento", function(){

	var idInstrumento = $(this).attr("idInstrumento");

	var datos = new FormData();
	datos.append("idInstrumento", idInstrumento);

	$.ajax({
		url: "ajax/instrumentos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#eNombre").val(respuesta["nombre"]);
     		$("#eAdministradora").val(respuesta["id_administradora"]);
     		$("#eSerie").val(respuesta["serie"]);
     		$("#idInstrumento").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarInstrumento", function(){

	 var idInstrumento = $(this).attr("idInstrumento");

	 swal({
	 	title: '¿Está seguro de borrar el instrumento?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar instrumento!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=instrumentos&idInstrumento="+idInstrumento;

	 	}

	 })

})