@extends('layouts.app')

@section('content')

<div class="panel">
	<br>

	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Empresa: </label>
	    <div class="col-sm-12">
	      <select class="custom-select" id="idEmpresaPlan">
		    <option selected>Seleccione una empresa</option>
		    @foreach($lista as $array)
		      <option value="{{ $array->id_empresa }}">{{ $array->nombres }}</option>
		    @endforeach
		  </select>
	    </div>
	  </div>
<br>
</div>

	
	<button type="submit" class="btn btn-default"></button>


<div class='panel panel-default shadow'>
	<div class='panel-body'>
		<div id="no-more-tables" class="table-responsive">
			<table class="table table-hover" id="tablaPlanes">
			  <thead class="etiquetaBody">
			    <tr>
			      <th rowspan="2" class="font-weight-light text-cabecera">Nombre del Plan</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Fecha de compra del Plan</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Fecha de caducidad del Plan</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Accesos disponibles en el Plan</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Estatus del Plan</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			  </tbody>
			</table>

			</div>
		    
	</div>
</div>

<div class="modal fade bs-example-modal-lg show" id="plan_modal" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="titulo_plan"></h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <div id="contenido_plan">
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
	            </div>
	        </div>
	    </div>
	</div>	

@endsection()
@section('js')
<script src="{{ asset('js/ajaxFunctions.js') }}"></script>
@endsection()
