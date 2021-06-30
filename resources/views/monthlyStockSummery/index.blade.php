@extends('layouts.page')
@section('page-title', 'Stock Summery')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class="d-print-none" action="{{route('monthlyStockSummery.index')}}" method="get">
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

            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Stock Summary MZD</h2>
                <br>

                <table class="table table-bordered">
                    <thead>

                    <tr class="text-center">
                        <th rowspan="3" style="vertical-align: middle; horiz-align: center;" >#</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'Types of Cards'))}}</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'previous balance'))}}</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'received during month'))}}</th>
                        <th colspan="6">{{strtoupper(str_replace('_',' ', 'SOLD'))}}</th>
                        <th colspan="6">{{strtoupper(str_replace('_',' ', 'balance in stores'))}}</th>
                    </tr>
                    <tr class="text-center">
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" colspan="2">DENOM</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '423 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '426 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '429 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '423 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '426 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', '429 CSC'))}}</th>
                        <th colspan="3" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Unit Outlets'))}}</th>
                        <th colspan="3" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Franchisee'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '423 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '426 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" rowspan="2" >{{strtoupper(str_replace('_',' ', '429 CSC'))}}</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'TOTAL'))}}</th>
                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                        <th colspan="3" rowspan="2" style="vertical-align: middle; horiz-align: center;"  class=" d-print-none">Action</th>
                        @endif
                    </tr>

                    <tr class="text-center">
                        <th  style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '423 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '426 CSC'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;"  rowspan="2">{{strtoupper(str_replace('_',' ', '429 CSC'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'MZD'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'BAGH'))}}</th>
                        <th style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'RKT'))}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->type_of_cards}}</td>
                            <td>{{$coll->denom}}</td>
                            <td>{{$coll->previous_balance_423_csc}}</td>
                            <td>{{$coll->previous_balance_426_csc}}</td>
                            <td>{{$coll->previous_balance_429_csc}}</td>
                            <td>{{$coll->received_during_month_423_csc}}</td>
                            <td>{{$coll->received_during_month_426_csc}}</td>
                            <td>{{$coll->received_during_month_429_csc}}</td>
                            <td>{{$coll->sold_unit_outlets_423_csc}}</td>
                            <td>{{$coll->sold_unit_outlets_426_csc}}</td>
                            <td>{{$coll->sold_unit_outlets_429_csc}}</td>
                            <td>{{$coll->sold_franchisee_mzd}}</td>
                            <td>{{$coll->sold_franchisee_bagh}}</td>
                            <td>{{$coll->sold_franchisee_rkt}}</td>
                            <td>{{$coll->bal_in_stores_423_csc}}</td>
                            <td>{{$coll->bal_in_stores_426_csc}}</td>
                            <td>{{$coll->bal_in_stores_429_csc}}</td>
                            <td>{{$coll->total}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <td class="text-center  d-print-none"><a href="{{route('monthlyStockSummery.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                            <td  class="text-center  d-print-none">

                                <form action="{{route('monthlyStockSummery.destroy',$coll->id)}}" method="post">
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


