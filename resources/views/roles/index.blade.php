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
              <li class="breadcrumb-item">Mantenimiento</li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div>
          <h4 class="page-title">Mantenimiento de Roles</h4>
        </div>
      </div>
    </div>
    <!-- end page title end breadcrumb -->
       
    <?php if (count($errors->rol->all()) > 0){ ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php foreach($errors->rol->all() as $error){ ?>       
            <?php echo $error;?><br>                        
        <?php } ?>
      </div>
      <br> 
    <?php }?>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
        	<div class="row"> 
        	  <div class="col-md-8">
            	<button type="button" class="btn btn-primary waves-effect waves-light" onclick="$(location).attr('href', '<?php echo route('roles.create'); ?>')"><i class="mdi mdi-account"></i> Nuevo Rol</button>
            </div>  
            <div class="col-md-4">
              <form method="post" action="<?php echo route('roles.search'); ?>">
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
            <?php if (count($roles)>0){ ?>
              <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>                    
					          <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($roles as $rol){ ?>	
                <tr>
                    <td><?php echo $rol->id_rol;?></td>
                    <td><?php echo $rol->descripcion;?></td>
                    <td>
                      <a href="<?php echo route('roles.show',$rol->id_rol); ?>" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                      <a href="<?php echo route('roles.edit',$rol->id_rol); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      <a href="javascript:void(0);" class="btn btn-sm btn-danger btneliminar" id="<?php echo $rol->id_rol;?>" pantalla="roles"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php }?>
                
                </tbody>
              </table>
              <?php echo $roles->render();?>
            <?php }?>
            </div>
                
          </div>
        </div>
      </div> <!-- end col -->
        
    </div> <!-- end row -->

  </div><!-- container -->

</div> <!-- Page content Wrapper -->

@endsection                    