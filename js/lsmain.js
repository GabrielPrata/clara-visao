$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'pesquisarClientes.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#tabela").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#pesq_buscar', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});