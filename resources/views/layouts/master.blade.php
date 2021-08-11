<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link rel="shortcut icon" href="{{ asset('SCO-Logo.ico') }}">

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart1);
        google.charts.setOnLoadCallback(drawChart3);


        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart223);
        function drawChart223() {
            var data = google.visualization.arrayToDataTable([
                @if(auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
                    ['Month', 'AOR MZD'],
                @foreach ($month as $key => $value)
                    ['{{$key}}',
                        @foreach ($value as $k => $v)
                            {{$v}},
                        @endforeach
                    ],
                @endforeach
                @elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
                        ['Month', 'AOR MPR'],
                    @foreach ($month as $key => $value)
                                ['{{$key}}',
                            @foreach ($value as $k => $v)
                                {{$v}},
                            @endforeach
                        ],
                    @endforeach
                @elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                    ['Month', 'AOR MZD', 'AOR MPR'],
                        @foreach ($month as $key => $value)
                    ['{{$key}}',
                        @foreach ($value as $k => $v)
                            {{$v}},
                        @endforeach
                    ],
                    @endforeach
                @endif
                // ['2014', 1000, 700, 300],
                // ['2015', 1170, 460, 250],
                // ['2016', 660, 1120, -300],
                // ['2017', 1030, 540, 350]
            ]);
            var options = {
                chart: {
                    title: '6 Month Revenue Trend',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }


        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart224);
        function drawChart224() {
            var data = google.visualization.arrayToDataTable([
                    @if(auth()->user()->role == "CSB 61" || auth()->user()->role == "Muzaffarabad")
                ['Month', 'Muzaffarabad'],
                    @foreach ($month2 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "Mirpur")
                ['Month', 'Mirpur'],
                    @foreach ($month2 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                ['Month', 'Mirpur', 'Muzaffarabad'],
                    @foreach ($month2 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                @endforeach
                @endif
                // ['2014', 1000, 700, 300],
                // ['2015', 1170, 460, 250],
                // ['2016', 660, 1120, -300],
                // ['2017', 1030, 540, 350]
            ]);
            var options = {
                chart: {
                    title: 'SPhone Active Subs',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material_2'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart225);
        function drawChart225() {
            var data = google.visualization.arrayToDataTable([
                    @if(auth()->user()->role == "CSB 61" || auth()->user()->role == "Muzaffarabad")
                ['Month', 'Muzaffarabad'],
                    @foreach ($month3 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "Mirpur")
                ['Month', 'Mirpur'],
                    @foreach ($month3 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                ['Month', 'Mirpur', 'Muzaffarabad'],
                    @foreach ($month3 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                @endforeach
                @endif
                // ['2014', 1000, 700, 300],
                // ['2015', 1170, 460, 250],
                // ['2016', 660, 1120, -300],
                // ['2017', 1030, 540, 350]
            ]);
            var options = {
                chart: {
                    title: 'DSL Connections',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material_3'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart226);
        function drawChart226() {
            var data = google.visualization.arrayToDataTable([
                    @if(auth()->user()->role == "CSB 61" || auth()->user()->role == "Muzaffarabad")
                ['Month', 'Muzaffarabad'],
                    @foreach ($month4 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "Mirpur")
                ['Month', 'Mirpur'],
                    @foreach ($month4 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                ['Month', 'Mirpur', 'Muzaffarabad'],
                    @foreach ($month4 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                @endforeach
                @endif
                // ['2014', 1000, 700, 300],
                // ['2015', 1170, 460, 250],
                // ['2016', 660, 1120, -300],
                // ['2017', 1030, 540, 350]
            ]);
            var options = {
                chart: {
                    title: 'SCOM Total Subs',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material_4'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart227);
        function drawChart227() {
            var data = google.visualization.arrayToDataTable([
                    @if(auth()->user()->role == "CSB 61" || auth()->user()->role == "Muzaffarabad")
                ['Month', 'Muzaffarabad'],
                    @foreach ($month5 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "Mirpur")
                ['Month', 'Mirpur'],
                    @foreach ($month5 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                ['Month', 'Mirpur', 'Muzaffarabad'],
                    @foreach ($month5 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                @endforeach
                @endif
                // ['2014', 1000, 700, 300],
                // ['2015', 1170, 460, 250],
                // ['2016', 660, 1120, -300],
                // ['2017', 1030, 540, 350]
            ]);
            var options = {
                chart: {
                    title: 'Sale of SIMs',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material_5'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart228);
        function drawChart228() {
            var data = google.visualization.arrayToDataTable([
                    @if(auth()->user()->role == "CSB 61" || auth()->user()->role == "Muzaffarabad")
                ['Month', 'Muzaffarabad'],
                    @foreach ($month6 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "Mirpur")
                ['Month', 'Mirpur'],
                    @foreach ($month6 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                    @endforeach
                    @elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                ['Month', 'Muzaffarabad', 'Mirpur'],
                    @foreach ($month6 as $key => $value)
                ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                ],
                @endforeach
                @endif
                // ['2014', 1000, 700, 300],
                // ['2015', 1170, 460, 250],
                // ['2016', 660, 1120, -300],
                // ['2017', 1030, 540, 350]
            ]);
            var options = {
                chart: {
                    title: 'GSM Revenue',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material_6'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }



        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawCharts22);
        function drawCharts22() {

            // BEGIN BAR CHART
            /*
            // create zero data so the bars will 'grow'
            var barZeroData = google.visualization.arrayToDataTable([
              ['Day', 'Page Views', 'Unique Views'],
              ['Sun',  0,      0],
              ['Mon',  0,      0],
              ['Tue',  0,      0],
              ['Wed',  0,      0],
              ['Thu',  0,      0],
              ['Fri',  0,      0],
              ['Sat',  0,      0]
            ]);
              */
            // actual bar chart data
            var barData = google.visualization.arrayToDataTable([
                ['Month', 'AOR MZD', 'AOR MPR'],
                @foreach ($month as $key => $value)
                    ['{{$key}}',
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                    ],
                @endforeach

                // ['Sun',  1050,      600],
                // ['Mon',  1370,      910],
                // ['Tue',  660,       400],
                // ['Wed',  1030,      540],
                // ['Thu',  1000,      480],
                // ['Fri',  1170,      960],
                // ['Sat',  660,       320]


            ]);
            // set bar chart options

            var barOptions = {
                focusTarget: 'category',
                backgroundColor: 'transparent',
                colors: ['cornflowerblue', 'tomato'],
                fontName: 'Open Sans',
                chartArea: {
                    left: 50,
                    top: 10,
                    width: '100%',
                    height: '70%'
                },
                bar: {
                    groupWidth: '80%'
                },
                hAxis: {
                    textStyle: {
                        fontSize: 11
                    }
                },
                vAxis: {
                    minValue: 0,
                    maxValue: 1500,
                    baselineColor: '#DDD',
                    gridlines: {
                        color: '#DDD',
                        count: 4
                    },
                    textStyle: {
                        fontSize: 11
                    }
                },
                legend: {
                    position: 'bottom',
                    textStyle: {
                        fontSize: 12
                    }
                },
                animation: {
                    duration: 1200,
                    easing: 'out',
                    startup: true
                }
            };
            // draw bar chart twice so it animates
            var barChart = new google.visualization.ColumnChart(document.getElementById('bar-chart'));
            //barChart.draw(barZeroData, barOptions);
            barChart.draw(barData, barOptions);

            // BEGIN LINE GRAPH

            function randomNumber(base, step) {
                return Math.floor((Math.random()*step)+base);
            }
            function createData(year, start1, start2, step, offset) {
                var ar = [];
                for (var i = 0; i < 12; i++) {
                    ar.push([new Date(year, i), randomNumber(start1, step)+offset, randomNumber(start2, step)+offset]);
                }
                return ar;
            }
            var randomLineData = [
                ['Year', 'Page Views', 'Unique Views']
            ];
            for (var x = 0; x < 7; x++) {
                var newYear = createData(2007+x, 10000, 5000, 4000, 800*Math.pow(x,2));
                for (var n = 0; n < 12; n++) {
                    randomLineData.push(newYear.shift());
                }
            }
            var lineData = google.visualization.arrayToDataTable(randomLineData);

            /*
          var animLineData = [
            ['Year', 'Page Views', 'Unique Views']
          ];
          for (var x = 0; x < 7; x++) {
            var zeroYear = createData(2007+x, 0, 0, 0, 0);
            for (var n = 0; n < 12; n++) {
              animLineData.push(zeroYear.shift());
            }
          }
          var zeroLineData = google.visualization.arrayToDataTable(animLineData);
            */

            var lineOptions = {
                backgroundColor: 'transparent',
                colors: ['cornflowerblue', 'tomato'],
                fontName: 'Open Sans',
                focusTarget: 'category',
                chartArea: {
                    left: 50,
                    top: 10,
                    width: '100%',
                    height: '70%'
                },
                hAxis: {
                    //showTextEvery: 12,
                    textStyle: {
                        fontSize: 11
                    },
                    baselineColor: 'transparent',
                    gridlines: {
                        color: 'transparent'
                    }
                },
                vAxis: {
                    minValue: 0,
                    maxValue: 50000,
                    baselineColor: '#DDD',
                    gridlines: {
                        color: '#DDD',
                        count: 4
                    },
                    textStyle: {
                        fontSize: 11
                    }
                },
                legend: {
                    position: 'bottom',
                    textStyle: {
                        fontSize: 12
                    }
                },
                animation: {
                    duration: 1200,
                    easing: 'out',
                    startup: true
                }
            };

            var lineChart = new google.visualization.LineChart(document.getElementById('line-chart'));
            //lineChart.draw(zeroLineData, lineOptions);
            lineChart.draw(lineData, lineOptions);

        }


        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['User', 'Available Slots'],
                ['Working', {{$slots['wroking_slot']}}],
                ['Free', {{$slots['free_slot']}}],
            ]);

            var options = {
                title: 'Exchange Slots',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }


        function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Outgoing Users','New Users'],
{{--                @foreach($customer_trend as $ct)--}}
{{--                ['{{$ct->month}}', {{$ct->ntc}}, {{$ct->pmc}}],--}}
{{--                @endforeach--}}

                @foreach ($customer_trnd as $key => $value)
                    ['{{$key}}',
                        @foreach ($value as $k => $v)
                            {{$v}},
                        @endforeach
                    ],
                @endforeach

                // ['Jan', 90, 40],
                // ['Feb', 100, 50],
                // ['Mar', 120, 80],
                // ['Apr', 180, 60],
                // ['May', 160, 35]
            ]);

            var options = {
                title: 'Customer Profile Trend',
                curveType: 'function',
                legend: {position: 'bottom'}
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }

        function drawChart3() {
            var data = google.visualization.arrayToDataTable([
                ["Month", "AOR MZD", "AOR MPR", {role: "style"}],
                @foreach ($month as $key => $value)
                ["{{$key}}",
                    @foreach ($value as $k => $v)
                        {{$v}},
                    @endforeach
                        "#b87333"],
                @endforeach
                // ["Jan", 5000, "#b87333"],
                // ["Feb", 8000, "silver"],
                // ["March", 19000, "gold"],
                // ["April", 7000, "color: #e5e4e2"],
                // ["May", 9000,"color: #e5e4e2"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                title: "6 Month Customer Revenue",
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: {position: "none"},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values_mzd"));
            chart.draw(view, options);
        }



    </script>

    @livewireStyles

    {{--    <!-- Styles -->--}}
    {{--    <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}
    {{--    <!-- Scripts -->--}}
    {{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="index3.html" class="nav-link">Home</a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="#" class="nav-link">Contact</a>--}}
            {{--            </li>--}}
        </ul>

        <!-- SEARCH FORM -->
    {{--        <form class="form-inline ml-3">--}}
    {{--            <div class="input-group input-group-sm">--}}
    {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-navbar" type="submit">--}}
    {{--                        <i class="fas fa-search"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}

    <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
        {{--            <li class="nav-item dropdown">--}}
        {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--                    <i class="far fa-comments"></i>--}}
        {{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
        {{--                </a>--}}
        {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    Brad Diesel--}}
        {{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">Call me whenever you can...</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}

        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    John Pierce--}}
        {{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">I got your message bro</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    Nora Silvester--}}
        {{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">The subject goes here</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    {{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><a href="{{url('user/profile')}}">Profile</a></span>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button href="{{ route('logout') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Logout
                        </button>
                    </form>


                    <div class="dropdown-divider"></div>
                                        <a href="{{url('user/profile')}}" class="dropdown-item">
                                            <i class="fas fa-key mr-2"></i> Change Password
                                        </a>
{{--                                        <div class="dropdown-divider"></div>--}}
{{--                                        <a href="#" class="dropdown-item">--}}
{{--                                            <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                                            <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                                        </a>--}}
{{--                                        <div class="dropdown-divider"></div>--}}
{{--                                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
            {{--                    <i class="fas fa-th-large"></i>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    {{--        <a href="index3.html" class="brand-link">--}}
    {{--            <img src="{{url('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
    {{--            <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
    {{--        </a>--}}

    <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

{{--                    <div class="mt-2" x-show="! photoPreview">--}}
{{--                        <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="rounded-full h-20 w-20 object-cover">--}}
{{--                    </div>--}}
                    <img src="{{auth()->user()->profile_photo_url}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
        @include('layouts.left-menu')
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{config('app.name')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if(auth()->user()->designation != "Clerk")
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$bts_tower_count}}</h3>

                                <p>SCOM Towers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('bts-tower.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$snet_as}}</h3>

                                <p>S-Net Connections</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{route('snet.index',['filter[month]=' . \Carbon\Carbon::parse($snet_max_date)->format('Y-m-d')])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$sphone_wc}}</h3>

                                <p>S-Phone Connections</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>

                            <a href="{{route('sphone.index',['filter[month]=' . \Carbon\Carbon::parse($sphone_max_date)->format('Y-m-d')])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{number_format(($revenue_total/1000000),3)}} Million</h3>

                                <p>Total Revenue</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{route('revenue-target.index',['filter[month]=' . \Carbon\Carbon::parse($rev_max_date)->format('Y-m-d')])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-4 connectedSortable">
                        <br>
                        <div id="piechart_3d" ></div>
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-4 connectedSortable">
                        <br>
                        <div id="curve_chart" ></div>
                    </section>

                    <section class="col-lg-4 mt-4 mb-4 connectedSortable">
{{--                        <div id="bar-chart"></div>--}}
                        <div id="columnchart_material"></div>
                    </section>
                    <!-- right col -->
                </div>
                <div class="row">
{{--                    <div class="col-md-12 text-center">--}}
{{--                        <h3>Customer Profile</h3>--}}
{{--                    </div>--}}

                    <section class="col-lg-4 mt-4 mb-4 connectedSortable">
                        <div id="columnchart_material_2"></div>
                    </section>


                    <section class="col-lg-4 mt-4 mb-4 connectedSortable">
                        <div id="columnchart_material_3"></div>
                    </section>



                    <section class="col-lg-4 mt-4 mb-4 connectedSortable">
                        <div id="columnchart_material_4"></div>
                    </section>


                    <section class="col-lg-4 mt-4 mb-4 connectedSortable">
                        <div id="columnchart_material_5"></div>
                    </section>

                    <section class="col-lg-4 mt-4 mb-4 connectedSortable">
                        <div id="columnchart_material_6"></div>
                    </section>

                </div>


                <!-- /.row -->
            </div>

        @else
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">

                        <div class="col-12">
                            <div style="margin: auto;">
                                <img class="w-auto h-auto" src="{{url('SCO-Logo.png')}}" />
                            </div>
                        </div>

                        Please use the left menu for navagation

                    </div>
                </div>
            @endif
            <!-- /.container-fluid -->
        </section>

        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">{{config('app.name')}}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('AdminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('AdminLTE/dist/js/pages/dashboard.js')}}"></script>

@livewireScripts


</body>
</html>
