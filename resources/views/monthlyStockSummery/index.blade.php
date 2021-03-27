@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('consumerComplaints.index')}}" method="get">
                <div class="form-group">
                    <label>{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>
                    <select class="form-control" name="filter[loc_of_csc]">
                        @foreach(\App\Models\User::district() as $dist)
                            <option value="{{$dist}}">{{$dist}}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="submit" class="btn btn-danger">
                </div>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>

                    <tr class="text-center">
                        <th>#</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'Cards'))}}</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'previous balance'))}}</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'received during month'))}}</th>
                        <th colspan="6">{{strtoupper(str_replace('_',' ', 'SOLD'))}}</th>
                        <th colspan="6">{{strtoupper(str_replace('_',' ', 'balance in stores'))}}</th>
                    </tr>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'type'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'denom'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '423'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '426'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '429'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '423'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '426'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '429'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '423'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '426'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '429'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'MZD'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'BAGH'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'RKT'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '423'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '426'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '429'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'TOTAL'))}}</th>
                        <th colspan="3">Action</th>
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
                            <td class="text-center"><a href="{{route('monthlyStockSummery.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                            <td  class="text-center">

                                <form action="{{route('monthlyStockSummery.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


