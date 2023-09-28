<?php $__env->startSection('content'); ?>
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <?php if (isset($component)) { $__componentOriginala718393f51bb1a77c69f5c0896d0866a = $component; } ?>
<?php $component = App\View\Components\User\Header::resolve(['title' => 'Jobs'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <!-- Job List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Job List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden px-2">
                                <div>
                                    <span class="text-sm">Showing Result <strong class="text-purple-600">10</strong> of <strong
                                            class="text-purple-600"><?php echo e(rand(10,99)); ?></strong> Jobs</span>
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
                                    <label for="price-range">Price Range</label>
                                    <select name="price-range" id="price-range"
                                            class="border border-solid border-gray-300 text-gray-900 text-sm w-auto p-2.5 m-2 focus:outline-none focus:border-0 card    ">
                                        <option value="low-tot-high">Low to High</option>
                                        <option value="high-to-low">High to Low</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Job List -->
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
                        <!-- Side Block -->
                        <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-user-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/pages/user/job/list.blade.php ENDPATH**/ ?>