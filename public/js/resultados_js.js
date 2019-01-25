$(document).ready( function () {
    $('#usuarios').DataTable({
    	"language": {
	      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
	    }
    });

    // if(document.getElementById())
});

function submit_filter(variable){
  $('#'+variable).submit();
}

if(document.getElementById('edad')){
	var edad_content = $('#edad');
	edad_content.on('blur', function(){
		if(emptyValue(this) != false){
			if(validarTipo(this) != false){
				quitarError();
			}
			else{
				mostrarError();
			}
		}else{
			mostrarError();
		}
	})
};

function emptyValue(obj){
	$return = false;
	if(obj.value != ""){
		$return = true;
	}
	return $return;
}