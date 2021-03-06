@extends('layouts.app')

@section('content')

	<div class="page-content-wrapper ">

    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <div class="btn-group float-right">
              <ol class="breadcrumb hide-phone p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>                            
                <li class="breadcrumb-item"><a href="{{ url('/administradores') }}">Administrador</a></li>
                <li class="breadcrumb-item active">Consulta</li>
              </ol>
            </div>
            <h4 class="page-title">Consulta Administrador</h4>
          </div>
        </div>
      </div>      
      
      <!-- end page title end breadcrumb -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                                                  
              <div class="form-group">
                <label>ID:</label>
                <p><?php echo $administrador->id_admin;?></p>
              </div>

              <div class="form-group">
                <label>Usuario:</label>                                
                <p><?php echo $administrador->username;?></p>
              </div>

              <div class="form-group">
                <label>Correo Electr&oacute;nico:</label>
                <p><?php echo $administrador->correo;?></p>
              </div>

              <div class="form-group">
                <label>Nombres:</label>                    
                <p><?php echo $administrador->nombres;?></p>
              </div>
                
              <div class="form-group">
                <label>Estado:</label>                    
                <p><?php echo ($administrador->estado == 1) ? "Activo" : "Inactivo";?></p>
              </div>  

              <div class="form-group">
                <label>Ultima Sesion:</label>                    
                <p><?php echo $administrador->ultima_sesion;?></p>
              </div> 

              <div class="form-group">
                <label>Rol:</label>                    
                <p><?php echo $administrador->desrol;?></p>                  
              </div> 

              <div class="form-group mb-0">
                <div>                    
                  <button type="button" class="btn btn-secondary waves-effect m-l-5" onclick="$(location).attr('href', '<?php echo route('administradores.index'); ?>')">Cancelar</button>
                </div>
              </div>
              
            </div>
          </div>
        </div> <!-- end col -->
          
      </div> <!-- end row --> 

    </div><!-- container -->

  </div> <!-- Page content Wrapper -->

@endsection