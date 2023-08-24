<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?php echo e(session()->get('page_title')); ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <?php $__currentLoopData = session()->get('breadcrumb'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item <?php if(last(session()->get('breadcrumb')) == $breadcrumb): ?> active <?php endif; ?>">
                        <?php if(last(session()->get('breadcrumb')) != $breadcrumb): ?>
                            <a href="<?php echo e($breadcrumb['link']); ?>">
                        <?php endif; ?>
                            <?php echo e($breadcrumb['name']); ?>

                        <?php if(last(session()->get('breadcrumb')) != $breadcrumb): ?>
                            </a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        </div>
    </div>
</div>     <?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/includes/breadcrumb.blade.php ENDPATH**/ ?>