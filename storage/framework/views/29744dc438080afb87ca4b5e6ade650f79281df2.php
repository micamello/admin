<?php $__env->startSection('content'); ?>

	<div class="page-content-wrapper ">

    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <div class="btn-group float-right">
              <ol class="breadcrumb hide-phone p-0 m-0">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Inicio</a></li>                            
                <li class="breadcrumb-item"><a href="<?php echo e(url('/roles')); ?>">Rol</a></li>
                <li class="breadcrumb-item active">Consulta</li>
              </ol>
            </div>
            <h4 class="page-title">Consulta Rol</h4>
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
                <p><?php echo $rol->id_rol;?></p>
              </div>

              <div class="form-group">
                <label>Descripcion:</label>                                
                <p><?php echo $rol->descripcion;?></p>
              </div>

              <div class="form-group mb-0">
                <div>                    
                  <button type="button" class="btn btn-secondary waves-effect m-l-5" onclick="$(location).attr('href', '<?php echo route('roles.index'); ?>')">Cancelar</button>
                </div>
              </div>
              
            </div>
          </div>
        </div> <!-- end col -->
          
      </div> <!-- end row --> 

    </div><!-- container -->

  </div> <!-- Page content Wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>