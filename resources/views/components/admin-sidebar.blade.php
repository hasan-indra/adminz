<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminZ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fa fa-user-circle fa-2x"></i>
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}"
                       class="nav-link @if(request()->segment(2) === 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @foreach($sidebarMenus as $slug => $menu)
                    @if(count($menu['children']) === 0)
                        <li class="nav-item">
                            <a href="{{ route($slug) }}"
                               class="nav-link @if(request()->segment(2) === $slug) active @endif">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p> {{ $menu['title'] }} </p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item @if($menu['children_names']->contains(request()->segment(2))) menu-is-opening menu-open @endif">
                            <a href="#"
                               class="nav-link @if($menu['children_names']->contains(request()->segment(2))) active @endif">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>
                                    {{ $menu['title'] }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($menu['children'] as $keyChild => $valueChild)
                                    <li class="nav-item">
                                        <a href="{{ route($keyChild) }}"
                                           class="nav-link @if(request()->segment(2) === $keyChild) active @endif">
                                            <i class=" nav-icon {{ $valueChild['icon'] }}"></i>
                                            <p> {{ $valueChild['title'] }} </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
