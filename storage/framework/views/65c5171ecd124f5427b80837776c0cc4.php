<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo e(config()->get('app.name')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo e(asset('user/style/boxicons-2.1.4/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('user/style/output.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('vendor/bladewind/css/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/bladewind/css/bladewind-ui.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('user/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('user/js/tailwind.js')); ?>"></script>
    <script src="<?php echo e(asset('user/js/fw.js')); ?>"></script>

    <?php echo $__env->yieldContent('head'); ?>
    <?php echo BladeUIKit\BladeUIKit::outputStyles(true); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</head>

<body>
<!-- Page Content -->
<main>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('includes.requirements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>
<script src="<?php echo e(asset('user/js/slick-slider.js')); ?>></script>
<script src="<?php echo e(asset('user/js/owl-carousel.js')); ?>></script>
<script src="<?php echo e(asset('vendor/bladewind/js/helpers.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/alpine.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/main.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
    initTE({
        Select,
        Tab,
        Datatable,
    });
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel();
    });
</script>
<script>
    <?php if(session()->has('msg')): ?>
    showToast('<?php echo e(session()->get('type', 'info')); ?>', '<?php echo e(session()->get('msg')); ?>');
    <?php else: ?>
    <?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    showToast('error', '<?php echo e($error); ?>');
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('page-scripts'); ?>
<?php echo $__env->yieldContent('components-scripts'); ?>
<?php echo BladeUIKit\BladeUIKit::outputScripts(true); ?>
</body>
</html>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/layouts/main-user-list.blade.php ENDPATH**/ ?>