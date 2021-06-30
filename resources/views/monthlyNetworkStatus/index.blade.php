@extends('layouts.page')
@section('page-title', 'Monthly network status report')

@section('breadcrumb-item','')
@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class="d-print-none" action="{{route('monthly-network-status.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Company'))}}</label>
                        <select class="form-control" name="filter[company]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::company_name() as $company_name)
                                <option value="{{$company_name}}">{{$company_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>



                </div>
                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>
                <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center text-uppercase font-weight-bold"><u>Summary - monthly nw status report</u></h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center; text-align: center;">#</th>

                        <th rowspan="2" style="vertical-align: middle; horiz-align: center; text-align: center;">{{strtoupper(str_replace('_',' ', 'month'))}}</th>

                        <th colspan="5" style="vertical-align: middle; horiz-align: center; text-align: center;">{{str_replace('_',' ', 'S-Phone')}}</th>
                        <th colspan="7" style="vertical-align: middle; horiz-align: center; text-align: center;">{{strtoupper(str_replace('_',' ', 'GSM'))}}</th>
                        <th colspan="4" style="vertical-align: middle; horiz-align: center; text-align: center;">{{strtoupper(str_replace('_',' ', 'DSL'))}}</th>
                        <th colspan="4" style="vertical-align: middle; horiz-align: center; text-align: center;">{{strtoupper(str_replace('_',' ', 'DXX'))}}</th>

                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                        <th colspan="2" rowspan="2" style="vertical-align: middle; horiz-align: center; text-align: center;" class="d-print-none"  >{{strtoupper(str_replace('_',' ', 'action'))}}</th>
                        @endif
                    </tr>

                    <tr>
                        <th>Total Exch</th>
                        <th>W/C</th>
                        <th>PMC</th>
                        <th>NTC</th>
                        <th>F/PDs</th>
                        <th>Total BTS</th>
                        <th>Sys Cap</th>
                        <th>SIMs Sold till Date</th>
                        <th>Total Subs</th>
                        <th>Active Subs</th>
                        <th>Avg VLR Subs</th>
                        <th>SIMs sold During Month</th>
                        <th>Total DSL Sites</th>
                        <th>Cap</th>
                        <th>Active Subs</th>
                        <th>DSL Provided during the month</th>
                        <th>Total DXX Sites</th>
                        <th>Cap</th>
                        <th>Active Subs</th>
                        <th>DXX Provided during the Month</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>

                            <td>{{$coll->sphone_total_exc}}</td>
                            <td>{{$coll->sphone_wc}}</td>
                            <td>{{$coll->sphone_pmc}}</td>
                            <td>{{$coll->sphone_ntc}}</td>
                            <td>{{$coll->sphone_fds}}</td>
                            <td>{{$coll->gsm_total_bts}}</td>
                            <td>{{$coll->gsm_sys_cap}}</td>
                            <td>{{$coll->gsm_sim_sold_till_date}}</td>
                            <td>{{$coll->gsm_total_subscriber}}</td>
                            <td>{{$coll->gsm_active_subscriber}}</td>
                            <td>{{$coll->gsm_average_vlr_subs}}</td>
                            <td>{{$coll->gsm_sim_sold_during_month}}</td>
                            <td>{{$coll->dsl_total_dsl_sites}}</td>
                            <td>{{$coll->dsl_cap}}</td>
                            <td>{{$coll->dsl_active_subscriber}}</td>
                            <td>{{$coll->dsl_provided_during_the_month}}</td>
                            <td>{{$coll->dxx_total_dss_sites}}</td>
                            <td>{{$coll->dxx_cap}}</td>
                            <td>{{$coll->dxx_active_subs}}</td>
                            <td>{{$coll->dxx_provided_during_the_month}}</td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <td class="text-center d-print-none"><a href="{{route('monthly-network-status.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center d-print-none" >
                                <form action="{{route('monthly-network-status.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


