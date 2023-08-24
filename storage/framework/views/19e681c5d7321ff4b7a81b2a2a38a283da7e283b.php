<?php
    $breadcrumbs = session()->get('breadcrumb');
?>

<h3 class="page-title"><?php echo e(session('page_title')); ?></h3>
<ul class="breadcrumb">
    <?php if(!empty($breadcrumbs)): ?>
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key === array_search(end($breadcrumbs), $breadcrumbs)): ?>
                <li class="breadcrumb-item active">
                    <?php echo e($key); ?>

                </li>
            <?php else: ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e($value); ?>"><i class="fa fa-dashboard"></i>
                        <?php echo e($key); ?>

                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/breadcrumb-v2.blade.php ENDPATH**/ ?>