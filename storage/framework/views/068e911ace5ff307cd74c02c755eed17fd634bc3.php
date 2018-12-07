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
                <li class="breadcrumb-item active">Nuevo</li>
              </ol>
            </div>
            <h4 class="page-title">Nuevo Rol</h4>
          </div>
        </div>
      </div>

      <?php if (count($errors->rol->all()) > 0){ ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php foreach($errors->rol->all() as $error){ ?>				
            <?php echo $error;?><br>        								
			  <?php } ?>
			</div>
			<br> 
		  <?php }?>
      
      <!-- end page title end breadcrumb -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                                    
              <form method="post" action="<?php echo route('roles.store'); ?>">
                <div class="form-group">
                  <label>Descripcion:</label>
                  <input type="text" class="form-control" required placeholder="Descripcion" name="descripcion" id="descripcion"/>
                </div>
                
                <div class="form-group mb-0">
                  <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                    <button type="button" class="btn btn-secondary waves-effect m-l-5" onclick="$(location).attr('href', '<?php echo route('roles.index'); ?>')">Cancelar</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div> <!-- end col -->
          
      </div> <!-- end row --> 

    </div><!-- container -->

  </div> <!-- Page content Wrapper -->
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>