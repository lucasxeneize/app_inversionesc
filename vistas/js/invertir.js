/*=============================================
SELECT ADMINISTRADORA
=============================================*/
//console_log("idAdministradora2");

function mostrarAdministradora() {
	var cbAdministradoras = document.frmInvertir.slAdministradora;
	var cbInstrumentos = document.frmInvertir.slInstrumentos;
	var cbAdministradorasValue = cbAdministradoras.value;
	console.log(cbAdministradoras.value);

	
  // Limpia select instrumentos
  $('#slInstrumentos')
    .find('option')
    .remove()
    .end()
    .append('<option value=0>Seleccione Instrumento</option>')
    .val('whatever');
    $("#slInstrumentos").val("0").change();

   if (cbAdministradoras.value>0){	
      // Busca instrumentos segun adminsitradora
      var datos = new FormData();
      
      datos.append("idAdministradora2", cbAdministradoras.value);

      $.ajax({
        url:"ajax/administradoras.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
          console.log(respuesta);
          //alert(respuesta["nombre"]);

          var respuestas=["rojo","alarillo","verde"];
          for(let valor of respuesta)
          {
            alert(valor);
          }

          $.each (respuesta, function (index) {
            //console.log (index);
            //console.log (respuesta[index]);
            console.log (respuesta["nombre"]);

            $('#slInstrumentos')
              .find('option')
              .append('<option value=0>'+respuesta["nombre"]+'</option>')
              .val('whatever');
            
              $("#slInstrumentos").val("0").change();

          });
        }

      });

   }


	//document.ready = document.getElementById("slAdministradora").value = cbAdministradorasValue;

	$("#slAdministradora").val(cbAdministradorasValue);


   //cbAdministradoras.option["value="+cbAdministradoras.value+"].attr("selected", true);"
   //alert ("document.getElementById('slAdministradora').value");

   //var cmbInstrumentos = document.frmInvertir.slInstrumentos;
   //var largo = cmbInstrumentos.options.length;
   //console.log(largo);
   //alert(largo);
   // var array = ["Cantabria", "Asturias", "Galicia", "Andalucia", "Extremadura"];
   //cargarInstrumentos("slInstrumento", array);

}

function BuscarValorCuota(){

}
/*=============================================
CARGA INSTRUMENTOS
=============================================*/
/*function cargarInstrumentos(domElement, provincias) {

   var select = document.getElementById("select1").value; // para saber el valor de select1
 
    var miSelect2 = document.getElementById("slInstrumento");
    var aTag = document.createElement('option');
    aTag.setAttribute('value',"1");
    aTag.innerHTML = "Uno";
    miSelect2.appendChild(aTag);
}*/

/*
// Rutina para agregar opciones a un <select>
function cargarInstrumentos(domElement, array) {
 var select = document.getElementsByName(domElement)[0];

 for (value in array) {
  var option = document.createElement("option");
  option.text = array[value];
  alert( option.text);
  select.add(option);
 }
}*/


/*function cargarInstrumentos(){
    var array = ["Cantabria", "Asturias", "Galicia", "Andalucia", "Extremadura"];
    var slInstrumento = document.getElementById("slInstrumento");

    for(var i=0;i<array.length;i++){ 
    	//alert(array);
        //slInstrumento.options[i] = new option(array[i]);
        slInstrumento.append(array[i]);
     }
}*/



/*=============================================
EDITAR CATEGORIA
=============================================*/

/*=============================================
ELIMINAR CATEGORIA
=============================================*/



