<div class="flex justify-between items-center py-2 bg-purple-600">
    <div class="container lg:px-24 md:px-12 mx-auto flex items-center justify-between">
        <h1 class="text-white text-4xl uppercase ml-2"><?php echo e($title); ?></h1>
        <?php if (isset($component)) { $__componentOriginala0c1e4f1eafca55c2903fe0dbfb4ec1d = $component; } ?>
<?php $component = App\View\Components\User\BreadCrumb::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.bread-crumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\User\BreadCrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0c1e4f1eafca55c2903fe0dbfb4ec1d)): ?>
<?php $component = $__componentOriginala0c1e4f1eafca55c2903fe0dbfb4ec1d; ?>
<?php unset($__componentOriginala0c1e4f1eafca55c2903fe0dbfb4ec1d); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/components//user/header.blade.php ENDPATH**/ ?>