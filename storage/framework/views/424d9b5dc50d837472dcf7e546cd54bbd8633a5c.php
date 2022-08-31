<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-heading new-setting">
                    <h2 class="panel-title">Ganadores</h2>
                </div>

                <?php if( empty($contest->winners->count()) ): ?>
                    <div class="panel panel-bordered">
                        <form role="form" class="form-edit-add" action="<?php echo e(route('admin_contest_generate')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">
                                        Generar ganadores para el sorteo <strong><?php echo e($contest->title); ?></strong>
                                    </label>
                                    <input type="hidden" name="contest" value="<?php echo e($contest->id); ?>">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Generar</button>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="panel-body">
                        <form role="form" class="form-edit-add" action="<?php echo e(route('admin_contest_update')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="table-responsive">
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Identificación</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Factura</th>
                                            <th>Fecha Registro</th>
                                            <th class="actions">
                                                Ganador?
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $contest->winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th><?php echo e($winner->customer->identification); ?></th>
                                                <th><?php echo e($winner->customer->name); ?></th>
                                                <th><?php echo e($winner->customer->last_name); ?></th>
                                                <th><?php echo e($winner->customer->email); ?></th>
                                                <th><?php echo e($winner->customer->phone); ?></th>
                                                <th>
                                                    <img src="<?php echo e(env('APP_URL')); ?><?php echo e(Storage::url($winner->code->code)); ?>" style="width:100px">
                                                </th>
                                                <th><?php echo e($winner->code->created_at); ?></th>
                                                <td class="no-sort no-click bread-actions">
                                                    <input type="hidden" name="code_id[<?php echo e($key); ?>]" value="<?php echo e($winner->code_id); ?>">
                                                    <input type="checkbox" name="confirmed[<?php echo e($key); ?>]" class="toggleswitch"
                                                        data-on="Si" <?php echo $winner->confirmed ? 'checked="checked"' : ''; ?>

                                                        data-off="No">
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <input type="hidden" name="contest" value="<?php echo e($contest->id); ?>">
                                <button type="submit" class="btn btn-primary save">Actualizar</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/558456.cloudwaysapps.com/vsuwfgzjnz/public_html/resources/views/vendor/voyager/contests/partials/winners.blade.php ENDPATH**/ ?>