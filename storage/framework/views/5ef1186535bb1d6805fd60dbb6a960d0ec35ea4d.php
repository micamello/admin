<?php $__env->startSection('content'); ?>

<div class="page-content-wrapper ">

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item">Mantenimiento</li>
              <li class="breadcrumb-item active">Administradores</li>
            </ol>
          </div>
          <h4 class="page-title">Mantenimiento de Administradores</h4>
        </div>
      </div>
    </div>
    <!-- end page title end breadcrumb -->
       
    <?php if (count($errors->usuarios->all()) > 0){ ?>
      <div class="alert alert-danger mb-0" role="alert">
        <?php foreach($errors->usuarios->all() as $error){ ?>       
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
            	<button type="button" class="btn btn-primary waves-effect waves-light" onclick="$(location).attr('href', '<?php echo route('usuarios.create'); ?>')"><i class="mdi mdi-account"></i> Nuevo Administrador</button>
            </div>  
            <div class="col-md-4">
              <form method="post" action="<?php echo route('usuarios.search'); ?>">
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
            <?php if (count($usuarios)>0){ ?>
              <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Username</th>
                    <th>Correo</th>
                    <th>Estado</th>							
					<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($usuarios as $usuario){ ?>	
                <tr>
                    <td><?php echo $usuario->id_admin;?></td>
                    <td><?php echo $usuario->nombres;?></td>
                    <td><?php echo $usuario->username;?></td>
                    <td><?php echo $usuario->correo;?></td>
                    <?php if ($usuario->estado){ ?>
					           <td><span class="badge badge-success">Activo</span></td>
					          <?php } else { ?>
					           <td><span class="badge badge-danger">Inactivo</span></td>
					          <?php } ?>
                    <td>
                      <a href="<?php echo route('usuarios.show',$usuario->id_admin); ?>" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                      <?php if ($usuario->username != 'admin') { ?>
                      <a href="<?php echo route('usuarios.edit',$usuario->id_admin); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      <a href="javascript:void(0);" class="btn btn-sm btn-danger btneliminar" id="<?php echo $usuario->id_admin;?>"><i class="fas fa-trash-alt"></i></a>
                      <?php } ?>                        
                    </td>
                </tr>
                <?php }?>
                
                </tbody>
              </table>
              <?php echo $usuarios->render();?>
            <?php }?>
            </div>
                
          </div>
        </div>
      </div> <!-- end col -->
        
    </div> <!-- end row -->

  </div><!-- container -->

</div> <!-- Page content Wrapper -->

<?php $__env->stopSection(); ?>                    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>