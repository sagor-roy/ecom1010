<div id="sideNavs" class="sideBar_wrapper sideBar_close">
    <!-- sideBar close -->
    <button id="sideBarClose" type="button" class="sideBar_close_btn float-right">x</button>
    <!-- sideBar nav-->
    <nav class="sideBar_nav">
        <!-- sideBar logo -->
        <a class="logo d-block text-center" href="index.html">HR</a>
        <!-- sideBar content -->
        <ul class="navbar-nav">
            <!-- sideBar item -->
            <li class="nav-item">
                <a class="nav-link {{request()->is('admin') ? 'active':''}}" href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-user-circle text-success"></i>
                    <span class="mx-2">Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('admin/home-setting') ? 'active':''}}" href="{{route('admin.home-setting')}}"><i class="fa fa-fw fa-user-circle text-success"></i>
                    <span class="mx-2">Home Setting</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('admin/category') ? 'active':''}}" href="{{route('admin.category')}}"><i class="fa fa-fw fa-user-circle text-success"></i>
                    <span class="mx-2">Category</span></a>
            </li>
        </ul>
    </nav>
</div>