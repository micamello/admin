@extends('layouts.app')

@section('css')
  <link href="{{ asset('css/codemirror/codemirror.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/codemirror/material.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet" type="text/css">
  <style type="text/css">
    .CodeMirror{
      height: 500px;
    }
  </style>
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
              <li class="breadcrumb-item active">Plantillas {{ $plantilla->nombre }}</li>
            </ol>
          </div>
          <h4 class="page-title">Editar Plantilla</h4>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          	<h5>Editar Plantilla</h5>
          	<form method="POST" action="{{ route('plantillasEmail.update', ['id'=>$plantilla->id_templateEmail]) }}" id="form_plantilla_edit">
              {{ method_field('PATCH') }}
          		<div class="col-md-10 offset-md-1">
                <input type="hidden" name="id_plantilla" id="id_plantilla" value="{{ $plantilla->id_templateEmail }}">
                <input type="hidden" name="url_edit" id="url_edit" value="<?php echo Request::root(); ?>">
          			<div class="col-md-12">
          				<div class="form-group">
          					<label>Nombre</label>
          					<input class="form-control" name="nombre" value="{{ $plantilla->nombre }}" id="nombre">
                    <div>
                      
                    </div>
          				</div>
          			</div>
          			<div class="col-md-12">
          				<div class="form-group">
          					<label>Editor plantilla</label>
          					<textarea id="contenido_plantilla" name="contenido_plantilla" style="resize: none;" rows="2" class="form-control">{{ $plantilla->contenido }}</textarea>
          				</div>
          			</div>
          			<div class="form-group">
          				<label>Vista Previa</label>
          				<div id="preview_plantilla" style="overflow-y: scroll; max-height: 500px;">
          				</div>
          			</div>
                <br>
                <div class="form-group">
                  <label>TAGS OBLIGATORIOS:</label>
                  <div class="alert alert-danger" style="display: none;" id="error_tags" role="alert"></div>
                  <div class="text-center">
                    <ul class="list-group">
                      @foreach($required_words[0] as $palabra)
                        <li class="list-group-item tag_no_error">{{ $palabra }}</li>
                        <input type="hidden" name="tags[]" value="{{ $palabra }}">
                      @endforeach
                    </ul>
                  </div>
                </div>
          		</div>
              <input type="submit" name="guardar" class="btn btn-primary" value="Guardar">
          	</form>
          </div>
        </div>
      </div> <!-- end col -->
        
    </div>
   </div>
</div>
@endsection

@section('js')
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/htmlmixed/htmlmixed.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/fold/xml-fold.js"></script> -->
<script src="{{ asset('js/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('js/codemirror/xml.js') }}"></script>
<script src="{{ asset('js/codemirror/javascript.js') }}"></script>
<script src="{{ asset('js/codemirror/css.js') }}"></script>
<script src="{{ asset('js/codemirror/htmlmixed.js') }}"></script>
<script src="{{ asset('js/codemirror/formatting.js') }}"></script>
<script src="{{ asset('js/plantillas.js') }}"></script>
<!-- <script src="{{ asset('js/validarForm.js') }}"></script> -->
@endsection