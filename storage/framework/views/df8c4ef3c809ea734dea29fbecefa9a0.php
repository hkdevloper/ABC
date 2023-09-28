<?php $__env->startSection('content'); ?>
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <?php if (isset($component)) { $__componentOriginala718393f51bb1a77c69f5c0896d0866a = $component; } ?>
<?php $component = App\View\Components\User\Header::resolve(['title' => 'Forums'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <!-- Forum List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="card card-hovered p-4 mb-2">
                                <div class="container mx-auto">
                                    <ul class="flex justify-center space-x-4">
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-purple-500 hover:border-purple-500 transition duration-300 ease-in-out">Recent
                                                Questions</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-transparent hover:border-purple-500 transition duration-300 ease-in-out">Most
                                                Answered</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-transparent hover:border-purple-500 transition duration-300 ease-in-out">Unanswered</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-transparent hover:border-purple-500 transition duration-300 ease-in-out">Featured</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-2 ">
                                <!-- Forum list Item -->
                                <?php for($i=1; $i<10;$i++): ?>
                                    <div class="bg-white card p-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center">
                                                <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                                                     class="w-10 h-10 rounded-full mr-4">
                                                <div>
                                                    <h2 class="text-base font-semibold text-gray-800">John Doe</h2>
                                                    <p class="text-gray-500 text-sm">Posted on September 22, 2023</p>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="text-gray-600 text-sm">Category: General</span>
                                            </div>
                                        </div>
                                        <h1 class="text-lg font-semibold text-gray-900 mb-4">Was the origin positioning
                                            'box' removed from Xcode 6?</h1>
                                        <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing
                                            elit. Nulla facilisi. Sed euismod sapien a libero tincidunt, nec bibendum
                                            arcu convallis.</p>
                                        <hr class="my-4 border-t-2 border-gray-200">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <span class="text-gray-600 text-sm"><?php echo e(rand(0, 999)); ?> Answers</span>
                                                <span class="ml-4 text-gray-600 text-sm"><?php echo e(rand(0, 999)); ?> Views</span>
                                            </div>
                                            <div>
                                                <button
                                                    onclick="window.location.href = '<?php echo e(route('view.forum', ['xyz'])); ?>'"
                                                    class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded-full focus:outline-none">
                                                    Answer
                                                </button>
                                                <button class="text-purple-500 hover:underline ml-2">
                                                    <i class='bx bx-share-alt'></i>
                                                </button>
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

<?php echo $__env->make('layouts.main-user-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/pages/user/forum/list.blade.php ENDPATH**/ ?>