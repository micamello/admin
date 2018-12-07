<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <meta content="Administrador Mi Camello" name="description" />
        <meta content="Mi Camello" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>">

        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('css/icons.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <div class="text-center m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="<?php echo e(asset('images/logo.png')); ?>" height="50" alt="logo"></a>
                    </div>

                    <?php if (count($errors->all()) > 0){ ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php foreach($errors->all() as $error){ ?>               
                            <?php echo $error;?><br>                                        
                        <?php } ?>
                      </div>                      
                    <?php }?>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" id="username" name="username" placeholder="Usuario / Correo Electr&oacute;nico">   
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" id="password" name="password" required="" placeholder="Contraseña"> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="remember">Recordar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Ingresar</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="<?php echo e(route('password.request')); ?>" class="text-muted"><i class="mdi mdi-lock"></i> <small>Olvid&oacute; su Contraseña?</small></a>
                                </div>                                
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/modernizr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/detect.js')); ?>"></script>
        <script src="<?php echo e(asset('js/fastclick.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.blockUI.js')); ?>"></script>
        <script src="<?php echo e(asset('js/waves.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.scrollTo.min.js')); ?>"></script>

        <!-- App js -->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    </body>
</html>