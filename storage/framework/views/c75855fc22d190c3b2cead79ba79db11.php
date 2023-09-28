<div class="col-span-11 sm:col-span-6 xl:col-span-3 intro-y">
    <div class="report-box zoom-in">
        <div class="box p-5">
            <div class="flex">
                <i data-feather="<?php echo e($icon); ?>" class="report-box__icon text-theme-10"></i>
                <div class="ml-auto">
                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="<?php echo e($title); ?>">
                        <?php echo e($percentage); ?>% <i data-feather="<?php echo e($status); ?>" class='w-4 h-4'></i></div>
                </div>
            </div>
            <div class="text-3xl font-bold leading-8 mt-6">$ <?php echo e($value); ?></div>
            <div class="text-base text-gray-600 mt-1"><?php echo e($name); ?></div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/components/dashboard/general-report-card.blade.php ENDPATH**/ ?>