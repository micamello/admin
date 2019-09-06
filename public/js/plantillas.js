function verPlantilla(id_plantilla){
	var id =  id_plantilla;
	$.ajax({
	   type:'GET',
	   url:'buscarPlantillaAjax/'+id,
	   dataType: 'json',
	   data:'_token = <?php echo csrf_token() ?>',
	   success:function(data) {
	      $('#nombre_plantilla').html("Plantilla "+data.plantilla.nombre);
	      $('#contenido_plantilla').html(data.plantilla.contenido);
	      $('#plantilla_modal').modal('show');
	   },
	   error: function (request, status, error) {
	   			console.log(request.responseText);
                // alert(request.responseText);
            } 
	});
}

// if($('#preview_plantilla').length > 0){
// 	var contenido = $('#contenido_plantilla');
// 	$('#preview_plantilla').html(contenido.val());
// }

// $('#contenido_plantilla').on('keyup', function(){
// 	var contenido = $('#contenido_plantilla');
// 	$('#preview_plantilla').html(contenido.val());
// });

// Codemirror
var delay;
var editor = CodeMirror.fromTextArea(document.getElementById("contenido_plantilla"), {
    lineNumbers: true,
    lineWrapping: false,
    viewportMargin: Infinity,
    autofocus: true,
    mode: "htmlmixed"
  });

editor.setOption("theme", 'material');
editor.setSize("100%", "400px");

  $(document).ready(function(){
    autoFormat();
  });

  function autoFormat() {
    CodeMirror.commands["selectAll"](editor);
    editor.autoFormatRange(editor.getCursor(true), editor.getCursor(false));
    editor.setCursor(0);
  }

  editor.on('change', function(){
  	var editor_text = editor.getValue();
  	$('#preview_plantilla').html(editor_text);
    findTextandMark(editor_text);

  });

  $(document).ready(function(){
    camposForm("");
  })

 


// Vaidación de formulario

  // var req = [];

  

  function camposForm(mode){
    var campos = [];
    var nombre = [$('#nombre'), ['no_nullable', 'plantillaExiste', 'blur']];
    campos.push(nombre);
    
    for (var i =  0; i < campos.length; i++) {
      if(mode == ""){
        // if(campos[i][1][0] != ""){
          createEvent(campos[i][0], campos[i][1][0], campos[i][1][1], campos[i][1][2]);
        // }
        // if(campos[i][1][1] != ""){
        //   verifyExistAjax(campos[i][0], campos[i][1][1]);
        // }
      }
      else{
        if(campos[i][1][0] != ""){
          verifyEmpty(campos[i][0]);
        }
        verifyExistAjax(campos[i][0], campos[i][1][1], campos[i][1][2]);
      }
    }
  }

   $('#form_plantilla_edit').on('submit', function(event){
      camposForm(1);
      console.log($('.error_field'));
      console.log(validateErrors());
      // if(validateErrors() > 0) {
        event.preventDefault();
      // }
    });

   function verifyEmpty(obj){
    // console.log("editor_text");
    if($(obj).val() == "")
    {
      crearMensajeError(obj, "El campo no debe ser vacío");
    }
    else{
      eliminarMensajeError(obj, "");
    }
   }

   function createEvent(obj, empty, url, event){
    if($(obj).length){
      $(obj).on(event, function(){
        if(empty != ""){
          verifyEmpty(obj);
        }
        if(url != "" && $(obj).val() != ""){
          verifyExistAjax(obj, url);
        }
      });
    }
   }

   function crearMensajeError(obj, mensaje){
      $(obj).siblings('div').html(mensaje);
      $(obj).siblings('div').addClass('error_field');
    // } 
  }

  function eliminarMensajeError(obj, mensaje){
      $(obj).siblings('div').html(mensaje);
      $(obj).siblings('div').removeClass('error_field');
    // }
  }

  function verifyErrors(){
    var error_field = $('.error_field');
    if(error_field.length > 0){
      return false;
    }
    else{
      return true;
    }
  }

  function verifyExistAjax(obj, url){
    console.log(obj);
    var id = $('#id_plantilla').val();
    var nombre = $(obj).val();
    var url = $('#url_edit').val() + '/'+url+'/';
    $.ajax({
       type:'GET',
       url:url+id+'/'+nombre,
       dataType: 'json',
       data:'_token = <?php echo csrf_token() ?>',
       success:function(data) {
        if(data.plantilla != null){
          crearMensajeError(obj, "El nombre ingresado ya esta en la lista");
        }
        else{
          eliminarMensajeError(obj, "");
        }
       },
       error: function (request, status, error) {
          console.log(request.responseText);
        }
    });
  }

  function findTextandMark(editor_text){
    var contenido = editor_text;
    var fromtext = [];
    fromtext = contenido.match(/°(.*?)°/g);
    var tags = [];
    var compare = [];
    var tags_form = $('.list-group-item');

    for (var j = 0; j < tags_form.length; j++) {
      // $(tags_form[j]).css('color', 'black');
      // $(tags_form[j]).css('background-color', 'white');
      $(tags_form[j]).addClass('tag_no_error');
    }
    
    if(fromtext == null){
      fromtext = [1];
    }
    if(fromtext != null){
      if(tags_form.length){
        for (var i = 0; i < tags_form.length; i++) {
          tags.push($(tags_form[i]).text());
        }
          compare = tags.filter(function (a) {     
          var e = fromtext.indexOf(a) === -1; 
          return e;
        });
          for (var i = 0; i < compare.length; i++) {
            for (var j = 0; j < tags_form.length; j++) {
              if($(tags_form[j]).text() == compare[i]){
                // $(tags_form[j]).css('color', 'white');
                // $(tags_form[j]).css('background-color', '#F08686');
                $(tags_form[j]).removeClass('tag_no_error');
                $(tags_form[j]).addClass('tag_error');
                break;
              }
            }
          }
      }
    }
  }

  function validateErrors(){
    var error_fields = $('.error_field').length;
    console.log(error_fields);
    var tag_error = $('.tag_error').length;
    return error_fields + tag_error;
  }
// Vaidación de formulario