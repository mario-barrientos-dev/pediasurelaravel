<?php $__env->startSection('content'); ?>
    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="girl">
                        <img class="img-fluid" src="<?php echo e(asset('images/girl.png')); ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_login">
                        <h2>Login</h2>
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <input id="email" name="email" type="email" class="fadeIn second form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="E-mail" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus maxlength="190">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                            <input id="password" name="password" type="password" class="fadeIn third form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required autocomplete="current-password" placeholder="Contraseña" maxlength="190">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                            <a class="forgot" href="<?php echo e(route('password.request')); ?>">
                                ¿Olvidaste tu contraseña?
                            </a>
                            
                            <input type="submit" class="bt_ingresar" value="Ingresar">
                        </form>
                        <!-- Remind Passowrd -->
                       <!-- <div id="formFooter">
                            <a class="underlineHover" href="<?php echo e(route('register')); ?>">¿ERES NUEVO? REGISTRATE AQUÍ</a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/558456.cloudwaysapps.com/vsuwfgzjnz/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>