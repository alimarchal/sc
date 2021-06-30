@extends('layouts.page')
@section('page-title', 'Sale Progress')

@section('breadcrumb-item','Sale Progress')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlySaleProgress.store')}}" method="post">
                    @csrf

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
                            <input type="date" name="date" class="form-control" >
                        </div>
                        </div>
                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'bn'))}}</label>
                            <select class="form-control" name="btn">
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                       @livewire('denom')

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '423 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_423_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '426 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_426_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '429 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_429_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_total_cards'))}}</label>
                                <input type="number" name="own_outlet_total_cards" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_total_revenue'))}}</label>
                                <input type="number" name="own_outlet_total_revenue" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Neelum comm mzd'))}}</label>
                                <input type="number" name="card_sale_through_franchise_neelum_comm_mzd" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'ahmed traders bagh'))}}</label>
                                <input type="number" name="card_sale_through_franchise_ahmed_trader_bagh" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'rkt comm gp'))}}</label>
                                <input type="number" name="card_sale_through_franchise_rkt_comm_gp" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'franchisee_total_cards'))}}</label>   <br>
                                <br>
                                <input type="number" name="franchisee_total_cards" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'franchisee_total_revenue'))}}</label>   <br>
                                <br>
                                <input type="number" name="franchisee_total_revenue" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet/_franchisee_total_cards'))}}</label>
                                <br>
                                <br>
                                <input type="number" name="own_outlet_franchisee_total_cards" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet/_franchisee_total_revenue'))}}</label>
                                <input type="number" name="own_outlet_franchisee_total_revenue" class="form-control" >
                            </div>
                        </div>



                    </div>




                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


