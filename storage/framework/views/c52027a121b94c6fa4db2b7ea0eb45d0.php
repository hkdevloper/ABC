<?php $__env->startSection('head'); ?>
    <style>
        [data-tabs-target] {
            cursor: pointer;
        }

        .active {
            display: block;
        }

        [role="tabpanel"] {
            display: none;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- User Profile Block -->
                        <div class="w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <section class="flex items-center justify-center">
                                <div class="container mx-auto">

                                    <!-- User Profile Card -->
                                    <div class="card bg-light-purple p-4 mb-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h2 class="text-2xl font-semibold">Hardik</h2>
                                                <p class="text-gray-500">DOB: 14/09/2002</p>
                                                <p class="text-gray-500">Location: Jam Kalyanpur, Gujarat</p>
                                                <p class="text-gray-500">Email: hardik@example.com</p>
                                            </div>
                                            <div class="rounded-b-full h-[160px] w-[160px] overflow-hidden mr-4">
                                                <img src="https://via.placeholder.com/500x500" alt="User Profile Image"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Tabs navigation-->
                                    <ul
                                        class="mb-4 flex list-none flex-row flex-wrap border-b-0 pl-0"
                                        id="tabs-tab3"
                                        role="tablist"
                                        data-te-nav-ref>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-home3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-home-tab3"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-home3"
                                                data-te-nav-active
                                                role="tab"
                                                aria-controls="tabs-home3"
                                                aria-selected="true"
                                            >Home</a
                                            >
                                        </li>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-profile3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-profile-tab3"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-profile3"
                                                role="tab"
                                                aria-controls="tabs-profile3"
                                                aria-selected="false"
                                            >Profile</a
                                            >
                                        </li>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-messages3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-messages-tab3"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-messages3"
                                                role="tab"
                                                aria-controls="tabs-messages3"
                                                aria-selected="false"
                                            >Messages</a
                                            >
                                        </li>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-settings"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-messages-tab4"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-settings"
                                                role="tab"
                                                aria-controls="tabs-settings"
                                                aria-selected="false"
                                            >Settings</a
                                            >
                                        </li>
                                    </ul>

                                    <!--Tabs content-->
                                    <div>
                                        
                                        <div
                                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:flex justify-between"
                                            id="tabs-home3"
                                            role="tabpanel"
                                            data-te-tab-active
                                            aria-labelledby="tabs-home-tab3">
                                            <div class="w-1/5">
                                                <!--Tabs navigation-->
                                                <ul
                                                    class="mr-4 flex list-none flex-col flex-wrap pl-0"
                                                    role="tablist"
                                                    data-te-nav-ref>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-company03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-company03"
                                                            data-te-nav-active
                                                            role="tab"
                                                            aria-controls="tabs-company03"
                                                            aria-selected="true"
                                                        >Company</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-product03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-product03"
                                                            role="tab"
                                                            aria-controls="tabs-product03"
                                                            aria-selected="false"
                                                        >Products</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-jobs03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-jobs03"
                                                            role="tab"
                                                            aria-controls="tabs-jobs03"
                                                            aria-selected="false"
                                                        >Jobs</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-event03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-event03"
                                                            role="tab"
                                                            aria-controls="tabs-event03"
                                                            aria-selected="false"
                                                        >Events</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-blog03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-blog03"
                                                            role="tab"
                                                            aria-controls="tabs-blog03"
                                                            aria-selected="false"
                                                        >Blogs</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-deal03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-deal03"
                                                            role="tab"
                                                            aria-controls="tabs-deal03"
                                                            aria-selected="false"
                                                        >Deals</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>

                                            <!--Tabs content-->
                                            <div class="my-2 w-4/5">
                                                
                                                <div
                                                    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-company03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-company-tab03"
                                                    data-te-tab-active>
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

                                                        <?php for($i=1; $i<4;$i++): ?>
                                                            <div class="m-2 card p-4">
                                                                <!-- Logo and Details Div -->
                                                                <div class="flex items-start justify-between">
                                                                    <div class="flex items-center">
                                                                        <!-- Logo -->
                                                                        <img src="https://via.placeholder.com/100x100" alt="" width="50"
                                                                             height="50" class="mr-5 inline-block">

                                                                        <!-- Details -->
                                                                        <div class="inline-block">
                                                                            <h2 class="text-green-600 text-sm mb-1">
                                                                                Featured</h2>
                                                                            <h2 class="text-gray-900 text-base title-font font-medium mb-1"><?php echo e(generateRandomCompanyName()); ?>

                                                                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.icon','data' => ['name' => 'check-badge','type' => 'solid','class' => 'text-green-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','type' => 'solid','class' => 'text-green-400']); ?>
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
                                                
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-product03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-product-tab03">
                                                    <!-- Product List -->
                                                    <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                                        <!-- Product list Item -->
                                                        <?php
                                                            function generateRandomProductTitle() {
                                                                $adjectives = ["Premium", "Deluxe", "Elegant", "Quality", "Modern", "Unique", "Luxurious", "Stylish", "Sleek", "Innovative"];
                                                                $nouns = ["Widget", "Gadget", "Device", "Tool", "Accessory", "Item", "Product", "Apparatus", "Contraption", "Instrument"];

                                                                $randomAdjective = $adjectives[array_rand($adjectives)];
                                                                $randomNoun = $nouns[array_rand($nouns)];

                                                                return $randomAdjective . " " . $randomNoun;
                                                            }
                                                        ?>
                                                        <?php for($i=1; $i<10;$i++): ?>
                                                            <div class="m-2 card">
                                                                <!-- Logo and Details Div -->
                                                                <div class="flex items-center justify-between pr-1 w-full">
                                                                    <img src="https://via.placeholder.com/300x300" alt="Product Image"
                                                                         class="w-[150px] h-[150px] object-cover rounded-l-lg mr-3">
                                                                    <div class="flex items-center">
                                                                        <div class="block">
                                                                            <h2 class="text-gray-900 text-base font-semibold mb-1"><?php echo e(generateRandomProductTitle()); ?></h2>
                                                                            <p class="text-gray-600 text-xs">Lorem ipsum dolor sit amet
                                                                                consectetur adipisicing elit. Hic deleniti dolorem dolorum
                                                                                debitis quaerat.
                                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                            <div class="flex items-center mt-2 flex-wrap">
                                                                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.tag','data' => ['label' => 'hkdevs','color' => 'purple','class' => 'mx-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'hkdevs','color' => 'purple','class' => 'mx-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.tag','data' => ['label' => 'codecanyon','color' => 'purple','class' => 'mx-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'codecanyon','color' => 'purple','class' => 'mx-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.tag','data' => ['label' => 'theme','color' => 'purple','class' => 'mx-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bladewind::tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'theme','color' => 'purple','class' => 'mx-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <a href="<?php echo e(route('view.product', [generateRandomProductTitle()])); ?>"
                                                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-[100px]"
                                                                       style="border: 1px solid;">View <i
                                                                            class="fa-solid fa-arrow-up-right-from-square"></i>
                                                                    </a>
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
                                                
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-jobs03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-job-tab03">
                                                    <!-- Job List -->
                                                    <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                                        <!-- Job list Item -->
                                                        <?php for($i=1; $i<10;$i++): ?>
                                                            <div class="m-2 card desktop-homepage-events-wdgt dark:bg-neutral-700 w-full">
                                                                <!-- Logo and Details Div -->
                                                                <div class="flex items-center justify-between pr-2">
                                                                    <div class="flex flex-wrap">
                                                                        <img src="https://via.placeholder.com/150x150" alt="Job Thumbnail"
                                                                             class="w-[150px] h-[120px] object-cover rounded-l-lg mr-3">
                                                                        <div class="block">
                                                                            <h2 class="text-gray-900 text-lg font-semibold mb-1"><?php echo e(generateRandomProductTitle()); ?></h2>
                                                                            <p class="text-gray-400">Jamnagar, Gujarat 361320</p>
                                                                            <p class="text-purple-600">Full Stack Developer</p>
                                                                            <p class="text-gray-400">Posted 2 days ago</p>
                                                                        </div>
                                                                    </div>

                                                                    <a href="<?php echo e(route('view.job', ['fullstack'])); ?>"
                                                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                                       style="border: 1px solid;">
                                                                        View Details
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php endfor; ?>
                                                        <!-- Pagination -->
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
                                                
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-event03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-event-tab03">
                                                    <!-- Event List -->
                                                    <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                                        <!-- Event list Grid -->
                                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                                                            <!-- Event Items-->
                                                            <?php
                                                                function generateRandomEventTitle(): string {
                                                                    $eventTypes = ["Conference", "Seminar", "Workshop", "Webinar", "Exhibition", "Symposium", "Panel Discussion", "Networking Event", "Hackathon", "Meetup"];
                                                                    $topics = ["Technology", "Business", "Science", "Art", "Health", "Education", "Environment", "Finance", "Sports", "Music"];

                                                                    $randomEventType = $eventTypes[array_rand($eventTypes)];
                                                                    $randomTopic = $topics[array_rand($topics)];

                                                                    return $randomEventType . " on " . $randomTopic;
                                                                }
                                                            ?>

                                                            <?php for($i=1; $i<10;$i++): ?>
                                                                <div class="card desktop-homepage-events-wdgt overflow-hidden">
                                                                    <img class="w-full h-40 object-cover"
                                                                         src="https://via.placeholder.com/300x300"
                                                                         alt="Event Thumbnail">
                                                                    <div class="card-body">
                                                                        <div class="organizer-container flex items-start">
                                                                            <div class="organizer-logo-container">
                                                                                <img alt="company logo" class="logo-img"
                                                                                     height="100" width="100"
                                                                                     src="https://via.placeholder.com/100x100">
                                                                            </div>
                                                                            <div class="organizer-description-container ml-3">
                                                                                <p class="feature-card-heading"><?php echo e(generateRandomEventTitle()); ?></p>
                                                                                <p class="feature-card-organizer"><?php echo e(generateRandomEventTitle()); ?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="chips-container mt-2">
                                                                            <div class="chip">
                                                                                <p class="chip-label"><?php echo e(generateRandomEventTitle()); ?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="feature-card-stats-container mt-2 flex items-center">
                                                                            <div class="feature-card-date-container flex items-center">
                                                                                <img alt="User icon" class="naukicon-calendar"
                                                                                     height="16" width="16"
                                                                                     src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg">
                                                                                <?php
                                                                                    $randomTimestamp = rand(strtotime('2023-01-01 00:00:00'), strtotime('2023-12-31 23:59:59'));
                                                                                    $randomDate = date('d M, g:i A', $randomTimestamp);
                                                                                ?>
                                                                                <p class="feature-card-date-label ml-1"><?php echo e($randomDate); ?></p>
                                                                            </div>
                                                                            <div class="registered-user-container ml-4 flex items-center">
                                                                                <img alt="User icon" class="naukicon-user"
                                                                                     height="16" width="16"
                                                                                     src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg">
                                                                                <p class="registered-count-label ml-1"><?php echo e(rand(1,99) / 10); ?>K
                                                                                    Enrolled</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="footer-separator"></div>
                                                                        <div
                                                                            class="semi-circle-container flex items-center justify-between">
                                                                            <div class="left semi-circle"></div>
                                                                            <div class="right semi-circle"></div>
                                                                        </div>
                                                                        <div
                                                                            class="card-footer-container flex items-center justify-between">
                                                                            <div class="feature-card-type-tag-container">
                                                                                <p class="feature-card-type-label">RS. <?php echo e(rand(99,999)); ?></p>
                                                                            </div>
                                                                            <div class="cta-container">
                                                                                <a href="<?php echo e(route('view.event', [generateRandomEventTitle()])); ?>"
                                                                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                                                   style="border: 1px solid;">View Details
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endfor; ?>
                                                        </div>
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
                                                
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-blog03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-blog-tab03">
                                                    <!-- Blog List -->
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                                                        <!-- Blog list Item -->
                                                        <?php for($i=1; $i<10; $i++): ?>
                                                            <div class="bg-white card overflow-hidden w-full mb-4">
                                                                <div class="relative">
                                                                    <img class="w-full h-60 object-cover"
                                                                         src="https://via.placeholder.com/300x300" alt="Blog Thumbnail">
                                                                </div>
                                                                <div class="px-4 py-3">
                                                                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Blog Post Title</h2>
                                                                    <p class="text-gray-700 text-sm mb-4">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                                                        Sed euismod sapien a libero
                                                                        tincidunt, nec bibendum arcu convallis.
                                                                    </p>
                                                                    <div class="flex flex-wrap mb-4">
                                                <span
                                                    class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Tech</span>
                                                                        <span
                                                                            class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Coding</span>
                                                                    </div>
                                                                    <div class="flex justify-between items-center">
                                                                        <div class="flex space-x-4">
                                                                            <button
                                                                                class="border border-purple-200 p-1 rounded-full hover:bg-purple-500 text-purple-500 hover:text-white transition duration-300 ease-in-out text-xs">
                                                                                <i class="fas fa-thumbs-up"></i> Like
                                                                            </button>
                                                                            <button
                                                                                class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out text-xs">
                                                                                <i class="fas fa-share"></i> Share
                                                                            </button>
                                                                        </div>
                                                                        <a href="<?php echo e(route('view.blog', ['something'])); ?>"
                                                                           class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-1 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                                           style="border: 1px solid;">
                                                                            Read More
                                                                        </a>
                                                                    </div>
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
                                                
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-deal03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-deal-tab03">
                                                    Deals
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
                                            </div>
                                        </div>
                                        
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-profile3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab3">
                                            User Profile Tab
                                        </div>
                                        
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-messages3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab3">
                                            <div id="datatable"></div>
                                        </div>
                                        
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-settings"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab4">
                                            <div class="relative mb-4 flex flex-wrap items-stretch">
  <span
      class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
      id="basic-addon1"
  >@</span
  >
                                                <input
                                                    type="text"
                                                    class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                                    placeholder="Username"
                                                    aria-label="Username"
                                                    aria-describedby="basic-addon1"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-user-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/pages/user/auth/dashboard.blade.php ENDPATH**/ ?>