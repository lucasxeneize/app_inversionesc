/*=============================================
EDITAR MOVIMIENTO
=============================================*/

console.log("movimientos","movimientos.js")

$(".tablas").on("click", ".btnEditarMovimiento", function(){

	var idMovimiento = $(this).attr("idMovimiento");

	var datos = new FormData();
	datos.append("idMovimiento", idMovimiento);

	$.ajax({
		url: "ajax/movimientos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarMovimiento").val(respuesta["movimiento"]);
     		$("#idMovimiento").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR MOVIMIENTO
=============================================*/
$(".tablas").on("click", ".btnEliminarMovimiento", function(){
	 var idMovimiento = $(this).attr("idMovimiento");

	 swal({
	 	title: '¿Está seguro de borrar el movimiento?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar movimiento!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=movimientos&idMovimiento="+idMovimiento;

	 	}

	 })

})