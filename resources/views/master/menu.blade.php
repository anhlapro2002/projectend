
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="d-flex align-items-center py-2">
        <a href="{{ route('home') }}" class="text-decoration-none">
            <span class="h2 text-uppercase text-primary bg-dark px-1">JOHNLAPTOP</span>
            <span class="h2 text-uppercase text-dark bg-primary px-1 ml-n1">Shop</span>
        </a>
    </div>
    
    <div class="app-brand demo">

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    

    <div class="menu-inner-shadow"></div>
    

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
       
        <li class="menu-item ">
            <a href="{{route('home')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        
        @if(session('admin'))
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">User Maneger</span>
            </li>
            <li class="menu-item ">
                <a href="{{route('employee')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Empoloyees</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="{{route('customer')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div data-i18n="Analytics">Customer</div>
                </a>
            </li>
            @endif

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Product Management</span></li>
            <!-- Cards -->
            <li class="menu-item">
                <a href="{{route('products.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div data-i18n="Basic">Product</div>
                </a>
            </li>
        @if(session('admin'))
            <li class="menu-item">
                <a href="{{route('cat')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-key"></i>
                    <div data-i18n="Basic">Category</div>
                </a>
            </li>
       @endif

        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Tuition payment</span></li>
      
        <li class="menu-item">
            <a href="{{route('invoice')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Invoices</div>
            </a>
        </li>
        <!-- Misc -->
<!-- {{--        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>--}}
{{--        <li class="menu-item">--}}
{{--            <a--}}
{{--                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"--}}
{{--                target="_blank"--}}
{{--                class="menu-link"--}}
{{--            >--}}
{{--                <i class="menu-icon tf-icons bx bx-support"></i>--}}
{{--                <div data-i18n="Support">Support</div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="menu-item">--}}
{{--            <a--}}
{{--                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"--}}
{{--                target="_blank"--}}
{{--                class="menu-link"--}}
{{--            >--}}
{{--                <i class="menu-icon tf-icons bx bx-file"></i>--}}
{{--                <div data-i18n="Documentation">Documentation</div>--}}
            </a>--}}
{{--        </li>--}} -->
    </ul>
</aside>
<!-- / Menu -->

<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->

    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar"
    >
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{asset("assets/img/avatars/img.png")}}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                    
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        @if(session('admin'))
                        @else
                        @endif


                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>

    <!-- / Navbar -->

    <!-- Content wrapper -->
