<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item {{ Request::segment(2) === null ? 'active' : null }}">
                <a href="{{ ENV('APP_URL') . '/dashboard' }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    Dashboard
                </a>
            </li>

            <li class="menu-item {{ Request::segment(2) === 'partners' ? 'active' : null }}">
                <a href="{{ ENV('APP_URL') . '/dashboard/partners' }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-heart-handshake"></i>
                    My Partners
                </a>
            </li>


            <li
                class="menu-item {{ Request::segment(2) === 'category' ? 'active' : null }} {{ Request::segment(2) === 'category' ? 'active' : null }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-paper-bag"></i>
                    <div>Products</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item {{ Request::segment(2) === 'category' ? 'active' : null }}">
                        <a href="{{ ENV('APP_URL') . '/dashboard/category' }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-category"></i>
                            Category
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
                            <div>Product Data</div>
                        </a>
                    </li>
                </ul>
            </li>

            @foreach ($categories as $category)
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <i class="menu-icon tf-icons ti {{ $category->icon }}"></i>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-report-analytics"></i>
                    Transaction
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div>Settings</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-lock"></i>
                            Permissions
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div>Users</div>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
