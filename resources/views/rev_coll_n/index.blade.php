@extends('layouts.page')
@section('page-title', 'Revenue Report')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('revCollN.index')}}" method="get">
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
                <h2 class="text-center">Rev Collection</h2>
                <br>

                <table  id="example"  class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th colspan="3" class="text-center">No of Cards Sold</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th colspan="3" class="text-center">Bal Amount (In Rs)</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'type_of_card'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'value_of_card'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'unit_outlets'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'franchisee'))}}</th>

                        <th>{{strtoupper(str_replace('_',' ', 'total'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'rebate_percentage'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'rebate_amount_in_rs'))}}</th>


                        <th>{{strtoupper(str_replace('_',' ', 'adv_tax_percentage'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'adv_tax_amount_in_rs'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'unit_outlets'))}}</th>


                        <th>{{strtoupper(str_replace('_',' ', 'franchisee'))}}</th>
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
                            <td>{{$coll->type_of_card}} </td>
                            <td>{{$coll->value_of_card}} </td>
                            <td>{{$coll->card_sold_unit_outlets}} </td>
                            <td>{{$coll->card_sold_franchisee}} </td>
                            <td>{{$coll->card_sold_total}} </td>
                            <td>{{$coll->rebate_percentage}} </td>
                            <td>{{$coll->rebate_amount_in_rs}} </td>
                            <td>{{$coll->adv_tax_percentage}} </td>
                            <td>{{$coll->adv_tax_amount_in_rs}} </td>
                            <td>{{$coll->bal_amount_rs_unit_outlets}} </td>
                            <td>{{$coll->bal_amount_franchisee}} </td>
                            <td>{{$coll->bal_amount_total}} </td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('revCollN.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('revCollN.destroy',$coll->id)}}" method="post">
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
                                <td colspan="5" class="text-right font-weight-bold">Total</td>
                            @endif

                            <td>{{$collection->sum('card_sold_unit_outlets')}}</td>
                            <td>{{$collection->sum('card_sold_franchisee')}}</td>
                            <td>{{$collection->sum('card_sold_total')}}</td>
                            <td>{{$collection->sum('rebate_percentage')}}</td>
                            <td>{{$collection->sum('rebate_amount_in_rs')}}</td>
                            <td>{{$collection->sum('adv_tax_percentage')}}</td>
                            <td>{{$collection->sum('adv_tax_amount_in_rs')}}</td>
                            <td>{{$collection->sum('bal_amount_rs_unit_outlets')}}</td>
                            <td>{{$collection->sum('bal_amount_franchisee')}}</td>
                            <td>{{$collection->sum('bal_amount_total')}}</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


