<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="{{config('app.name')}}" class="w-6" src="{{url('/')}}/dist/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> {{config('app.name')}} </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{url('/')}}" class="side-menu side-menu--active">
                <div class="side-menu__icon"><i data-feather="home"></i></div>
                <div class="side-menu__title"> Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="box"></i></div>
                <div class="side-menu__title"> Listings <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="hash"></i></div>
                        <div class="side-menu__title"> Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="plus"></i></div>
                        <div class="side-menu__title"> Add Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="file-minus"></i></div>
                        <div class="side-menu__title"> Invoices</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="star"></i></div>
                        <div class="side-menu__title"> Reviews</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="message-square"></i></div>
                        <div class="side-menu__title"> Messages</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="alert-octagon"></i></div>
                        <div class="side-menu__title"> Claims</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="archive"></i></div>
                        <div class="side-menu__title"> Categories</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="package"></i></div>
                        <div class="side-menu__title"> Products</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="table"></i></div>
                        <div class="side-menu__title"> Form Fields</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="file-plus"></i></div>
                        <div class="side-menu__title"> Import Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="file-minus"></i></div>
                        <div class="side-menu__title"> Export Listings</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="alert-triangle"></i></div>
                        <div class="side-menu__title"> Broken Website Links</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="x-octagon"></i></div>
                        <div class="side-menu__title"> Invalid backlinks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="users"></i></div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('users')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="user"></i></div>
                        <div class="side-menu__title"> users</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('add.user')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="user-plus"></i></div>
                        <div class="side-menu__title"> Add user</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.groups')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="users"></i></div>
                        <div class="side-menu__title"> Groups</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="user-check"></i></div>
                        <div class="side-menu__title"> Approve</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="file-text"></i></div>
                        <div class="side-menu__title"> User Form Fields</div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="{{route('media')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="inbox"></i></div>
                <div class="side-menu__title"> Media</div>
            </a>
        </li>
        <li>
            <a href="{{route('locations')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="map-pin"></i></div>
                <div class="side-menu__title"> Locations</div>
            </a>
        </li>
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="mail"></i></div>
                <div class="side-menu__title"> Email <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="mail"></i></div>
                        <div class="side-menu__title"> Email queue</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="send"></i></div>
                        <div class="side-menu__title"> Email Templates</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:" class="side-menu">
                <div class="side-menu__icon"><i data-feather="tool"></i></div>
                <div class="side-menu__title"> Settings <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('settings')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="settings"></i></div>
                        <div class="side-menu__title"> Settings</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.listing.type')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="list"></i></div>
                        <div class="side-menu__title"> Listing type</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.payment.gateways')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="credit-card"></i></div>
                        <div class="side-menu__title"> Payment gateways</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.discounts')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="tag"></i></div>
                        <div class="side-menu__title"> Discounts</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.tax.rates')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="dollar-sign"></i></div>
                        <div class="side-menu__title"> Tax rates</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.language')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="globe"></i></div>
                        <div class="side-menu__title"> Language</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.upload.types')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="cloud"></i></div>
                        <div class="side-menu__title"> Upload types</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.rating.categories')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="star"></i></div>
                        <div class="side-menu__title"> Rating categories</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings.scheduled.tasks')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="activity"></i></div>
                        <div class="side-menu__title"> Scheduled Tasks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.logout')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="lock"></i></div>
                <div class="side-menu__title"> Logout</div>
            </a>
        </li>
    </ul>
</nav>
