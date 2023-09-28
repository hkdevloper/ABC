<?php $__env->startSection("content"); ?>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    General Report
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Revenue','icon' => 'dollar-sign','value' => '4.510','name' => 'Total Revenue','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Users','icon' => 'user','value' => '4.510','name' => 'Total Users','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Locations','icon' => 'map','value' => '4.510','name' => 'Locations','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Listings','icon' => 'list','value' => '4.510','name' => 'Listings','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Events','icon' => 'radio','value' => '4.510','name' => 'Events','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Classifieds','icon' => 'box','value' => '4.510','name' => 'Cllasifieds','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Properties','icon' => 'home','value' => '4.510','name' => 'Properties','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Jobs','icon' => 'briefcase','value' => '4.510','name' => 'Jobs','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Deals','icon' => 'framer','value' => '4.510','name' => 'Deals','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9225d2335e86530ac57a0bffedaa72f7 = $component; } ?>
<?php $component = App\View\Components\Dashboard\GeneralReportCard::resolve(['title' => 'Total Articles','icon' => 'book','value' => '4.510','name' => 'Articles','status' => 'bar-chart-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\GeneralReportCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7)): ?>
<?php $component = $__componentOriginal9225d2335e86530ac57a0bffedaa72f7; ?>
<?php unset($__componentOriginal9225d2335e86530ac57a0bffedaa72f7); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-scripts'); ?>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>