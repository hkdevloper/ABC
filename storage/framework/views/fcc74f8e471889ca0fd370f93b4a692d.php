<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([ 
    'label' => '',
//    'color' => 'blue',
    'class' => '',
    'can_close' => false,
    'canClose' => false,
//    'rounded' => false,
    'outline' => false,
    'add_clearing' => true,
    'addClearing' => true,
    'shade' => 'faint',
    'color_weight' => [
        'faint' => 200,
        'dark' => 500,
    ],
    'text_color_weight' => [
        'faint' => 500,
        'dark' => 50,
    ],
    'onclick' => '',
    'id' => uniqid(),
    'add_id_prefix' => true,
    'addIdPrefix' => true,
    'value' => null,
//    'name' => null,
    'selectable' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([ 
    'label' => '',
//    'color' => 'blue',
    'class' => '',
    'can_close' => false,
    'canClose' => false,
//    'rounded' => false,
    'outline' => false,
    'add_clearing' => true,
    'addClearing' => true,
    'shade' => 'faint',
    'color_weight' => [
        'faint' => 200,
        'dark' => 500,
    ],
    'text_color_weight' => [
        'faint' => 500,
        'dark' => 50,
    ],
    'onclick' => '',
    'id' => uniqid(),
    'add_id_prefix' => true,
    'addIdPrefix' => true,
    'value' => null,
//    'name' => null,
    'selectable' => false,
]); ?>
<?php foreach (array_filter(([ 
    'label' => '',
//    'color' => 'blue',
    'class' => '',
    'can_close' => false,
    'canClose' => false,
//    'rounded' => false,
    'outline' => false,
    'add_clearing' => true,
    'addClearing' => true,
    'shade' => 'faint',
    'color_weight' => [
        'faint' => 200,
        'dark' => 500,
    ],
    'text_color_weight' => [
        'faint' => 500,
        'dark' => 50,
    ],
    'onclick' => '',
    'id' => uniqid(),
    'add_id_prefix' => true,
    'addIdPrefix' => true,
    'value' => null,
//    'name' => null,
    'selectable' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php foreach (([
    'color' => 'blue',
    'rounded' => false,
    'max' => null,
    'name' => null,
    'required' => false,
]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php 
    // reset variables for Laravel 8 support
    $can_close = filter_var($can_close, FILTER_VALIDATE_BOOLEAN);
    $canClose = filter_var($canClose, FILTER_VALIDATE_BOOLEAN);
    $add_id_prefix = filter_var($add_id_prefix, FILTER_VALIDATE_BOOLEAN);
    $addIdPrefix = filter_var($addIdPrefix, FILTER_VALIDATE_BOOLEAN);
    $rounded = filter_var($rounded, FILTER_VALIDATE_BOOLEAN);
    $add_clearing = filter_var($add_clearing, FILTER_VALIDATE_BOOLEAN);
    $addClearing = filter_var($addClearing, FILTER_VALIDATE_BOOLEAN);
    $outline = filter_var($outline, FILTER_VALIDATE_BOOLEAN);
    if ($canClose) $can_close = $canClose;
    if (!$addIdPrefix) $add_id_prefix = $addIdPrefix;

    $rounded_class = ($rounded) ? 'rounded-full' : 'rounded-md';
    $clearing_css = ($add_clearing) ? 'mb-3' : '';
    $bg_border_color_css = ($outline) ? "border border-$color-$color_weight[$shade] text-$color-500" : "bg-$color-$color_weight[$shade] text-$color-$text_color_weight[$shade]";
    $text_color_css = ($outline) ? "text-$color-500" : "text-$color-$text_color_weight[$shade]";

    if( (!empty($name) && !empty($value)) ) {
        $can_close = false;
        $bg_border_color_css = "bg-$color-200 hover:bg-$color-500 cursor-pointer selectable bw-$name-$value";
        $text_color_css = "text-$color-500 hover:text-$color-50";
        $selectable = true;
    }
?>

<label id="<?php if($add_id_prefix): ?>bw-<?php endif; ?><?php echo e($id); ?>" <?php if($selectable): ?> onclick="selectTag('<?php echo e($value); ?>','<?php echo e($name); ?>')"  <?php endif; ?>
       class="relative text-[10px] uppercase px-[12px] leading-8 tracking-widest whitespace-nowrap inline-block <?php echo e($rounded_class); ?> <?php echo e($clearing_css); ?> <?php echo e($bg_border_color_css); ?> <?php echo e($text_color_css); ?> <?php echo e($class); ?>">
    <?php echo e($label); ?>

    <?php if($can_close): ?>
    <a href="javascript:void(0)" onclick="<?php if($onclick==''): ?>this.parentElement.remove()<?php else: ?><?php echo $onclick; ?><?php endif; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="-mt-0.5 -mr-1 h-5 w-5 p-1 opacity-70 hover:opacity-100 inline <?php echo e($text_color_css); ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>
    <?php endif; ?>
</label>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\vendor\mkocansey\bladewind\src/../resources/views/components/tag.blade.php ENDPATH**/ ?>