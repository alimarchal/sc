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
                        <th rowspan="2">#</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'services'))}}</th>
                        <th  rowspan="2">{{strtoupper(str_replace('_',' ', 'denom'))}}</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'Card Sale Through Own Outlets'))}}</th>

                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet_total_cards'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet_total_revenue'))}}</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'Card Sale Through Own Franchisee'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'franchisee_total_cards'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'franchisee_total_revenue'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet_franchisee_total_cards'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet_franchisee_total_revenue'))}}</th>
                        <th rowspan="2" colspan="3">Action</th>
                    </tr>


                    <tr class="text-center">
                        <th>{{strtoupper(str_replace('_',' ', '423'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '426'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '429'))}}</th>


                        <th>{{strtoupper(str_replace('_',' ', 'neelum_comm_mzd'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ahmed_trader_bagh'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'rkt_comm_gp'))}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->services}}</td>
                            <td>{{$coll->denom}}</td>
                            <td>{{$coll->card_sale_through_own_outlets_423_csc}}</td>
                            <td>{{$coll->card_sale_through_own_outlets_426_csc}}</td>
                            <td>{{$coll->card_sale_through_own_outlets_429_csc}}</td>
                            <td>{{$coll->own_outlet_total_cards}}</td>
                            <td>{{$coll->own_outlet_total_revenue}}</td>
                            <td>{{$coll->card_sale_through_franchise_neelum_comm_mzd}}</td>
                            <td>{{$coll->card_sale_through_franchise_ahmed_trader_bagh}}</td>
                            <td>{{$coll->card_sale_through_franchise_rkt_comm_gp}}</td>
                            <td>{{$coll->franchisee_total_cards}}</td>
                            <td>{{$coll->franchisee_total_revenue}}</td>
                            <td>{{$coll->own_outlet_franchisee_total_cards}}</td>
                            <td>{{$coll->own_outlet_franchisee_total_revenue}}</td>
                            <td class="text-center"><a href="{{route('monthlySaleProgress.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                            <td  class="text-center">

                                <form action="{{route('monthlySaleProgress.destroy',$coll->id)}}" method="post">
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


