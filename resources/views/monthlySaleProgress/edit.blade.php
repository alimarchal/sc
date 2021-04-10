@extends('layouts.page')
@section('page-title', 'Consumer')

@section('breadcrumb-item','Consumer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlySaleProgress.update', $monthlySaleProgress->id)}}" method="post">
                    @csrf
                    @method('put')

                    {{--                    <div class="form-group">--}}
                    {{--                        <label >{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>--}}
                    {{--                        <select class="form-control" name="loc_of_csc">--}}
                    {{--                            @foreach(\App\Models\User::district() as $dist)--}}
                    {{--                                <option value="{{$dist}}">{{$dist}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}

                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" value="{{$monthlySaleProgress->date}}" class="form-control" >
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Btn'))}}</label>
                                <select class="form-control" name="btn">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}" @if($btn_name == $monthlySaleProgress->btn) selected @endif>{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'services'))}}</label>
                                <select class="form-control" name="services">
                                    <option value="SCOM" @if($monthlySaleProgress->services == "SCOM") selected @endif>SCOM</option>
                                    <option value="CDMA" @if($monthlySaleProgress->services == "CDMA") selected @endif>CDMA</option>
                                    <option value="DSL Cards" @if($monthlySaleProgress->services == "DSL Cards") selected @endif>DSL Cards</option>
                                    <option value="PPCCs" @if($monthlySaleProgress->services == "PPCCs") selected @endif>PPCCs</option>
                                    <option value="SCOM SIMs" @if($monthlySaleProgress->services == "SCOM SIMs") selected @endif>SCOM SIMs</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Denom'))}}</label>
                                <input type="number" name="denom" value="{{$monthlySaleProgress->denom}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '423 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_423_csc" value="{{$monthlySaleProgress->card_sale_through_own_outlets_423_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '426 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_426_csc" value="{{$monthlySaleProgress->card_sale_through_own_outlets_426_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '429 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_429_csc" value="{{$monthlySaleProgress->card_sale_through_own_outlets_429_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_total_cards'))}}</label>
                                <input type="number" name="own_outlet_total_cards" value="{{$monthlySaleProgress->own_outlet_total_cards}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_total_revenue'))}}</label>
                                <input type="number" name="own_outlet_total_revenue" value="{{$monthlySaleProgress->own_outlet_total_revenue}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Neelum comm mzd'))}}</label>
                                <input type="number" name="card_sale_through_franchise_neelum_comm_mzd" value="{{$monthlySaleProgress->card_sale_through_franchise_neelum_comm_mzd}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'ahmed traders bagh'))}}</label>
                                <input type="number" name="card_sale_through_franchise_ahmed_trader_bagh" value="{{$monthlySaleProgress->card_sale_through_franchise_ahmed_trader_bagh}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'rkt comm gp'))}}</label>
                                <input type="number" name="card_sale_through_franchise_rkt_comm_gp" value="{{$monthlySaleProgress->card_sale_through_franchise_rkt_comm_gp}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'franchisee_total_cards'))}}</label>   <br>
                                <br>
                                <input type="number" name="franchisee_total_cards" value="{{$monthlySaleProgress->franchisee_total_cards}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'franchisee_total_revenue'))}}</label>   <br>
                                <br>
                                <input type="number" name="franchisee_total_revenue" value="{{$monthlySaleProgress->franchisee_total_revenue}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_franchisee_total_cards'))}}</label>
                                <br>
                                <br>
                                <input type="number" name="own_outlet_franchisee_total_cards" value="{{$monthlySaleProgress->own_outlet_franchisee_total_cards}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_franchisee_total_revenue'))}}</label>
                                <input type="number" name="own_outlet_franchisee_total_revenue" value="{{$monthlySaleProgress->own_outlet_franchisee_total_revenue}}" class="form-control" >
                            </div>
                        </div>



                    </div>




                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


