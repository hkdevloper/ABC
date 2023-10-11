<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="{{config('app.name')}}" class="w-6" src="{{url('/')}}/dist/images/logo.svg">
        </a>
        <a href="javascript:" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                           class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>

    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{url('/admin')}}" class="side-menu">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        {{-- Content --}}
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="box"></i></div>
                <div class="menu__title"> Content <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                {{--Companies--}}
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
                            <a href="{{route('companies')}}" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.company')}}" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories', ['type' => 'company'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('memberships', ['type'=> 'company'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--Classifieds(Products)--}}
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
                            <a href="{{route('products')}}" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.product')}}" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories', ['type' => 'product'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('memberships', ['type'=> 'product'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--Event--}}
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="calendar"></i></div>
                        <div class="menu__title"> Events
                            <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('events')}}" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.event')}}" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories', ['type' => 'event'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('memberships', ['type'=> 'event'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--Blogs--}}
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
                            <a href="{{route('blogs')}}" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.blog')}}" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories', ['type' => 'blogs'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('memberships', ['type'=> 'blog'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--Deals--}}
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
                            <a href="{{route('deals')}}" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.deal')}}" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories', ['type' => 'deals'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('memberships', ['type'=> 'deals'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Jobs --}}
                <li>
                    <a href="javascript:" class="menu">
                        <div class="menu__icon"><i data-feather="briefcase"></i></div>
                        <div class="menu__title"> Jobs <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('jobs')}}" class="menu">
                                <div class="menu__icon"><i data-feather="hash"></i></div>
                                <div class="menu__title"> View All</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.job')}}" class="menu">
                                <div class="menu__icon"><i data-feather="plus"></i></div>
                                <div class="menu__title"> Add New</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories', ['type' => 'job'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="archive"></i></div>
                                <div class="menu__title"> Categories</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('memberships', ['type'=> 'job'])}}" class="menu">
                                <div class="menu__icon"><i data-feather="package"></i></div>
                                <div class="menu__title"> Membership</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('invoices')}}" class="menu">
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
        {{-- Users --}}
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="users"></i></div>
                <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('users')}}" class="menu">
                        <div class="menu__icon"><i data-feather="user"></i></div>
                        <div class="menu__title"> users</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('add.user')}}" class="menu">
                        <div class="menu__icon"><i data-feather="user-plus"></i></div>
                        <div class="menu__title"> Add user</div>
                    </a>
                </li>
                {{--                <li>--}}
                {{--                    <a href="{{route('user.groups')}}" class="menu">--}}
                {{--                        <div class="menu__icon"><i data-feather="users"></i></div>--}}
                {{--                        <div class="menu__title"> Groups</div>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li>--}}
                {{--                    <a href="{{url('/')}}" class="menu">--}}
                {{--                        <div class="menu__icon"><i data-feather="user-check"></i></div>--}}
                {{--                        <div class="menu__title"> Approve</div>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li>--}}
                {{--                    <a href="{{url('/')}}" class="menu">--}}
                {{--                        <div class="menu__icon"><i data-feather="file-text"></i></div>--}}
                {{--                        <div class="menu__title"> User Form Fields</div>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>
        </li>
        <li>
            <a href="{{route('media')}}" class="menu">
                <div class="menu__icon"><i data-feather="inbox"></i></div>
                <div class="menu__title"> Media</div>
            </a>
        </li>
        <li>
            <a href="{{route('locations')}}" class="menu">
                <div class="menu__icon"><i data-feather="map-pin"></i></div>
                <div class="menu__title"> Locations</div>
            </a>
        </li>

        {{-- Settings --}}
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="tool"></i></div>
                <div class="menu__title"> Settings <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('settings')}}" class="menu">
                        <div class="menu__icon"><i data-feather="settings"></i></div>
                        <div class="menu__title"> General</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.payment.gateways')}}" class="menu">
                        <div class="menu__icon"><i data-feather="credit-card"></i></div>
                        <div class="menu__title"> Payment gateways</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.discounts')}}" class="menu">
                        <div class="menu__icon"><i data-feather="tag"></i></div>
                        <div class="menu__title"> Discounts</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.tax.rates')}}" class="menu">
                        <div class="menu__icon"><i data-feather="dollar-sign"></i></div>
                        <div class="menu__title"> Tax rates</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.rating.categories')}}" class="menu">
                        <div class="menu__icon"><i data-feather="star"></i></div>
                        <div class="menu__title"> Rating categories</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="alert-triangle"></i></div>
                        <div class="menu__title"> Broken Website Links</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="x-octagon"></i></div>
                        <div class="menu__title"> Invalid backlinks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.logout')}}" class="menu">
                <div class="menu__icon"><i data-feather="lock"></i></div>
                <div class="menu__title"> Logout</div>
            </a>
        </li>
    </ul>

</div>
