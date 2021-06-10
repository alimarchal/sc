@extends('layouts.page')
@section('page-title', 'Weekly Progress of SPC')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('fortnightlyReportSphone.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'AOR'))}}</label>
                        <select class="form-control" name="filter[aor]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                <option value="{{$company_name_without_code}}">{{$company_name_without_code}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>

            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Fortnightly Report SPhone</h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>

                    <tr>
                        <th>#</th>
                        <th colspan="4">&nbsp;</th>
                        <th colspan="2" style="vertical-align: center; horiz-align: center;">Fortnightly</th>
                        <th colspan="3">NTCs / PMC Restored Till Date</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'cap'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'working_connection'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ntc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'pmc_restored'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ntcs'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'pmc_restored'))}}</th>
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
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('d-m-Y')}}</td>
                            {{--                            @endif--}}
                            <td>{{$coll->aor}} </td>
                            <td>{{$coll->cap}} </td>
                            <td>{{$coll->working_connection}}</td>
                            <td>{{$coll->ntc}} </td>
                            <td>{{$coll->pmc}} </td>
                            <td>{{$coll->ntcs}} </td>
                            <td>{{$coll->pmc_restored}} </td>
                            <td>{{$coll->total}} </td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('fortnightlyReportSphone.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('fortnightlyReportSphone.destroy',$coll->id)}}" method="post">
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
                            <td>{{$collection->sum('cap')}}</td>
                            <td>{{$collection->sum('working_connection')}}</td>
                            <td>{{$collection->sum('ntc')}}</td>
                            <td>{{$collection->sum('pmc')}}</td>
                            <td>{{$collection->sum('ntcs')}}</td>
                            <td>{{$collection->sum('pmc_restored')}}</td>
                            <td>{{$collection->sum('total')}}</td>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


