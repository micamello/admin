@extends('layouts.app')
@section('css')
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
@endsection

@section('content')
<div class="page-content-wrapper ">

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
              <li class="breadcrumb-item">Mantenimiento</li>
              <li class="breadcrumb-item active">Resultados</li>
            </ol>
          </div>
          <h4 class="page-title">Resultados</h4>
        </div>
      </div>
    </div>

    
    
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <div class="col-md-12">
              <div class="row">
                @if (session('edad'))
                    <div class="col-md-2">
                      <form method="get" action="{{ url('resultados') }}" id="edad_filter_form">
                        <input type="hidden" name="edad_filter_input" value="1">
                        <div class="bubble_filter">Edad: {{ session('edad') }}
                          <i onclick="submit_filter('edad_filter_form');" class="fa fa-times bubble_close">
                          </i>
                        </div>
                      </form>
                    </div>
                @endif
                @if (session('genero'))
                  <div class="col-md-2">
                    <form method="get" action="{{ url('resultados') }}" id="genero_filter_form">
                        <input type="hidden" name="genero_filter_input" value="1">
                        <div class="bubble_filter">Género: {{ session('genero') }}
                          <i onclick="submit_filter('genero_filter_form');" class="fa fa-times bubble_close">
                          </i>
                        </div>
                      </form>
                  </div>
                @endif  
              </div>
            </div>

            <form method="GET" action="{{ url('resultados') }}">
            <div class="breadcrumb">
              <!-- <div class="col-md-3">
                <label for="cuestionario">Cuestionario:</label>
                <select class="form-control form-control-sm input-sm" name="cuestionario" id="cuestionario">
                  <option value="" selected="selected" disabled="disabled">Seleccione una opción</option>
                  <option>1</option>
                  <option>2</option>
                </select>
              </div> -->
              <div class="col-md-3 offset-md-6">
                <label for="genero">Género:</label>
                <select class="form-control form-control-sm" name="genero" id="genero">
                  <option value="" selected="selected" disabled="disabled">Seleccione una opción</option>
                  <?php 
                    foreach (MyConstante::GENERO as $key => $value) {
                      echo "<option value='".$key."'>".$value."</option>";
                    }
                   ?>
                </select>
              </div>
              <div class="col-md-2">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="1" max="100" class="form-control form-control-sm">
              </div>
              <div class="col-md-1 col-sm-12">
                <input type="submit" name="filtrar" value="Filtrar" class="btn btn-success btn-sm" style="margin-top: 25px;">
              </div>
            </div>
            </form>
            <div class="table-responsive">
              <table class="table table-striped mb-0" id="usuarios">
                <thead>
	                <tr>
	                    <th>Nombres</th>
	                    <th>Apellidos</th>
	                    <th>Fecha nacimiento</th>
	                    <th>Género</th>
	                    <th>Correo</th>
                      <th>C. #1</th>
                      <th>C. #2</th>
                      <th>C. #3</th>					
						          <th>Acciones</th>
	                </tr>
                </thead>
                <tbody>
                  @foreach($respuestas as $respuesta)                  
                	<tr>
                		<td>{{$respuesta->nombres}}</td>
                		<td>{{$respuesta->apellidos}}</td>
                		<td>{{\Carbon\Carbon::parse($respuesta->fecha_nacimiento)->format('d/m/Y')}} - ({{\Carbon\Carbon::parse($respuesta->fecha_nacimiento)->age}} años)</td>
                		<td>{{$respuesta->genero}}</td>
                		<td>{{$respuesta->correo}}</td>
                    <td>{{$respuesta->uno}}</td>
                    <td>{{$respuesta->dos}}</td>
                    <td>{{$respuesta->tres}}</td>
                    <td><a href="{{ url('resultados', $respuesta->id_usuario) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
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
@endsection

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/resultados_js.js') }}"></script>
@endsection