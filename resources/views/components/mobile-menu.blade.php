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
            <a href="{{url('/')}}" class="menu menu--active">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="box"></i></div>
                <div class="menu__title"> Listings <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="hash"></i></div>
                        <div class="menu__title"> Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="plus"></i></div>
                        <div class="menu__title"> Add Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="file-minus"></i></div>
                        <div class="menu__title"> Invoices</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="star"></i></div>
                        <div class="menu__title"> Reviews</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="message-square"></i></div>
                        <div class="menu__title"> Messages</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="alert-octagon"></i></div>
                        <div class="menu__title"> Claims</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="archive"></i></div>
                        <div class="menu__title"> Categories</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="package"></i></div>
                        <div class="menu__title"> Products</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="table"></i></div>
                        <div class="menu__title"> Form Fields</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="file-plus"></i></div>
                        <div class="menu__title"> Import Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="file-minus"></i></div>
                        <div class="menu__title"> Export Listings</div>
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
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="users"></i></div>
                <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="user"></i></div>
                        <div class="menu__title"> users</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="user-plus"></i></div>
                        <div class="menu__title"> Add user</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="user-check"></i></div>
                        <div class="menu__title"> Approve</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="file-text"></i></div>
                        <div class="menu__title"> User Form Fields</div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="" class="menu">
                <div class="menu__icon"><i data-feather="inbox"></i></div>
                <div class="menu__title"> Media</div>
            </a>
        </li>
        <li>
            <a href="" class="menu">
                <div class="menu__icon"><i data-feather="map-pin"></i></div>
                <div class="menu__title"> Locations</div>
            </a>
        </li>
        <li>
            <a href="javascript:" class="menu">
                <div class="menu__icon"><i data-feather="mail"></i></div>
                <div class="menu__title"> Email <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="mail"></i></div>
                        <div class="menu__title"> Email queue</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="menu">
                        <div class="menu__icon"><i data-feather="send"></i></div>
                        <div class="menu__title"> Email Templates</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="" class="menu">
                <div class="menu__icon"><i data-feather="settings"></i></div>
                <div class="menu__title"> Settings</div>
            </a>
        </li>
        <li>
            <a href="" class="menu">
                <div class="menu__icon"><i data-feather="lock"></i></div>
                <div class="menu__title"> Logout</div>
            </a>
        </li>
    </ul>
</div>
