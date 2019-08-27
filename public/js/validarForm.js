

var formulario = $('form')[0].id;
// lista negra de inputs que no se validan
var type_blacklist = ['hidden', 'submit'];
// seleccionando inputs
var inputs = $('form').find('input:not(input[type='+type_blacklist[0]+'], input[type='+type_blacklist[1]+'])');
for (var i =  0; i < inputs.length; i++) {
		var atributos = $(inputs[i]);
		// console.log(atributos.attr('requerido'));
		if(atributos.attr('requerido').length){
			console.log("eder");
		}
}