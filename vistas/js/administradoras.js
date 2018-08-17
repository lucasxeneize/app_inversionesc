/*=============================================
EDITAR ADMINISTRADORAS
=============================================*/

$(".tablas").on("click", ".btnEditarAdministradora", function(){
    
    /*alert("editar administradora");
    console.log("editar administradora");*/

	var idAdministradora = $(this).attr("idAdministradora");

    //alert(idAdministradora);

	var datos = new FormData();
	datos.append("idAdministradora", idAdministradora);

	$.ajax({
		url: "ajax/administradoras.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

        console.log(respuesta);

            $("#editarRut").val(respuesta["rut"]);
     		$("#eRazonSocial").val(respuesta["razon_social"]);
            $("#eNombreFantasia").val(respuesta["nombre_fantasia"]);
            $("#eSitioWeb").val(respuesta["sitio_web"]);

     		$("#idAdministradora").val(respuesta["id"]);

     	}

	})


})


/*=============================================
ELIMINAR ADMINISTRADORAS
=============================================*/
$(".tablas").on("click", ".btnEliminarAdministradora", function(){

    var idAdministradora = $(this).attr("idAdministradora");

    swal({
        title: '¿Está seguro de borrar la administradora?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar administradora!'
     }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=administradoras&idAdministradora="+idAdministradora;

        }

     })

})