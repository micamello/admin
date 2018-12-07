<?php $__env->startSection('content'); ?>

	<div class="page-content-wrapper ">

    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <div class="btn-group float-right">
              <ol class="breadcrumb hide-phone p-0 m-0">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Inicio</a></li>                            
                <li class="breadcrumb-item"><a href="<?php echo e(url('/usuarios')); ?>">Administrador</a></li>
                <li class="breadcrumb-item active">Nuevo</li>
              </ol>
            </div>
            <h4 class="page-title">Nuevo Administrador</h4>
          </div>
        </div>
      </div>

      <?php if (count($errors->usuarios->all()) > 0){ ?>
      <div class="alert alert-danger mb-0" role="alert">
        <?php foreach($errors->usuarios->all() as $error){ ?>				
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
                                    
              <form method="post" action="<?php echo route('usuarios.store'); ?>">
                <div class="form-group">
                  <label>Usuario:</label>
                  <input type="text" class="form-control" required placeholder="Usuario" name="username" id="username"/>
                </div>

                <div class="form-group">
                  <label>Clave:</label>                                
                  <input type="text" name="password" id="password" class="form-control" required placeholder="Clave"/>
                </div>

                <div class="form-group">
                  <label>Correo Electr&oacute;nico:</label>
                  <div>
                    <input type="email" class="form-control" required
                            parsley-type="email" placeholder="Correo Electr&oacute;nico" name="correo" id="correo"/>
                  </div>
                </div>

                <div class="form-group">
                  <label>Nombres:</label>                    
                  <input name="nombres" id="nombres" type="text" class="form-control" required placeholder="Nombres"/>                    
                </div>
                
                <div class="form-group">
                  <label>Estado:</label>                    
                  <select class="form-control" id="estado" name="estado">
                    <option value="1">Activo</option>
			   	          <option value="0">Inactivo</option>
                  </select>                    
                </div>  

                <div class="form-group">
                  <label>Rol:</label>                    
                  <select class="form-control" id="id_rol" name="id_rol">
                    <?php foreach($roles as $rol){ ?>
			   	  					<option value="<?php echo $rol->id_rol;?>"><?php echo $rol->descripcion;?></option>
			    					<?php } ?>
                  </select>                    
                </div> 

                <div class="form-group mb-0">
                  <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                    <button type="button" class="btn btn-secondary waves-effect m-l-5" onclick="$(location).attr('href', '<?php echo route('usuarios.index'); ?>')">Cancelar</button>
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