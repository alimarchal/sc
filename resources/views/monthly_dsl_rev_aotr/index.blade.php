@extends('layouts.page')
@section('page-title', 'Monthly DSL Rev / Type of DSL Subs Report')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('monthlyDslRevAotr.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'AOR'))}}</label>
                        <select class="form-control" name="filter[aor]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>
            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Monthly DSL Rev / Type of DSL Subs Report</h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th colspan="6"></th>
                        <th colspan="3" style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'Amount Received'))}}</th>
                    </tr>


                    <tr>
                        <th>#</th>
                        {{--                        @if(auth()->user()->role != "Sector HQ")--}}
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        {{--                        @endif--}}
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Company'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'New DSL Connections'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Total Working Connection'))}}</th>

                        <th>{{strtoupper(str_replace('_',' ', 'modem charges'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'svc charges'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total'))}}</th>
                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                            <th class="d-print-none">{{strtoupper(str_replace('_',' ', 'EDIT'))}}</th>
                            <th class="d-print-none"> {{strtoupper(str_replace('_',' ', 'DELETE'))}}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            {{--                            @if(auth()->user()->role != "Sector HQ" || auth()->user()->designation == 'Clerk' )--}}
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>
                            {{--                            @endif--}}
                            <td>{{$coll->aor}}</td>
                            <td>{{$coll->company}}</td>
                            <td>{{$coll->new_dsl_connections}}</td>
                            <td>{{$coll->total_working_connection}}</td>
                            <td>{{number_format(($coll->modem_charges/1000000),3)}} m</td>
                            <td>{{number_format(($coll->svc_charges/1000000),3)}} m</td>
                            <td>{{number_format(($coll->total/1000000),3)}} m</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('monthlyDslRevAotr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('monthlyDslRevAotr.destroy',$coll->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    @if($collection->isNotEmpty())
                        <tr>

                            @if((auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @else
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @endif
                            <td>{{number_format(($collection->sum('new_dsl_connections')))}}</td>
                            <td>{{number_format(($collection->sum('total_working_connection')))}}</td>
                            <td>{{number_format(($collection->sum('modem_charges')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('svc_charges')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('total')/1000000),3)}} m</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


