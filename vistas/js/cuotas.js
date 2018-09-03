/*=============================================
EDITAR CUOTA
=============================================*/

$(".tablas").on("click", ".btnEditarCuota", function(){
	console.log("btnEditarCuota JS");

	var fecha = $(this).attr("fecha");
	var idInstrumento = $(this).attr("idInstrumento");
	
	//alert(fecha);

	var datos = new FormData();
	datos.append("fecha", fecha);
	datos.append("idInstrumento", idInstrumento);


	$.ajax({
		url: "ajax/cuotas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#eFecha").val(respuesta["fecha"]);
			$('#eInstrumento option[value="'+respuesta["id_instrumento"]+'"]').attr("selected",true);
     		$("#eMonto").val(respuesta["valor"]);
     	}

	})


})

/*=============================================
ELIMINAR CUOTA
=============================================*/
$(".tablas").on("click", ".btnEliminarCuota", function(){
	var fecha = $(this).attr("fecha");
	var idInstrumento = $(this).attr("idInstrumento");

	 swal({
	 	title: '¿Está seguro de borrar la cuota?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar cuota!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=cuotas&fecha="+fecha+"&idInstrumento="+idInstrumento;

	 	}

	 })

})