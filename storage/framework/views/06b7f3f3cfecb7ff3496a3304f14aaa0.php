<?php $__env->startSection('content'); ?>
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <?php if (isset($component)) { $__componentOriginala718393f51bb1a77c69f5c0896d0866a = $component; } ?>
<?php $component = App\View\Components\User\Header::resolve(['title' => 'Blogs'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\User\Header::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala718393f51bb1a77c69f5c0896d0866a)): ?>
<?php $component = $__componentOriginala718393f51bb1a77c69f5c0896d0866a; ?>
<?php unset($__componentOriginala718393f51bb1a77c69f5c0896d0866a); ?>
<?php endif; ?>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Companies List -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                            <!-- Company List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden mx-2 px-2">
                                <div>
                                    <span class="text-sm">Showing Result <strong class="text-purple-600">10</strong> of <strong  class="text-purple-600"><?php echo e(rand(10,99)); ?></strong> Products</span>
                                </div>
                                <div class="flex flex-wrap items-center justify-center">
                                    <label for="sort-by">Sort By</label>
                                    <select id="sort-by"
                                            class="border border-solid border-gray-300 text-gray-900 text-sm w-auto p-2.5 m-2 focus:outline-none focus:border-0 card">
                                        <option selected>Filter All</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>

                                    <a href="<?php echo e(route('company')); ?>"
                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-3 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-100"
                                       style="border: 1px solid;">List your Company </a>
                                </div>
                            </div>
                            <!-- Company List -->
                            <div class="flex flex-col mb-10 lg:items-start items-center">
                                <!-- Company list Item -->
                                <?php
                                    function generateRandomCompanyName() {
                                        $companies = ["Tech Solutions", "Innovative Ventures", "Global Enterprises", "Digital Innovators", "Creative Minds Inc.", "Smart Tech Co.", "Eco-Friendly Solutions", "FutureTech Corp", "Data Wizards", "Infinite Ideas Ltd"];
                                        return $companies[array_rand($companies)];
                                    }

                                    function generateRandomLocation() {
                                        $locations = ["New York", "San Francisco", "London", "Berlin", "Sydney", "Tokyo", "Toronto", "Singapore", "Mumbai", "Dubai"];
                                        return $locations[array_rand($locations)];
                                    }

                                    function generateRandomDescription() {
                                        $loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac libero eu ligula accumsan tempus. Nulla facilisi. Sed nec nisi nec libero bibendum dignissim. Phasellus nec ultricies nunc. Donec vel bibendum mauris. Fusce a erat vel felis bibendum congue.";
                                        $description = substr($loremIpsum, 0, 255); // Limit to 255 characters
                                        return $description;
                                    }
                                ?>

                                <?php for($i=1; $i<10;$i++): ?>
                                    <div class="m-2 card p-4">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center">
                                                <!-- Logo -->
                                                <img src="https://via.placeholder.com/100x100" alt="" width="50"
                                                     height="50" class="mr-5 inline-block">

                                                <!-- Details -->
                                                <div class="inline-block">
                                                    <h2 class="text-green-600 text-sm mb-1 <?php if(rand(0,1)): ?> hidden <?php endif; ?> ">
                                                        Featured</h2>
                                                    <h2 class="text-gray-900 text-base title-font font-medium mb-1"><?php echo e(generateRandomCompanyName()); ?>

                                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.icon','data' => ['name' => 'check-badge','type' => 'solid','class' => 'text-green-400 @if(rand(0,1)) hidden @endif']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','type' => 'solid','class' => 'text-green-400 @if(rand(0,1)) hidden @endif']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                    </h2>
                                                    <div class="flex items-center text-sm">
                                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.icon','data' => ['name' => 'map-pin','type' => 'solid','class' => 'text-green-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'map-pin','type' => 'solid','class' => 'text-green-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                        <span class="mx-1"><?php echo e(generateRandomLocation()); ?></span>
                                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.icon','data' => ['name' => 'star','type' => 'solid','class' => 'text-orange-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','type' => 'solid','class' => 'text-orange-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                        <span class="mx-1"><?php echo e(rand(1,99)/10); ?> Review</span>
                                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.icon','data' => ['name' => 'eye','type' => 'solid','class' => 'text-purple-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'eye','type' => 'solid','class' => 'text-purple-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                        <span class="mx-1"><?php echo e(rand(1,99)/10); ?>K Views</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="<?php echo e(route('view.company', [generateRandomLocation()])); ?>"
                                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-[70px]"
                                               style="border: 1px solid;">View <i
                                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                        </div>

                                        <!-- Description -->
                                        <div class="mt-2 text-xs">
                                            <p><?php echo e(generateRandomDescription()); ?></p>
                                        </div>
                                    </div>
                                <?php endfor; ?>

                            </div>
                            <!-- Pagination -->
                            <?php if (isset($component)) { $__componentOriginal9713b3c0f0505c6f78c60e7ef61c5467 = $component; } ?>
<?php $component = App\View\Components\User\Pagination::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\User\Pagination::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9713b3c0f0505c6f78c60e7ef61c5467)): ?>
<?php $component = $__componentOriginal9713b3c0f0505c6f78c60e7ef61c5467; ?>
<?php unset($__componentOriginal9713b3c0f0505c6f78c60e7ef61c5467); ?>
<?php endif; ?>
                        </div>
                        <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-user-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/pages/user/company/list.blade.php ENDPATH**/ ?>