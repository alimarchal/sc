v<nav c0lass="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" d000000ata-accordion="false">
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


        {{-- Clerk AOTR MPR and MZD --}}

        @if((auth()->user()->role == 'AOTR MZD' || auth()->user()->role == 'AOTR MPR') && auth()->user()->designation == 'Clerk')
            <li class="nav-header">Services</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Revenue Target
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ')
                        <li class="nav-item">
                            <a href="{{route('revenue-target.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('revenue-target.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-balance-scale"></i>
                    <p>
                        Court Cases
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ')
                        <li class="nav-item">
                            <a href="{{route('courtCaseSecs.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('courtCaseSecs.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-balance-scale"></i>
                    <p>
                        Outstanding Dues
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ')
                        <li class="nav-item">
                            <a href="{{route('courtCaseAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                        Consumer Complaints
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' )
                        <li class="nav-item">
                            <a href="{{route('consumerComplaints.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('consumerComplaints.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-balance-scale"></i>
                    <p>
                        Court Cases Summery
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('cCaseAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('cCaseAotr.index')}}" class="nav-link">
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
                        Revenue Collection AOTR
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('scoRevenueCollectionAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('scoRevenueCollectionAotr.index')}}" class="nav-link">
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
                        Monthly DSL Rev Aotr
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('monthlyDslRevAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('monthlyDslRevAotr.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Clerk 61 CSB  --}}
        @elseif(auth()->user()->role == 'CSB 61' || auth()->user()->role == 'CSB 64')
            <li class="nav-header">Services</li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        SPhone
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('sphone.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('sphone.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>
                        SNet
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('snet.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('snet.index')}}" class="nav-link">
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
                        SCOM Tower
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('bts-tower.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('bts-tower.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">Reports and Returns</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Monthly Status Report
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('monthly-network-status.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('monthly-network-status.index')}}" class="nav-link">
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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('franchiseWiseRevenue.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('siteState.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            @if(auth()->user()->role == 'CSB 64' || auth()->user()->role == 'Sector HQ')
                                <a href="{{route('monthlySaleProgressMpr.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            @else
                                <a href="{{route('monthlySaleProgress.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            @endif

                        </li>
                    @endif
                    <li class="nav-item">

                        @if(auth()->user()->role == 'CSB 64' || auth()->user()->role == 'Sector HQ')
                            <a href="{{route('monthlySaleProgressMpr.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        @else
                            <a href="{{route('monthlySaleProgress.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        @endif

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


                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            @if(auth()->user()->role == 'CSB 64' || auth()->user()->role == 'Sector HQ')
                                <a href="{{route('monthlyStockSummeryMpr.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            @else
                                <a href="{{route('monthlyStockSummery.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            @endif

                        </li>
                    @endif


                    {{--                    @if(auth()->user()->designation == 'Clerk')--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a href="{{route('monthlyStockSummery.create')}}" class="nav-link">--}}
                    {{--                                <i class="far fa-circle nav-icon"></i>--}}
                    {{--                                <p>Create</p>--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                    @endif--}}
                    <li class="nav-item">


                        @if(auth()->user()->role == 'CSB 64' || auth()->user()->role == 'Sector HQ')
                            <a href="{{route('monthlyStockSummeryMpr.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        @else
                            <a href="{{route('monthlySaleProgress.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        @endif

                        {{--                        --}}
                        {{--                        @if(auth()->user()->role == 'CSB 64')--}}
                        {{--                            <a href="{{route('monthlyStockSummeryMpr.index')}}" class="nav-link">--}}
                        {{--                                <i class="far fa-circle nav-icon"></i>--}}
                        {{--                                <p>Show All</p>--}}
                        {{--                            </a>--}}
                        {{--                        @else--}}
                        {{--                            <a href="{{route('monthlyStockSummery.index')}}" class="nav-link">--}}
                        {{--                                <i class="far fa-circle nav-icon"></i>--}}
                        {{--                                <p>Show All</p>--}}
                        {{--                            </a>--}}
                        {{--                        @endif--}}


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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('corporateCustomer.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('monthlyReportPostPaid.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('monthlyReportPostPaid.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">Customer Care</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Customer
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('customerServiceCenter.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('simSale.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('consumerComplaints.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('consumerComplaints.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-header">Fortnightly Reports</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Fortnightly SPhone
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('fortnightlyReportSphone.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('fortnightlyReportSphone.index')}}" class="nav-link">
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
                        Fortnightly CDMA
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('fortnightlyReportCdma.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('fortnightlyReportCdma.index')}}" class="nav-link">
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
                        Fortnightly PMC
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('fortnightlyReportPmc.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('fortnightlyReportPmc.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">Weekly Progress SPC</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Weekly Progress SPC
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('weeklyProgressSpc.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('weeklyProgressSpc.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas "></i>
                    <p>
                        Weekly Progress <br>SPhone (Anx A)
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('weeklyProgressSpcSphone.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('weeklyProgressSpcSphone.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">Revenue Report</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Revenue Report
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('revCollN.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('revCollN.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-header">Allocation Sale Tgt</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Allocation Sale Tgt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->designation == 'Clerk')
                        <li class="nav-item">
                            <a href="{{route('allocationSaleTgt.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('allocationSaleTgt.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>




        @else
            <li class="nav-header">Services</li>


            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        SPhone
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('sphone.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('sphone.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>
                        SNet
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('snet.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('snet.index')}}" class="nav-link">
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
                        SCOM Tower
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('bts-tower.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('revenue-target.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('revenue-target.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">Reports and Returns</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-balance-scale"></i>
                    <p>
                        Court Cases Summery
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('cCaseAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('cCaseAotr.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-balance-scale"></i>
                    <p>
                        Court Cases
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('courtCaseSecs.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('courtCaseSecs.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-balance-scale"></i>
                    <p>
                        Outstanding Dues
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('courtCaseAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                        Monthly Status Report
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('monthly-network-status.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('monthly-network-status.index')}}" class="nav-link">
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('franchiseWiseRevenue.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Revenue Collection AOTR
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('scoRevenueCollectionAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('scoRevenueCollectionAotr.index')}}" class="nav-link">
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
                        Monthly DSL Rev Aotr
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('monthlyDslRevAotr.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('monthlyDslRevAotr.index')}}" class="nav-link">
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('siteState.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('monthlySaleProgress.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('monthlyStockSummery.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('corporateCustomer.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('monthlyReportPostPaid.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('monthlyReportPostPaid.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">Customer Care</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Customer
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('customerServiceCenter.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('simSale.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
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
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('consumerComplaints.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('consumerComplaints.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-header">Fortnightly Reports</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Fortnightly SPhone
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('fortnightlyReportSphone.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('fortnightlyReportSphone.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Fortnightly CDMA
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('fortnightlyReportCdma.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('fortnightlyReportCdma.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Fortnightly PMC
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('fortnightlyReportPmc.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('fortnightlyReportPmc.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">Weekly Progress SPC</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Weekly Progress SPC
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('weeklyProgressSpc.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('weeklyProgressSpc.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas"></i>
                    <p>
                        Weekly Progress<br> SPhone (Anx A)
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('weeklyProgressSpcSphone.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('weeklyProgressSpcSphone.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-header">Revenue Report</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Revenue Report
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('revCollN.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('revCollN.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-header">Allocation Sale Tgt</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Allocation Sale Tgt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->role != 'Sector HQ' || auth()->user()->designation == 'Clerk'  )
                        <li class="nav-item">
                            <a href="{{route('allocationSaleTgt.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('allocationSaleTgt.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All</p>
                        </a>
                    </li>
                </ul>
            </li>

        @endif


    </ul>
</nav>
