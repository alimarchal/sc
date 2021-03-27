@extends('layouts.page')
@section('page-title', 'Consumer')

@section('breadcrumb-item','Consumer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlyStockSummery.update', $monthlyStockSummery->id)}}" method="post">
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

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                                <input type="number" name="btn" value="{{$monthlyStockSummery->btn}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'type_of_cards'))}}</label>
                                <select class="form-control" name="type_of_cards">
                                    @foreach(\App\Models\User::cards() as $dist)
                                        <option value="{{$dist}}" @if($monthlyStockSummery->type_of_cards == $dist) selected @endif>{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'denom'))}}</label>
                                <select class="form-control" name="denom">
                                    <optgroup label="SCOM">
                                        <option value="Rs 50" @if( $monthlyStockSummery->denom =='Rs 50') selected @endif>Rs 50</option>
                                        <option value="Rs 100" @if( $monthlyStockSummery->denom =='Rs 100') selected @endif>Rs 100</option>
                                        <option value="Rs 200" @if( $monthlyStockSummery->denom =='Rs 200') selected @endif>Rs 200</option>
                                        <option value="Rs 300" @if( $monthlyStockSummery->denom =='Rs 300') selected @endif>Rs 300</option>
                                        <option value="Rs 300 (Super Card)" @if( $monthlyStockSummery->denom =='Rs 300 (Super Card)') selected @endif>Rs 300 (Super Card)</option>
                                        <option value="Rs 349 (Super Card)" @if( $monthlyStockSummery->denom =='Rs 349 (Super Card)') selected @endif>Rs 349 (Super Card) </option>
                                        <option value="Rs 500" @if( $monthlyStockSummery->denom =='Rs 500') selected @endif>Rs 500</option>
                                        <option value="Rs 500 (Super Card)" @if( $monthlyStockSummery->denom =='Rs 500 (Super Card)') selected @endif>Rs 500 (Super Card)</option>
                                        <option value="Rs 549 (Super Card)" @if( $monthlyStockSummery->denom =='Rs 549 (Super Card)') selected @endif>Rs 549 (Super Card)</option>
                                        <option value="Rs 1000" @if( $monthlyStockSummery->denom =='Rs 1000') selected @endif>Rs 1000</option>
                                    </optgroup>


                                    <optgroup label="CDMA">
                                        <option value="Rs 100" @if( $monthlyStockSummery->denom == "Rs 100") selected @endif>Rs 100</option>
                                        <option value="Rs 300" @if( $monthlyStockSummery->denom == "Rs 300") selected @endif>Rs 300</option>
                                        <option value="Rs 500" @if( $monthlyStockSummery->denom == "Rs 500") selected @endif>Rs 500</option>
                                        <option value="249 UNIT" @if( $monthlyStockSummery->denom == "249 UNIT") selected @endif>249 UNIT</option>
                                        <option value="499 UNIT" @if( $monthlyStockSummery->denom == "499 UNIT") selected @endif>499 UNIT</option>
                                        <option value="1499 UNIT" @if( $monthlyStockSummery->denom == "1499 UNIT") selected @endif>1499 UNIT</option>
                                        <option value="WLL Rs 50" @if( $monthlyStockSummery->denom == "WLL Rs 50") selected @endif>WLL Rs 50</option>
                                        <option value="WLL Rs 100" @if( $monthlyStockSummery->denom == "WLL Rs 100") selected @endif>WLL Rs 100</option>
                                        <option value="WLL Rs 300" @if( $monthlyStockSummery->denom == "WLL Rs 300") selected @endif>WLL Rs 300</option>
                                    </optgroup>


                                    <optgroup label="PPCCs">
                                        <option value="Rs 50" @if( $monthlyStockSummery->denom == "Rs 50") selected @endif>Rs 50</option>
                                        <option value="Rs 100" @if( $monthlyStockSummery->denom == "Rs 100") selected @endif>Rs 100</option>
                                        <option value="Rs 200" @if( $monthlyStockSummery->denom == "Rs 200") selected @endif>Rs 200</option>
                                        <option value="Rs 300" @if( $monthlyStockSummery->denom == "Rs 300") selected @endif>Rs 300</option>
                                        <option value="Rs 500" @if( $monthlyStockSummery->denom == "Rs 500") selected @endif>Rs 500</option>
                                    </optgroup>



                                    <optgroup label="DSL">
                                        <option value="Rs 100" @if( $monthlyStockSummery->denom == "Rs 100") selected @endif>Rs 100</option>
                                        <option value="Rs 500" @if( $monthlyStockSummery->denom =="Rs 500" ) selected @endif>Rs 500</option>
                                        <option value="Rs 1000" @if( $monthlyStockSummery->denom == "Rs 1000") selected @endif>Rs 1000</option>
                                    </optgroup>

                                    <optgroup label="SIMs">
                                        <option value="SCOM SIM 2G/3G" @if( $monthlyStockSummery->denom == "SCOM SIM 2G/3G") selected @endif>SCOM SIM 2G/3G</option>
                                        <option value="SCOM SIM 4G" @if( $monthlyStockSummery->denom == "SCOM SIM 4G") selected @endif>SCOM SIM 4G</option>
                                        <option value="Blank SIM 2G/3G" @if( $monthlyStockSummery->denom == "Blank SIM 2G/3G") selected @endif>Blank SIM 2G/3G</option>
                                        <option value="Blank SIM 4G" @if( $monthlyStockSummery->denom == "Blank SIM 4G") selected @endif>Blank SIM 4G</option>
                                        <option value="Samsung Chip 128K" @if( $monthlyStockSummery->denom == "Samsung Chip 128K") selected @endif>Samsung Chip 128K</option>
                                        <option value="Post paid SIM" @if( $monthlyStockSummery->denom == "Post paid SIM") selected @endif>Post paid SIM</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_423_csc'))}}</label>
                                <input type="number" name="previous_balance_423_csc" value="{{$monthlyStockSummery->previous_balance_423_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_426_csc'))}}</label>
                                <input type="number" name="previous_balance_426_csc" value="{{$monthlyStockSummery->previous_balance_426_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_429_csc'))}}</label>
                                <input type="number" name="previous_balance_429_csc" value="{{$monthlyStockSummery->previous_balance_429_csc}}" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_423_csc'))}}</label>
                                <input type="number" name="received_during_month_423_csc" value="{{$monthlyStockSummery->received_during_month_423_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_426_csc'))}}</label>
                                <input type="number" name="received_during_month_426_csc" value="{{$monthlyStockSummery->received_during_month_426_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_429_csc'))}}</label>
                                <input type="number" name="received_during_month_429_csc" value="{{$monthlyStockSummery->received_during_month_429_csc}}" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_423_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_423_csc" value="{{$monthlyStockSummery->sold_unit_outlets_423_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_426_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_426_csc" value="{{$monthlyStockSummery->sold_unit_outlets_426_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_429_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_429_csc" value="{{$monthlyStockSummery->sold_unit_outlets_429_csc}}" class="form-control" >
                            </div>
                        </div>




                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'MZD'))}}</label>
                                <input type="number" name="sold_franchisee_mzd" value="{{$monthlyStockSummery->sold_franchisee_mzd}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'BAGH'))}}</label>
                                <input type="number" name="sold_franchisee_bagh" value="{{$monthlyStockSummery->sold_franchisee_bagh}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'RKT'))}}</label>
                                <input type="number" name="sold_franchisee_rkt" value="{{$monthlyStockSummery->sold_franchisee_rkt}}" class="form-control" >
                            </div>
                        </div>





                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_423_csc'))}}</label>
                                <input type="number" name="bal_in_stores_423_csc" value="{{$monthlyStockSummery->bal_in_stores_423_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_426_csc'))}}</label>
                                <input type="number" name="bal_in_stores_426_csc" value="{{$monthlyStockSummery->bal_in_stores_426_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_429_csc'))}}</label>
                                <input type="number" name="bal_in_stores_429_csc" value="{{$monthlyStockSummery->bal_in_stores_429_csc}}" class="form-control" >
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" name="total" value="{{$monthlyStockSummery->total}}" class="form-control" >
                            </div>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


