@extends('layouts.app')

@section('content')
<div class="page-content-wrapper ">

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
              {{-- <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li> --}}
              <li class="breadcrumb-item">Mantenimiento</li>
              <li class="breadcrumb-item active">Plantillas correo</li>
            </ol>
          </div>
          <h4 class="page-title">Mantenimiento de Administradores</h4>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

        <?php
          if(MyConstante::SHOWOPTION == 1){?>
        	<div class="row"> 
        	  <div class="col-md-8">
            	<button type="button" class="btn btn-primary waves-effect waves-light" onclick="$(location).attr('href', '<?php echo route('administradores.create'); ?>')"><i class="mdi mdi-file"></i> Nueva Plantilla</button>
            </div>  
            <div class="col-md-4">
              <form method="post" action="<?php echo route('administradores.search'); ?>">
                <div class="input-group mt-2">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </span>
                  <input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Buscar">
                </div>
              </form>
            </div>
            </div>

        <?php }?>

            <p></p>
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>							
					<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($listadoPlantillas as $plantilla)
                		<tr>
                			<td>{{ $plantilla->id_templateEmail }}</td>
                			<td>{{ $plantilla->nombre }}</td>
                			<td>
                				<a href="{{ route('plantillasEmail.edit', $plantilla->id_templateEmail) }}" class="btn btn-success"><i class=" mdi mdi-square-edit-outline"></i></a>
                				<?php $render = ("'".$plantilla->contenido."'"); ?>
                				<a onclick="verPlantilla('<?php echo $plantilla->id_templateEmail; ?>');" class="btn btn-info"><i class="mdi mdi-eye"></i></a>
                			</td>
                		</tr>
                	@endforeach
                </tbody>
              </table>
            </div>
                
          </div>
        </div>
      </div> <!-- end col -->
        
    </div>
   </div>
  </div>

 	<div class="modal fade bs-example-modal-lg show" id="plantilla_modal" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="nombre_plantilla"></h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <div id="contenido_plantilla">
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
	            </div>
	        </div>
	    </div>
	</div>	
@endsection
@section('js')
<script src="{{ asset('pages/modal-animation.js') }}"></script>
<script src="{{ asset('js/plantillas.js') }}"></script>
@endsection