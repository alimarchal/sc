<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
{{--                    <i class="right fas fa-angle-left"></i>--}}
                </p>
            </a>



        </li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Court Cases
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('courtCaseSecs.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('courtCaseSecs.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('courtCaseAotr.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('courtCaseAotr.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>
            </ul>
        </li>




    </ul>
</nav>
