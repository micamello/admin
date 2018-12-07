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
              <li class="breadcrumb-item">Mantenimientos</li>
              <li class="breadcrumb-item active">Acciones del Sistema</li>
            </ol>
          </div>
          <h4 class="page-title">Listado de Acciones del Sistema</h4>
        </div>
      </div>
    </div>
    <!-- end page title end breadcrumb -->        

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
        	<div class="row"> 
        	  
            <div class="col-md-8"></div>

            <div class="col-md-4">
              <form method="POST" action="<?php echo route('acciones.search'); ?>">
                <div class="input-group mt-2">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </span>
                  <input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Buscar">
                </div>
              </form>
            </div>
            </div>
            <p></p>
            <div class="table-responsive">
            <?php if (count($acciones)>0){ ?>
              <table class="table table-striped mb-0">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Accion</th>
                  <th>Descripci&oacute;n</th>
                  <th>Estado</th>
                  <th>Tipo de Usuario</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($acciones as $accion){ ?>	
                  <tr>
                    <td><?php echo $accion->id_accionSist;?></td>
                    <td><?php echo $accion->accion;?></td>
                    <td><?php echo $accion->descripcion;?></td>                    
                    <?php if ($accion->estado){ ?>
					           <td><span class="badge badge-success">Activo</span></td>
					          <?php } else { ?>
					           <td><span class="badge badge-danger">Inactivo</span></td>
					          <?php } ?>
                    <td><?php 
                    if ($accion->tipo_permiso == $accion::CANDIDATO){
                      echo "Candidato";
                    }
                    elseif($accion->tipo_permiso == $accion::EMPRESA){
                      echo "Empresa";
                    }
                    else{
                      echo "Administrativo";  
                    }
                    ?></td>
                  </tr>
                <?php }?>
                
                </tbody>
              </table>
              <?php echo $acciones->render();?>
            <?php }?>
            </div>
                
          </div>
        </div>
      </div> <!-- end col -->
        
    </div> <!-- end row -->

  </div><!-- container -->

</div> <!-- Page content Wrapper -->

@endsection                    