<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>



             

                <li class="menu-title" key="t-pages">Pages</li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('product.index')}}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Product</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>