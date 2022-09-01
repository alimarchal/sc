@extends('layouts.page')
@section('page-title', 'Court Cases Summery')

@section('breadcrumb-item','Court Cases Summery')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('cCaseAotr.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>Enter Years</label>
                        <input class="form-control" type="text" name="filter[years]" placeholder="2015-2020">
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
                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>
            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Court Cases Summary </h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{--                        @if(auth()->user()->role != "Sector HQ")--}}
                        <th>{{strtoupper(str_replace('_',' ', 'YEARS'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'AOR'))}}</th>
                        {{--                        @endif--}}
                        <th>{{strtoupper(str_replace('_',' ', 'CASES SUITED'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'settled'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'bal'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'defaulted amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'recovered amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'amount balance'))}}</th>
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
                            <td>{{$coll->years}}</td>
                            <td>{{$coll->aor}}</td>
                            <td>{{$coll->case_suited}}</td>
                            <td>{{$coll->settled}}</td>
                            <td>{{$coll->bal}}</td>
                            <td>{{$coll->defaulted_amount}}</td>
                            <td>{{$coll->recovered_amount}}</td>
                            <td>{{$coll->amount_balance}}</td>
                            {{--                            @if(auth()->user()->role != "Sector HQ" || auth()->user()->designation == 'Clerk' )--}}
                            {{--                            @endif--}}

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('cCaseAotr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('cCaseAotr.destroy',$coll->id)}}" method="post">
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
                                <td colspan="3" class="text-right font-weight-bold">Total</td>
                            @else
                                <td colspan="3" class="text-right font-weight-bold">Total</td>
                            @endif
                            <td>{{$collection->sum('case_suited')}} </td>
                            <td>{{$collection->sum('settled')}} </td>
                            <td>{{$collection->sum('bal')}} </td>
                            <td>{{number_format(($collection->sum('defaulted_amount')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('recovered_amount')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('amount_balance')/1000000),3)}} m</td>

                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


