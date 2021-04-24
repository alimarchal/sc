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
        @hasrole('admin')
        <li class="nav-header">User Management</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('user.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create New User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All Users</p>
                    </a>
                </li>
            </ul>
        </li>
        @endhasrole


        <li class="nav-header">Main Operations</li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-mobile-alt"></i>
                <p>
                    SNet-SPhone
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('snet-sphone.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('snet-sphone.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-broadcast-tower"></i>
                <p>
                    BTS Tower
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('bts-tower.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bts-tower.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Revenue Target
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('revenue-target.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('revenue-target.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-header">Operations</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-balance-scale"></i>
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


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Franchise Wise Revenue
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('franchiseWiseRevenue.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('franchiseWiseRevenue.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-location-arrow"></i>
                <p>
                    Site State
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('siteState.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('siteState.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-header">Marketing</li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sd-card"></i>
                <p>
                    Sale Progress
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('monthlySaleProgress.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('monthlySaleProgress.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                    Stock Summery
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('monthlyStockSummery.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('monthlyStockSummery.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                    Corporate Customer
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('corporateCustomer.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('corporateCustomer.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sim-card"></i>
                <p>
                    Report Post Paid
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('monthlyReportPostPaid.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('monthlyReportPostPaid.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-header">Customer</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                    Customer
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('customerServiceCenter.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customerServiceCenter.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sim-card"></i>
                <p>
                    New & Duplicate Sims
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('simSale.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('simSale.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                    Consumer Complaints
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('consumerComplaints.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('consumerComplaints.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>

            </ul>
        </li>


    </ul>
</nav>
