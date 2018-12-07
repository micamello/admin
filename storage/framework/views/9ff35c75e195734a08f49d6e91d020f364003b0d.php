<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
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

                    <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert"">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="p-3">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">                            
                            <?php echo e(csrf_field()); ?>  

                            <div class="alert alert-info alert-dismissible">                                
                                Ingrese su correo electr&oacute;nico y las instrucciones ser&aacute;n enviadas!
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" id="correo" name="correo" type="email" required="" placeholder="Correo Electr&oacute;nico">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit"> Enviar Contraseña</button>
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