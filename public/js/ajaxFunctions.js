if ($('#idEmpresa').length > 0){
	$('#idEmpresa').on('change',function(){
		listarOfertas($(this).val());
	})
}


function listarOfertas(id_empresa){
	$.ajax({
	   	type:'GET',
	   	url:'buscarOferta/'+id_empresa,
	   	dataType: 'json',
	   	success:function(data) {
	   		var tablaOfertasBody = $('#tablaOfertas').find('tbody');
	      	var htmlTable = "";
	      	if(data.ofertaEmpresa.length != 0){
		      for (var i = 0; i < data.ofertaEmpresa.length; i++) {
		      	htmlTable +="<tr rowspan='2' class='text-cabecera'><td>"+data.ofertaEmpresa[i].plan+"</td><td>"+data.ofertaEmpresa[i].titulo+"</td><td>"+data.ofertaEmpresa[i].numeroPos+"</td><td>"+data.ofertaEmpresa[i].fecha_creado+"</td><td>"+data.ofertaEmpresa[i].nombre+"</td><td>"+data.ofertaEmpresa[i].fecha_caducidad+"</td><td>"+data.ofertaEmpresa[i].estatus+"</td><td><a class='btn btn-info' onclick='verOfertaDetail("+data.ofertaEmpresa[i].id_ofertas+")'><i class='fa fa-eye blue-icon' data-toggle='tooltip' data-placement='top' title='Ver detalle'></i></a></td></tr>";
		      }
		    }
		    else{
		    	htmlTable ="<tr><td colspan='3'>No hay ofertas</td></tr>";
		    }
	      tablaOfertasBody.html(htmlTable);
	   	},
	   error: function (request, status, error) {
	   			console.log(request.responseText);
       	} 
	});

}


function verOfertaDetail(id_oferta){
	$.ajax({
	   type:'GET',
	   url:'buscarOfertaAjax/'+id_oferta,
	   dataType: 'json',
	   success:function(data) {
	   	  //console.log( data.ofertaFound );
	      $('#titulo_oferta').html(data.ofertaFound[0].titulo);
	      $('#contenido_oferta').html(data.ofertaFound[0].descripcion+
	      	                    "<hr>"+
	      	                    "<div class='row'>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Oferta N°: </b>" + data.ofertaFound[0].id_ofertas + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Empresa :</b> " + data.ofertaFound[0].empresa+  
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Candidatos en la oferta:</b> " + data.ofertaFound[0].numeroPos + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Oferta publicada:</b> " + data.ofertaFound[0].fecha_creado+ 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Oferta vence:</b> " + data.ofertaFound[0].fecha_caducidad+ 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Oferta :</b> " + data.ofertaFound[0].estatus+  
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Ciudad oferta:</b> " + data.ofertaFound[0].ciudad +  
		      	                    "</div>"+
	      	                    "</div>"+
	      	                    
	      	                    "<hr>"+
	      	                    "<div class='row'>"+
	      	                        "<div class='col-md-6'>"+
		      	                    "<b>Oferta creada con plan:</b> " + data.ofertaFound[0].plan+  
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Plan:</b> " + data.ofertaFound[0].estatus_plan+ 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Fecha creado el plan:</b> " + data.ofertaFound[0].fecha_compra_plan+   
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Fecha vence el plan:</b> " + data.ofertaFound[0].fecha_caducidad_plan+ 
		      	                    "</div>"+
		      	                "</div>"+

	      	                    "<hr>"+
	      	                    "<div class='row'>"+
	      	                        "<div class='col-md-6'>"+
	      	                        "<b>Representante de la empresa:</b> " + data.ofertaFound[0].contacto_nombre + 
	      	                        "&nbsp" + data.ofertaFound[0].contacto_apellido +
	      	                        "</div>"+
	      	                        "<div class='col-md-6'>"+
	      	                        "<b>Telefono:</b> " + data.ofertaFound[0].telefono1 +
	      	                        "</div>"+   
	      	                    "</div>"+
	      	                    "</div>");

	      $('#oferta_modal').modal('show');
	   },
	   error: function (request, status, error) {
	   			console.log(request.responseText);
            } 
	});
}


/********************************************PLANES*************************************************/

if ($('#idEmpresaPlan').length > 0){
	$('#idEmpresaPlan').on('change',function(){
		listarPlanes($(this).val());
	})
}


function listarPlanes(id_empresa){
	$.ajax({
	   	type:'GET',
	   	url:'buscarPlan/'+id_empresa,
	   	dataType: 'json',
	   	success:function(data) {
	   		//console.log( data.planEmpresa )
	   		var tablaPlanesBody = $('#tablaPlanes').find('tbody'); 
	      	var htmlTable = "";
	      	if(data.planEmpresa.length != 0){
		      for (var i = 0; i < data.planEmpresa.length; i++) {
		      	htmlTable +="<tr rowspan='2' class='text-cabecera'><td>"+data.planEmpresa[i].plan+"</td><td>"+data.planEmpresa[i].fecha_compra_plan+"</td><td>"+data.planEmpresa[i].fecha_caducidad_plan+"</td><td>"+data.planEmpresa[i].num_accesos_rest+"</td><td>"+data.planEmpresa[i].estatus_plan+"</td><td><a class='btn btn-info' onclick='verPlanDetail("+data.planEmpresa[i].id_plan+','+id_empresa+")'><i class='fa fa-eye blue-icon'></i></a></tr>";
		      }
		    }
		    else{
		    	htmlTable ="<tr><td colspan='3'>No existe un plan</td></tr>";
		    }
	      tablaPlanesBody.html(htmlTable);
	   	},
	   error: function (request, status, error) {
	   			console.log(request.responseText);
       	} 
	});

}



function verPlanDetail(id_plan, id_empresa){
	$.ajax({
	   type:'GET',
	   url:'buscarPlanAjax/'+id_plan+'/'+id_empresa,
	   dataType: 'json',
	   success:function(data) {
	   	  //console.log( data.planFound ); 
	      $('#titulo_plan').html("Plan "+ data.planFound[0].plan);
	      $('#contenido_plan').html(
	      	                    "<div class='row'>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Empresa : </b>" + data.planFound[0].empresa + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Estatus del plan:</b> " + data.planFound[0].estatus_plan + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Fecha de compra del plan :</b> " + data.planFound[0].fecha_compra_plan+  
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Fecha de caducidad del plan:</b> " + data.planFound[0].fecha_caducidad_plan + 
		      	                    "</div>"+
		      	                "</div>"+
		      	                    
		      	                "<hr>"+
	      	                    "<div class='row'>"+
	      	                        "<div class='col-md-6'>"+
		      	                    "<b>N° de Postulaciones por defecto:</b> " + data.planFound[0].num_post + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>N° de Postulaciones restantes:</b> " + data.planFound[0].num_publicaciones_rest + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>N° de Accesos por defecto:</b> " + data.planFound[0].num_accesos + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>N° de Accesos restantes:</b> " + data.planFound[0].num_accesos_rest + 
		      	                    "</div>"+
		      	                "</div>"+

		      	                 "<hr>"+
		      	                 "<div class='row'>"+
	      	                        "<div class='col-md-6'>"+
		      	                    "<b>Tipo de plan:</b> " + data.planFound[0].tipo_plan + 
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Costo del plan:</b> " + data.planFound[0].costo + ' <b>$</b>'+
		      	                    "</div>"+
		      	                    "<div class='col-md-6'>"+
		      	                    "<b>Duración del plan:</b> " + data.planFound[0].duracion +' días'+ 
		      	                    "</div>"+
		      	                "</div>"+
	      	                    "</div>");

	      $('#plan_modal').modal('show');
	   },
	   error: function (request, status, error) {
	   			console.log(request.responseText);
            } 
	});
}
