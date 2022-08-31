<?php $__env->startSection('content'); ?>
    <section class="login">
        <div class="container content_into_perfil">
            <div class="row ">
                <div class="col-md-12">
                    <div class="row">
                        <div class="content_perfil">
                            <h2 class="titulocodigos">Ganadores</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive" id="sailorTableArea">
                            <table id="sailorTable" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>FECHA DEL SORTEO</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($winner->contest->title); ?></td>
                                        <td><?php echo e($winner->customer->name); ?></td>
                                        <td><?php echo e($winner->customer->last_name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/558456.cloudwaysapps.com/vsuwfgzjnz/public_html/resources/views/winners.blade.php ENDPATH**/ ?>