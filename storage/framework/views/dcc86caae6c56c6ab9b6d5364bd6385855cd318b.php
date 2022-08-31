<?php $__env->startSection('content'); ?>
    <section class="login">
        <div class="container-fluid">
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="girl">
                        <img class="img-fluid" src="<?php echo e(asset('images/girl.png')); ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_login">
                        <h2><?php echo e(__('Reset Password')); ?></h2>
                        <form method="POST" action="<?php echo e(route('password.email')); ?>">
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
                           
                            <input type="submit" class="bt_ingresar" value="Enviar">
                        </form>
                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="<?php echo e(route('register')); ?>">¿Eres nuevo? Regístrate aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/558456.cloudwaysapps.com/vsuwfgzjnz/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>