@extends('layouts.page')
@section('page-title', 'Consumer')

@section('breadcrumb-item','Consumer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlyStockSummeryMpr.update', $monthlyStockSummeryMpr->id)}}" method="post">
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
                                <input type="date" name="date" value="{{$monthlyStockSummeryMpr->date}}" class="form-control" >
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Btn'))}}</label>
                                <select class="form-control" name="btn">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}" @if($btn_name == $monthlyStockSummeryMpr->btn) selected @endif>{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'type_of_cards'))}}</label>
                                <select class="form-control" name="type_of_cards">
                                    @foreach(\App\Models\User::cards() as $dist)
                                        <option value="{{$dist}}" @if($monthlyStockSummeryMpr->type_of_cards == $dist) selected @endif>{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'denom'))}}</label>
                                <select class="form-control" name="denom">
                                    <optgroup label="SCOM">
                                        <option value="Rs 50" @if( $monthlyStockSummeryMpr->denom =='Rs 50') selected @endif>Rs 50</option>
                                        <option value="Rs 100" @if( $monthlyStockSummeryMpr->denom =='Rs 100') selected @endif>Rs 100</option>
                                        <option value="Rs 200" @if( $monthlyStockSummeryMpr->denom =='Rs 200') selected @endif>Rs 200</option>
                                        <option value="Rs 300" @if( $monthlyStockSummeryMpr->denom =='Rs 300') selected @endif>Rs 300</option>
                                        <option value="Rs 300 (Super Card)" @if( $monthlyStockSummeryMpr->denom =='Rs 300 (Super Card)') selected @endif>Rs 300 (Super Card)</option>
                                        <option value="Rs 349 (Super Card)" @if( $monthlyStockSummeryMpr->denom =='Rs 349 (Super Card)') selected @endif>Rs 349 (Super Card) </option>
                                        <option value="Rs 500" @if( $monthlyStockSummeryMpr->denom =='Rs 500') selected @endif>Rs 500</option>
                                        <option value="Rs 500 (Super Card)" @if( $monthlyStockSummeryMpr->denom =='Rs 500 (Super Card)') selected @endif>Rs 500 (Super Card)</option>
                                        <option value="Rs 549 (Super Card)" @if( $monthlyStockSummeryMpr->denom =='Rs 549 (Super Card)') selected @endif>Rs 549 (Super Card)</option>
                                        <option value="Rs 1000" @if( $monthlyStockSummeryMpr->denom =='Rs 1000') selected @endif>Rs 1000</option>
                                    </optgroup>


                                    <optgroup label="CDMA">
                                        <option value="Rs 100" @if( $monthlyStockSummeryMpr->denom == "Rs 100") selected @endif>Rs 100</option>
                                        <option value="Rs 300" @if( $monthlyStockSummeryMpr->denom == "Rs 300") selected @endif>Rs 300</option>
                                        <option value="Rs 500" @if( $monthlyStockSummeryMpr->denom == "Rs 500") selected @endif>Rs 500</option>
                                        <option value="249 UNIT" @if( $monthlyStockSummeryMpr->denom == "249 UNIT") selected @endif>249 UNIT</option>
                                        <option value="499 UNIT" @if( $monthlyStockSummeryMpr->denom == "499 UNIT") selected @endif>499 UNIT</option>
                                        <option value="1499 UNIT" @if( $monthlyStockSummeryMpr->denom == "1499 UNIT") selected @endif>1499 UNIT</option>
                                        <option value="WLL Rs 50" @if( $monthlyStockSummeryMpr->denom == "WLL Rs 50") selected @endif>WLL Rs 50</option>
                                        <option value="WLL Rs 100" @if( $monthlyStockSummeryMpr->denom == "WLL Rs 100") selected @endif>WLL Rs 100</option>
                                        <option value="WLL Rs 300" @if( $monthlyStockSummeryMpr->denom == "WLL Rs 300") selected @endif>WLL Rs 300</option>
                                    </optgroup>


                                    <optgroup label="PPCCs">
                                        <option value="Rs 50" @if( $monthlyStockSummeryMpr->denom == "Rs 50") selected @endif>Rs 50</option>
                                        <option value="Rs 100" @if( $monthlyStockSummeryMpr->denom == "Rs 100") selected @endif>Rs 100</option>
                                        <option value="Rs 200" @if( $monthlyStockSummeryMpr->denom == "Rs 200") selected @endif>Rs 200</option>
                                        <option value="Rs 300" @if( $monthlyStockSummeryMpr->denom == "Rs 300") selected @endif>Rs 300</option>
                                        <option value="Rs 500" @if( $monthlyStockSummeryMpr->denom == "Rs 500") selected @endif>Rs 500</option>
                                    </optgroup>



                                    <optgroup label="DSL">
                                        <option value="Rs 100" @if( $monthlyStockSummeryMpr->denom == "Rs 100") selected @endif>Rs 100</option>
                                        <option value="Rs 500" @if( $monthlyStockSummeryMpr->denom =="Rs 500" ) selected @endif>Rs 500</option>
                                        <option value="Rs 1000" @if( $monthlyStockSummeryMpr->denom == "Rs 1000") selected @endif>Rs 1000</option>
                                    </optgroup>

                                    <optgroup label="SIMs">
                                        <option value="SCOM SIM 2G/3G" @if( $monthlyStockSummeryMpr->denom == "SCOM SIM 2G/3G") selected @endif>SCOM SIM 2G/3G</option>
                                        <option value="SCOM SIM 4G" @if( $monthlyStockSummeryMpr->denom == "SCOM SIM 4G") selected @endif>SCOM SIM 4G</option>
                                        <option value="Blank SIM 2G/3G" @if( $monthlyStockSummeryMpr->denom == "Blank SIM 2G/3G") selected @endif>Blank SIM 2G/3G</option>
                                        <option value="Blank SIM 4G" @if( $monthlyStockSummeryMpr->denom == "Blank SIM 4G") selected @endif>Blank SIM 4G</option>
                                        <option value="Samsung Chip 128K" @if( $monthlyStockSummeryMpr->denom == "Samsung Chip 128K") selected @endif>Samsung Chip 128K</option>
                                        <option value="Post paid SIM" @if( $monthlyStockSummeryMpr->denom == "Post paid SIM") selected @endif>Post paid SIM</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_424_csc'))}}</label>
                                <input type="number" name="previous_balance_424_csc" value="{{$monthlyStockSummeryMpr->previous_balance_424_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_428_csc'))}}</label>
                                <input type="number" name="previous_balance_428_csc" value="{{$monthlyStockSummeryMpr->previous_balance_428_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_432_csc'))}}</label>
                                <input type="number" name="previous_balance_432_csc" value="{{$monthlyStockSummeryMpr->previous_balance_432_csc}}" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="previous_balance_64csb"  value="{{$monthlyStockSummeryMpr->previous_balance_64csb}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Total'))}}</label>
                                <input type="number" name="previous_balance_total"  value="{{$monthlyStockSummeryMpr->previous_balance_total}}" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_424_csc'))}}</label>
                                <input type="number" name="received_during_month_424_csc" value="{{$monthlyStockSummeryMpr->received_during_month_424_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_428_csc'))}}</label>
                                <input type="number" name="received_during_month_428_csc" value="{{$monthlyStockSummeryMpr->received_during_month_428_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_432_csc'))}}</label>
                                <input type="number" name="received_during_month_432_csc" value="{{$monthlyStockSummeryMpr->received_during_month_432_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="received_during_month_64csb" value="{{$monthlyStockSummeryMpr->received_during_month_64csb}}"  class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_424_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_424_csc" value="{{$monthlyStockSummeryMpr->sold_unit_outlets_424_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_428_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_428_csc" value="{{$monthlyStockSummeryMpr->sold_unit_outlets_428_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_432_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_432_csc" value="{{$monthlyStockSummeryMpr->sold_unit_outlets_432_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="sold_unit_outlets_64csb" value="{{$monthlyStockSummeryMpr->sold_unit_outlets_64csb}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" name="sold_unit_outlets_total" value="{{$monthlyStockSummeryMpr->sold_unit_outlets_total}}" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Unit Sold Franchisee MZD'))}}</label>
                                <input type="number" name="sold_franchisee_mzd" value="{{$monthlyStockSummeryMpr->sold_franchisee_jarral_mpr}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Unit Sold Franchisee BAGH'))}}</label>
                                <input type="number" name="sold_franchisee_bagh" value="{{$monthlyStockSummeryMpr->sold_franchisee_kti}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Unit Sold Franchisee BAGH'))}}</label>
                                <input type="number" name="sold_franchisee_bagh" value="{{$monthlyStockSummeryMpr->sold_franchisee_fahad_bhr}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Unit Sold Franchisee BAGH'))}}</label>
                                <input type="number" name="sold_franchisee_bagh" value="{{$monthlyStockSummeryMpr->sold_franchisee_baig_krt}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Unit Sold Franchisee RKT'))}}</label>
                                <input type="number" name="sold_franchisee_rkt" value="{{$monthlyStockSummeryMpr->sold_franchisee_dadyal}}" class="form-control" >
                            </div>
                        </div>





                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_424_csc'))}}</label>
                                <input type="number" name="bal_in_stores_424_csc" value="{{$monthlyStockSummeryMpr->bal_in_stores_424_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_428_csc'))}}</label>
                                <input type="number" name="bal_in_stores_428_csc" value="{{$monthlyStockSummeryMpr->bal_in_stores_428_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_432_csc'))}}</label>
                                <input type="number" name="bal_in_stores_432_csc" value="{{$monthlyStockSummeryMpr->bal_in_stores_432_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="bal_in_stores_64csb" value="{{$monthlyStockSummeryMpr->bal_in_stores_64csb}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" name="bal_in_stores_total" value="{{$monthlyStockSummeryMpr->bal_in_stores_total}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'grand total'))}}</label>
                                <input type="number" name="total" value="{{$monthlyStockSummeryMpr->total}}" class="form-control" >
                            </div>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


