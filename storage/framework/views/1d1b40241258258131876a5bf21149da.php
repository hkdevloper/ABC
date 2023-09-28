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
                        <!-- Blog List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Blog List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden px-2 mb-3">
                                <div>
                                    <span class="text-sm">Showing Result <strong class="text-purple-600">10</strong> of <strong  class="text-purple-600"><?php echo e(rand(10,99)); ?></strong> Blogs</span>
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
                            <!-- Blog List -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                                <!-- Blog list Item -->
                                <?php for($i=1; $i<10; $i++): ?>
                                    <div class="bg-white card overflow-hidden w-full mb-4">
                                        <div class="relative">
                                            <img class="w-full h-60 object-cover"
                                                 src="https://via.placeholder.com/600x400" alt="Blog Thumbnail">
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
                        <!-- Side Block -->
                        <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-user-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/pages/user/blogs/list.blade.php ENDPATH**/ ?>