<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="<?php echo e(config('app.name')); ?>" class="w-6" src="<?php echo e(url('/')); ?>/dist/images/logo.svg">
        </a>
        <a href="javascript:" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                           class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>

    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="<?php echo e(url('/admin')); ?>" class="side-menu">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="box"></i></div>
                <div class="menu__title"> Content <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="box"></i></div>
                        <div class="menu__title">
                            Companies
                            <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('companies')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.company')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'company'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'company'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="shopping-bag"></i></div>
                        <div class="menu__title">
                            Products
                            <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('products')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.product')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'product'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'product'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="calendar"></i></div>
                        <div class="menu__title"> Events
                            <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('events')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.event')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'event'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'event'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="file-text"></i></div>
                        <div class="menu__title">
                            Blogs
                            <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('blogs')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.blog')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'blogs'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'blog'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="tag"></i></div>
                        <div class="menu__title">
                            Deals
                            <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('deals')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.deal')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'deals'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'deals'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="briefcase"></i></div>
                        <div class="menu__title"> Jobs <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?php echo e(route('jobs')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add.job')); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('categories', ['type' => 'job'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('memberships', ['type'=> 'job'])); ?>" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('invoices')); ?>" class="menu">
                <div class="menu__icon"><i data-feather="file-minus"></i></div>
                <div class="menu__title"> Invoices</div>
            </a>
        </li>
        <li>
            <a href="#" class="menu">
                <div class="menu__icon"><i data-feather="message-square"></i></div>
                <div class="menu__title"> Messages</div>
            </a>
        </li>
        <li>
            <a href="#" class="menu">
                <div class="menu__icon"><i data-feather="alert-octagon"></i></div>
                <div class="menu__title"> Claims</div>
            </a>
        </li>
        
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="users"></i></div>
                <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo e(route('users')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="user"></i></div>
                        <div class="menu__title"> users</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('add.user')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="user-plus"></i></div>
                        <div class="menu__title"> Add user</div>
                    </a>
                </li>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('media')); ?>" class="menu">
                <div class="menu__icon"><i data-feather="inbox"></i></div>
                <div class="menu__title"> Media</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('locations')); ?>" class="menu">
                <div class="menu__icon"><i data-feather="map-pin"></i></div>
                <div class="menu__title"> Locations</div>
            </a>
        </li>

        
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="tool"></i></div>
                <div class="menu__title"> Settings <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo e(route('settings')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="settings"></i></div>
                        <div class="menu__title"> General</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.payment.gateways')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="credit-card"></i></div>
                        <div class="menu__title"> Payment gateways</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.discounts')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="tag"></i></div>
                        <div class="menu__title"> Discounts</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.tax.rates')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="dollar-sign"></i></div>
                        <div class="menu__title"> Tax rates</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('settings.rating.categories')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="star"></i></div>
                        <div class="menu__title"> Rating categories</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="alert-triangle"></i></div>
                        <div class="menu__title"> Broken Website Links</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/')); ?>" class="menu">
                        <div class="menu__icon"><i data-feather="x-octagon"></i></div>
                        <div class="menu__title"> Invalid backlinks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('admin.logout')); ?>" class="menu">
                <div class="menu__icon"><i data-feather="lock"></i></div>
                <div class="menu__title"> Logout</div>
            </a>
        </li>
    </ul>

</div>
<?php /**PATH C:\Users\hacki\OneDrive\Desktop\Business Directory\Admin\resources\views/components/mobile-menu.blade.php ENDPATH**/ ?>