@extends('layouts.page')
@section('page-title', 'SCO Revenue Collection')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('scoRevenueCollectionAotr.index')}}" method="get">
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
                <h2 class="text-center">SCO Revenue Collection</h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{--                        @if(auth()->user()->role != "Sector HQ")--}}
                        <th>{{strtoupper(str_replace('_',' ', 'AOR'))}}</th>
                        {{--                        @endif--}}
                        <th>{{strtoupper(str_replace('_',' ', 'detail'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'rev tfr date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'amount tfr to sco main acct'))}}</th>
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
                            <td>{{$coll->aor}}</td>
                            <td>{{$coll->detail}}</td>
                            {{--                            @if(auth()->user()->role != "Sector HQ" || auth()->user()->designation == 'Clerk' )--}}
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('d-M-Y')}}</td>
                            {{--                            @endif--}}


                            <td>{{$coll->amount_trf_sco_main_acc}}</td>
                            <td>{{$coll->remarks}}</td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('scoRevenueCollectionAotr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('scoRevenueCollectionAotr.destroy',$coll->id)}}" method="post">
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
                            <td>{{number_format(($collection->sum('snet_asg')/1000000),3)}} m</td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


