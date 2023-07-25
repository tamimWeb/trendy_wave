<div class="leftbar">
    <div class="sidebar">
        <div class="logobar">
            <a href="{{ route('dashboard') }}" class="logo logo-large"><img
                    src="{{ asset('backend') }}/images/theme/hsblco_logo.png" class="img-fluid" alt="logo"></a>
            <a href="{{ route('dashboard') }}" class="logo logo-small"><img
                    src="{{ asset('backend') }}/images/theme/hsblco_small_logo.png" class="img-fluid"
                    alt="logo"></a>
        </div>
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('backend') }}/images/svg-icon/dashboard.svg" class="img-fluid"
                            alt="dashboard">
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('backend') }}/images/svg-icon/basic.svg" class="img-fluid"
                            alt="basic"><span>Inventory</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('brands.index') }}">Brands</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('sub-categories.index') }}">Sub Categories</a></li>
                        <li><a href="{{ route('units.index') }}">Unit</a></li>
                        <li><a href="{{ route('colors.index') }}">Color</a></li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Products</span>
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('products.create') }}">Create Product</a></li>
                                <li><a href="{{ route('products.index') }}">All Product</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('backend') }}/images/svg-icon/basic.svg" class="img-fluid"
                            alt="basic"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('payment-methods.index') }}">Payment Methods</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
