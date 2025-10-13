<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<div class="sticky">
    <aside class="app-sidebar sidebar-scroll">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href="{{route('client.home')}}">
                <img src="{{asset('assets/images/logo.png')}}" class="main-logo" alt="logo">
            </a>
            <a class="desktop-logo logo-dark active" href="{{route('client.home')}}">
                <img src="{{asset('assets/images/logoWith.png')}}" class="main-logo" alt="logo">
            </a>

        </div>
        <div class="main-sidemenu">
            <div class="app-sidebar__user">
                <div class="dropdown user-pro-body text-center">
                    <div class="user-pic">
                        <img alt="user-img" class="avatar avatar-xl brround mb-1" src="../assets/images/users/16.jpg">
                    </div>
                    <div class="user-info text-center">
                        <h5 class=" mb-1 font-weight-bold">{{auth()->user()->name}}</h5>
                        <span class="text-muted app-sidebar__user-name text-sm">{{auth()->user()->phone}}</span>
                    </div>
                </div>
            </div>
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            @can('manage-users')
                <ul class="side-menu">
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="side-menu__label">حساب کاربری</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1">
                                <a href="{{route('manager.user.index')}}">حساب کاربری</a>
                            </li>
                            @can('list-users')
                                <li>
                                    <a class="slide-item" href="{{route('manager.user.index')}}">
                                        <span>کاربران</span>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li>
                                    <a class="slide-item" href="{{route('manager.role.index')}}">
                                        <span>دسترسی ها</span>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </li>
                </ul>
            @endcan
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span class="side-menu__label">مقالات</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="{{route('manager.article.index')}}">مقالات</a>
                        </li>
                        @can('article-list')
                        <li>
                            <a class="slide-item" href="{{route('manager.article.index')}}">
                                <span>مقالات</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
            </ul>
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="side-menu__label">محصولات</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">محصولات</a>
                        </li>
                        @can('products-list')
                            <li>
                                <a class="slide-item" href="{{route('manager.product.index')}}">
                                    <span>محصولات</span>
                                </a>
                            </li>
                        @endcan
                        @can('attribute-list')
                            <li>
                                <a class="slide-item" href="{{route('manager.attribute.index')}}">
                                    <span>ویژگی محصولات</span>
                                </a>
                            </li>
                        @endcan
                        @can('attribute-value-list')
                        <li>
                            <a class="slide-item" href="{{route('manager.value.index')}}">
                                <span>مقدار های ویژگی</span>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a class="slide-item" href="{{route('manager.granite.index')}}">
                                <span>گارانتی محصولات</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="slide-item" href="{{route('manager.projects')}}">
                        <span>درخواست های پروژه</span>
                    </a>
                </li>
            </ul>

            <div class="app-sidebar-help">
                <div class="dropdown text-center">
                    <div class="help d-flex">
                        <a href="javascript:void(0)" class="nav-link p-0 help-dropdown" data-bs-toggle="dropdown">
                            <span class="font-weight-bold">پشتیبانی</span> <i class="fa fa-angle-down ms-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-4">
                            <div class="sidebar-dropdown-divider pb-3">
                                <h4 class="font-weight-bold">پشتیبانی</h4>
                                <a class="d-block" href="https://bariz.tech">bariz.tech</a>
                                <a class="d-block" href="mailto:contact@bariz.tech">contact@bariz.tech</a>
                                <a class="d-block" href="tel:+989125918435">09125918435</a>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <a class="nav-link icon p-0" href="javascript:void(0)">
                                <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%"
                                     width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                    <path opacity=".3"
                                          d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path>
                                    <path
                                        d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path>
                                </svg>
                                <span class="pulse "></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </aside>
</div>
