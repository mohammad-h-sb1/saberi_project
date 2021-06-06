<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                   <a href="{{route('profile.index',auth()->user()->id)}}"><img src="{{auth()->user()->getProfileUrl()}}"  class="img-circle elevation-2" alt="User Image"></a>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class

                        with font-awesome or any other icon font library -->
                    @if(auth()->user()->type==='admin'||auth()->user()->type==='manager')

                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                صفحات شروع
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->type==='admin'||auth()->user()->type==='manager')
                            <li class="nav-item">
                                <a href="{{route('admin.category')}}" class="nav-link @if(request()->is('admin/category/index') || request()->is('admin/category/*')) active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دسته بندی ها</p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route('admin.post')}}" class="nav-link @if(request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پست ها</p>
                                </a>
                            </li>
                                @if(auth()->user()->type==='admin')
                                <li class="nav-item">
                                    <a href="{{route('admin.comment.index')}}" class="nav-link @if(request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>کامنت ها</p>
                                    </a>
                                </li>
                                @endif
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                صفحات کابران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->type==='admin'||auth()->user()->type==='manager')
                                <li class="nav-item">
                                    <a href="{{route('profile.index')}}" class="nav-link @if(request()->is('admin/category/index') || request()->is('admin/category/*')) active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اکانت ها </p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route('profile.create')}}" class="nav-link @if(request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اضافه کردن کاربر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
