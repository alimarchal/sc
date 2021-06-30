@extends('layouts.page')
@section('page-title', 'Stock Summery')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class="d-print-none" action="{{route('monthlyStockSummeryMpr.index')}}" method="get">
                <div class="row">

                    @if(auth()->user()->role == "admin")
                        <div class="col-md-3">
                            <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                            <select class="form-control" name="filter[btn]">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif


                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>


                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
            </form>
<br>
            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>

            <div class="invoice p-3 mb-3 rounded">

                <h2 class="text-center">Stock Summary MPR</h2>
                <br>
                <table class="table table-bordered">
                    <thead>

                    <tr class="text-center">
                        <th rowspan="3" style="vertical-align: middle; horiz-align: center;" >#</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'Types of Cards'))}}</th>
                        <th colspan="5">{{strtoupper(str_replace('_',' ', 'previous balance'))}}</th>
                        <th colspan="4">{{strtoupper(str_replace('_',' ', 'received during month'))}}</th>
                        <th colspan="6">{{strtoupper(str_replace('_',' ', 'SOLD'))}}</th>
                        <th colspan="6">{{strtoupper(str_replace('_',' ', 'balance in stores'))}}</th>
                    </tr>
                    <tr class="text-center">
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" colspan="2">DENOM</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '424 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '428 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '432 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '64 CSB'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Total'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '424 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '428 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '432 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '64 CSB'))}}</th>
                        <th colspan="5" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Unit Outlets'))}}</th>
                        <th colspan="5" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Franchisee'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '424 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '428 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '432 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '64 CSB'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', 'Total'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Grand TOTAL'))}}</th>
                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                        <th colspan="3" rowspan="2" style="vertical-align: middle; horiz-align: center;"  class=" d-print-none">Action</th>
                        @endif
                    </tr>

                    <tr class="text-center">
                        <th  style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '424 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '428 CSC'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '432 CSC'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '64 CSB'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', 'Total'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'jarral_mpr'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'kti'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'fahad_bhr'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'baig_krt'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'dadyal'))}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->type_of_cards}}</td>
                            <td>{{$coll->denom}}</td>
                            <td>{{$coll->previous_balance_424_csc}}</td>
                            <td>{{$coll->previous_balance_428_csc}}</td>
                            <td>{{$coll->previous_balance_432_csc}}</td>
                            <td>{{$coll->previous_balance_64csb}}</td>
                            <td>{{$coll->previous_balance_total}}</td>
                            <td>{{$coll->received_during_month_424_csc}}</td>
                            <td>{{$coll->received_during_month_428_csc}}</td>
                            <td>{{$coll->received_during_month_432_csc}}</td>
                            <td>{{$coll->received_during_month_64csb}}</td>
                            <td>{{$coll->sold_unit_outlets_424_csc}}</td>
                            <td>{{$coll->sold_unit_outlets_428_csc}}</td>
                            <td>{{$coll->sold_unit_outlets_432_csc}}</td>
                            <td>{{$coll->sold_unit_outlets_64csb}}</td>
                            <td>{{$coll->sold_unit_outlets_total}}</td>
                            <td>{{$coll->sold_franchisee_jarral_mpr}}</td>
                            <td>{{$coll->sold_franchisee_kti}}</td>
                            <td>{{$coll->sold_franchisee_fahad_bhr}}</td>
                            <td>{{$coll->sold_franchisee_baig_krt}}</td>
                            <td>{{$coll->sold_franchisee_dadyal}}</td>
                            <td>{{$coll->bal_in_stores_424_csc}}</td>
                            <td>{{$coll->bal_in_stores_428_csc}}</td>
                            <td>{{$coll->bal_in_stores_432_csc}}</td>
                            <td>{{$coll->bal_in_stores_64csb}}</td>
                            <td>{{$coll->bal_in_stores_total}}</td>
                            <td>{{$coll->total}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <td class="text-center  d-print-none"><a href="{{route('monthlyStockSummeryMpr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                            <td  class="text-center  d-print-none">

                                <form action="{{route('monthlyStockSummeryMpr.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
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


