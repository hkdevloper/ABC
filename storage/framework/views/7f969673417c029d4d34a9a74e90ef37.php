<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo e(config()->get('app.name')); ?></title>
    
    <link rel="stylesheet" href="<?php echo e(asset("dist/css/app.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("dist/css/box-icons.css")); ?>">
    <script src="https://kit.fontawesome.com/cabb64bd6b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js" defer crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/IconPicker.css')); ?>">
    <script src="<?php echo e(asset('dist/js/IconPicker.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="app">
<?php echo $__env->make('components.mobile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="flex">
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content">
        <div class="content">
            <?php echo $__env->make('components.top-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>

<?php echo $__env->make('components.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('dist/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('src/js/feather.js')); ?>"></script>
<script>
    feather.replace()
    <?php if(session()->has('msg')): ?>
        showToast('<?php echo e(session()->get('types', 'info')); ?>', '<?php echo e(session()->get('msg')); ?>');
    <?php else: ?>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            showToast('error', '<?php echo e($error); ?>');
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endif; ?>
</script>
<script>
    try{
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        // Default options
        IconPicker.Init({
            // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
            jsonUrl: '<?php echo e(asset('dist/json/iconpicker.json')); ?>',
            // Optional: Change the buttons or search placeholder text according to the language.
            searchPlaceholder: 'Search Icon',
            showAllButton: 'Show All',
            cancelButton: 'Cancel',
            noResultsFound: 'No results found.', // v1.5.0 and the next versions
            borderRadius: '20px', // v1.5.0 and the next versions
        });

        // Select your Button element (ID or Class)
        IconPicker.Run('#GetIconPicker');
    }catch (e){
        console.log(e);
    }
</script>
<?php echo $__env->yieldContent('page-scripts'); ?>
<?php echo $__env->yieldContent('components-scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/layouts/main-admin.blade.php ENDPATH**/ ?>