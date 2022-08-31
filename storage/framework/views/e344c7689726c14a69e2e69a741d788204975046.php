<?php $__env->startSection('content'); ?>
    <section class="login">
        <div class="container content_into_perfil">

            <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                    <strong><?php echo e(Session::get('message')); ?></strong>
                </div>
            <?php endif; ?>

            <div class="row ">
                <div class="col-md-7">
                    <div class="row">
                        <div class="content_perfil">
                            <h2>Bienvenid@, <?php echo e($customer->name); ?></h2>
                                                        <a href="<?php echo e(route('editProfile')); ?>" class="bt_perfil">Editar perfil</a>
                        </div>
                    </div>


                    <div class="row mt_50">
                        <div class="col-md-10">
                        <div class="content_perfil2">
                            <h2 class="colorcodigo">Cómo registrar tus facturas</h2>
                        </div>
                    </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img_explicacion">
                                        <img class="img-fluid" src="<?php echo e(asset('images/ResponsiveEmpaque1.png')); ?>" alt="">

                                    </div>
                                    <lu class="exp">
                                        <li>Compra tu Pediasure en tu presentación favorita. Ingresa tus datos más tu factura de compra en este link y ¡ya estás participando! Podrás ganar increíbles Kits Tablet de última generación y decenas de pijamitas Pediasure.
                                        </li>
                                    </lu>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-md-5">

                      <div class="row mt_50">
                        <div class="ingr_cod">
                            <form method="POST" action="<?php echo e(route('postCodes')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <h3>SUBE TU FACTURA</h3>
                               <div class="inputblanco"> 
                                    <button id="btnUpload" type="button" class="codes form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        SUBE TU FACTURA AQUÍ
                                    </button>
                                    <input id="code" name="code" accept="image/*" type="file" style="display: none;" required></div>
                                    <?php $__errorArgs = ['code'];
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
                        </div>
                    </div>

                     <div class="row">
                        <div class="content_perfil3">
                            <h2 class="titulocodigos">Tus Facturas Ingresadas</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive" id="sailorTableArea">
                            <table id="sailorTable" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Fecha de ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $customer->codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>Factura #<?php echo e($customer->codes->count() - $key); ?></td>
                                            <td><?php echo e($code->created_at->format('Y-m-d h:i:s A')); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(empty($customer->codes->count())): ?>
                                        <tr>
                                            <td>Aún no has cargado una factura</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row_gen">
                <div class="counter_int">
                    <div class="row_gen">

                        <?php if($nextContest): ?>
                            <div class="subtitle2">
                                <h3>PRÓXIMO SORTEO <?php echo e(Utils::spanishDate($nextContest->contest_date)); ?></h3>
                            </div>
                            <div class="count">
                                <div id="countdown" class="row justify-content-center align-items-center"></div>
                            </div>
                        <?php endif; ?>

                        <div class="subtitle">
                            <!--<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h4>
                            <h5>*Imágenes con fines ilustrativos, los códigos utilizados no tienen validez para esta promoción.</h5>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#btnUpload').on('click', function() {
                $('input#code').trigger('click');
            });
        });
    </script>

    <?php if($nextContest): ?>
        <script src="<?php echo e(asset('js/countdown.jquery.min.js')); ?>"></script>
        <script>
            $(document).ready(function() {
                $('#countdown')
                    .countdown(
                        '<?php echo e($nextContest->contest_date->format("Y/m/d H:i:s")); ?>',
                        function(event) {
                            $(this).html(event.strftime('<div class="col-xs-3 col-sm-2 animated rotateIn" id="days"><div class="wrapper"><span class="time">%w</span><span class="label">semanas</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="days"><div class="wrapper"><span class="time">%d</span><span class="label">días</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="hours"><div class="wrapper"><span class="time">%H</span><span class="label">horas</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="minutes"><div class="wrapper"><span class="time">%M</span><span class="label">minutos</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="seconds"><div class="wrapper"><span class="time">%S</span><span class="label">segundos</span></div></div>'));
                        }
                    );
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/558456.cloudwaysapps.com/vsuwfgzjnz/public_html/resources/views/codes.blade.php ENDPATH**/ ?>