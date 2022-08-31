<nav class="navbar navbar-expand-lg navbar-dark bg-orange fixed-top" id="topmenu">
    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
        <img src="<?php echo e(asset('images/logo.svg')); ?>" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/')); ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('winners')); ?>">Ganadores</a>
            </li>

            <?php if(Auth::guard('customers')->guest()): ?>
               <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                </li>-->
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('codes')); ?>">Facturas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(\Auth::guard('customers')->user()->name); ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('editProfile')); ?>">Editar Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                    </div>
                </li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH /home/558456.cloudwaysapps.com/vsuwfgzjnz/public_html/resources/views/layouts/nav.blade.php ENDPATH**/ ?>