<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    // determines which icon to display. Name must match the exact name defined on 
    // https://heroicons.com
    'name' => '',
    // available values are solid and outline. Determines the weight of the icon
    'type' => 'outline',
    // css classes to append to the svg file
    'class' => '',
    // specify directory to load icons from
    'dir' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    // determines which icon to display. Name must match the exact name defined on 
    // https://heroicons.com
    'name' => '',
    // available values are solid and outline. Determines the weight of the icon
    'type' => 'outline',
    // css classes to append to the svg file
    'class' => '',
    // specify directory to load icons from
    'dir' => ''
]); ?>
<?php foreach (array_filter(([
    // determines which icon to display. Name must match the exact name defined on 
    // https://heroicons.com
    'name' => '',
    // available values are solid and outline. Determines the weight of the icon
    'type' => 'outline',
    // css classes to append to the svg file
    'class' => '',
    // specify directory to load icons from
    'dir' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php 
    $path = 'vendor/bladewind/icons';
    $icons_dir = ($dir !== '') ? $dir : ((! in_array($type, [ 'outline', 'solid' ])) ? "{$path}/outline" : "$path/$type"); 
    $svg_file = file_exists(realpath("$icons_dir/$name.svg")) ? realpath("$icons_dir/$name.svg") : null;
?>
<?php if(!empty($name)): ?>
    <?php if(substr($name, 0,4) === '<svg'): ?> 
        <?php echo $name; ?>

    <?php elseif($svg_file): ?>
        <?php echo str_replace('<svg', '<svg class="h-6 w-6 inline-block dark:text-dark-500 '.$class.'"', file_get_contents($svg_file)); ?>

    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\vendor\mkocansey\bladewind\src/../resources/views/components/icon.blade.php ENDPATH**/ ?>