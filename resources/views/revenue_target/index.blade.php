@extends('layouts.page')
@section('page-title', 'Revenue Target & Achieved')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('revenue-target.index')}}" method="get">
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
                <h2 class="text-center">Revenue Target & Achieved</h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{--                        @if(auth()->user()->role != "Sector HQ")--}}
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        {{--                        @endif--}}
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'scom_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'scom_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'snet_asg'))}}</th>

                        <th>{{strtoupper(str_replace('_',' ', 'snet_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'sphone_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'sphone_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'dxx_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'dxx_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'GPON ASG'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'GPON ACH'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'remarks'))}}</th>
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
                            <td>{{number_format(($coll->scom_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->scom_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->snet_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->snet_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->sphone_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->sphone_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->dxx_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->dxx_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->gpon_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->gpon_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->total_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->total_ach/1000000),3)}} m</td>
                            <td>{{ $coll->remarks }}</td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('revenue-target.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('revenue-target.destroy',$coll->id)}}" method="post">
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
                                <td colspan="2" class="text-right font-weight-bold">Total</td>
                            @else
                                <td colspan="3" class="text-right font-weight-bold">Total</td>
                            @endif
                            <td>{{number_format(($collection->sum('scom_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('scom_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('snet_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('snet_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('sphone_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('sphone_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('dxx_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('dxx_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('gpon_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('gpon_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('total_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('total_ach')/1000000),3)}} m</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


