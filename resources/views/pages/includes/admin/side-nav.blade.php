<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block" align="center">admin</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ __('Booking') }}</p>
                </a>
            </li>


            <li class="nav-header">PAGE MANAGEMENT</li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/page-management') || request()->is('admin/page-management/*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-copy nav-icon"></i>
                    <p>{{ __('Rooms') }}</p>
                </a>
            </li>
            <li class="nav-item  user-panel mb-3">
                <a href="#" class="nav-link {{ request()->is('admin/contact-us-request') || request()->is('admin/contact-us-request/*')? 'active' : '' }}">
                    <i class="nav-icon fas fa-mail-bulk"></i>
                    <p>{{ __('Blogs') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>{{ __('Sign out') }}</p>
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
