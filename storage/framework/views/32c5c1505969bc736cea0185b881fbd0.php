<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="<?php echo e(config('app.name')); ?>" class="w-6" src="<?php echo e(url('/')); ?>/dist/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> <?php echo e(config('app.name')); ?> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="<?php echo e(url('/admin')); ?>" class="side-menu">
                <div class="side-menu__icon"><i data-feather="home"></i></div>
                <div class="side-menu__title"> Dashboard</div>
            </a>
        </li>
        
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="box"></i></div>
                <div class="side-menu__title"> Content <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                
                <li>
                    <a href="javascript:" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="box"></i></div>
                        <div class="side-menu__title">
                            Companies
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('companies')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="hash"></i></div>
                                <div class="side-menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.company')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="plus"></i></div>
                                <div class="side-menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'company'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="archive"></i></div>
                                <div class="side-menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'company'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="shopping-bag"></i></div>
                        <div class="side-menu__title">
                            Products
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('products')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="hash"></i></div>
                                <div class="side-menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.product')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="plus"></i></div>
                                <div class="side-menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'product'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="archive"></i></div>
                                <div class="side-menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'product'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="calendar"></i></div>
                        <div class="side-menu__title"> Events
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('events')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="hash"></i></div>
                                <div class="side-menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.event')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="plus"></i></div>
                                <div class="side-menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'event'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="archive"></i></div>
                                <div class="side-menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'event'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="file-text"></i></div>
                        <div class="side-menu__title">
                            Blogs
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('blogs')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="hash"></i></div>
                                <div class="side-menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.blog')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="plus"></i></div>
                                <div class="side-menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'blogs'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="archive"></i></div>
                                <div class="side-menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'blog'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="tag"></i></div>
                        <div class="side-menu__title">
                            Deals
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('deals')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="hash"></i></div>
                                <div class="side-menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.deal')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="plus"></i></div>
                                <div class="side-menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'deals'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="archive"></i></div>
                                <div class="side-menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'deals'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="briefcase"></i></div>
                        <div class="side-menu__title"> Jobs <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('jobs')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="hash"></i></div>
                                <div class="side-menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.job')); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="plus"></i></div>
                                <div class="side-menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'job'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="archive"></i></div>
                                <div class="side-menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'job'])); ?>" class="side-menu">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('invoices')); ?>" class="side-menu">
                <div class="side-menu__icon"><i data-feather="file-minus"></i></div>
                <div class="side-menu__title"> Invoices</div>
            </a>
        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"><i data-feather="message-square"></i></div>
                <div class="side-menu__title"> Messages</div>
            </a>
        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"><i data-feather="alert-octagon"></i></div>
                <div class="side-menu__title"> Claims</div>
            </a>
        </li>
        
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="users"></i></div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo e(route('users')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="user"></i></div>
                        <div class="side-menu__title"> users</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('add.user')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="user-plus"></i></div>
                        <div class="side-menu__title"> Add user</div>
                    </a>
                </li>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('media')); ?>" class="side-menu">
                <div class="side-menu__icon"><i data-feather="inbox"></i></div>
                <div class="side-menu__title"> Media</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('locations')); ?>" class="side-menu">
                <div class="side-menu__icon"><i data-feather="map-pin"></i></div>
                <div class="side-menu__title"> Locations</div>
            </a>
        </li>

        
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="tool"></i></div>
                <div class="side-menu__title"> Settings <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo e(route('settings')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="settings"></i></div>
                        <div class="side-menu__title"> General</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.payment.gateways')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="credit-card"></i></div>
                        <div class="side-menu__title"> Payment gateways</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.discounts')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="tag"></i></div>
                        <div class="side-menu__title"> Discounts</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.tax.rates')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="dollar-sign"></i></div>
                        <div class="side-menu__title"> Tax rates</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.rating.categories')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="star"></i></div>
                        <div class="side-menu__title"> Rating categories</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="alert-triangle"></i></div>
                        <div class="side-menu__title"> Broken Website Links</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/')); ?>" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="x-octagon"></i></div>
                        <div class="side-menu__title"> Invalid backlinks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('admin.logout')); ?>" class="side-menu">
                <div class="side-menu__icon"><i data-feather="lock"></i></div>
                <div class="side-menu__title"> Logout</div>
            </a>
        </li>
    </ul>
</nav>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/components/sidebar.blade.php ENDPATH**/ ?>