<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">
                    @lang('dashboard.dashboard')
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu"> @lang('dashboard.dashboard') <span class="label label-rouded label-primary pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">
                           @lang('dashboard.sidebar.ecommerce')
                        </a></li>
                        <li><a href="#">
                            @lang('dashboard.sidebar.analytics')
                        </a></li>
                    </ul>
                </li>

                <li class="nav-label"> @lang('dashboard/sidebar.nav-label-users') </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">
                    @lang('dashboard/sidebar.nav-label-users')
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="#">
                                @lang('dashboard/sidebar.all-users')
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                @lang('dashboard/sidebar.users-add')
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-label"> @lang('dashboard.sidebar.apps') </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">
                    @lang('dashboard.sidebar.email')
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.compose')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.read')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.inbox')</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
