@extends('layouts.page')
@section('page-title', 'Stock Summery')

@section('breadcrumb-item','Stock Summery')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlyStockSummery.store')}}" method="post">
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

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'type_of_cards'))}}</label>
                                <select class="form-control" name="type_of_cards">
                                    @foreach(\App\Models\User::cards() as $dist)
                                        <option value="{{$dist}}">{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'denom'))}}</label>
                                <select class="form-control" name="denom">
                                    <optgroup label="SCOM">
                                        <option value="Rs 50">Rs 50</option>
                                        <option value="Rs 100">Rs 100</option>
                                        <option value="Rs 200">Rs 200</option>
                                        <option value="Rs 300">Rs 300</option>
                                        <option value="Rs 300 (Super Card)">Rs 300 (Super Card)</option>
                                        <option value="Rs 349 (Super Card)">Rs 349 (Super Card) </option>
                                        <option value="Rs 500">Rs 500</option>
                                        <option value="Rs 500 (Super Card)">Rs 500 (Super Card)</option>
                                        <option value="Rs 549 (Super Card)">Rs 549 (Super Card)</option>
                                        <option value="Rs 1000">Rs 1000</option>
                                    </optgroup>


                                    <optgroup label="CDMA">
                                        <option value="Rs 100">Rs 100</option>
                                        <option value="Rs 300">Rs 300</option>
                                        <option value="Rs 500">Rs 500</option>
                                        <option value="249 UNIT">249 UNIT</option>
                                        <option value="499 UNIT">499 UNIT</option>
                                        <option value="1499 UNIT">1499 UNIT</option>
                                        <option value="WLL Rs 50">WLL Rs 50</option>
                                        <option value="WLL Rs 100">WLL Rs 100</option>
                                        <option value="WLL Rs 300">WLL Rs 300</option>
                                    </optgroup>


                                    <optgroup label="PPCCs">
                                        <option value="Rs 50">Rs 50</option>
                                        <option value="Rs 100">Rs 100</option>
                                        <option value="Rs 200">Rs 200</option>
                                        <option value="Rs 300">Rs 300</option>
                                        <option value="Rs 500">Rs 500</option>
                                    </optgroup>



                                    <optgroup label="DSL">
                                        <option value="Rs 100">Rs 100</option>
                                        <option value="Rs 500">Rs 500</option>
                                        <option value="Rs 1000">Rs 1000</option>
                                    </optgroup>

                                    <optgroup label="SIMs">
                                        <option value="SCOM SIM 2G/3G">SCOM SIM 2G/3G</option>
                                        <option value="SCOM SIM 4G">SCOM SIM 4G</option>
                                        <option value="Blank SIM 2G/3G">Blank SIM 2G/3G</option>
                                        <option value="Blank SIM 4G">Blank SIM 4G</option>
                                        <option value="Samsung Chip 128K">Samsung Chip 128K</option>
                                        <option value="Post paid SIM">Post paid SIM</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_423_csc'))}}</label>
                                <input type="number" name="previous_balance_423_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_426_csc'))}}</label>
                                <input type="number" name="previous_balance_426_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_429_csc'))}}</label>
                                <input type="number" name="previous_balance_429_csc" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_423_csc'))}}</label>
                                <input type="number" name="received_during_month_423_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_426_csc'))}}</label>
                                <input type="number" name="received_during_month_426_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_429_csc'))}}</label>
                                <input type="number" name="received_during_month_429_csc" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_423_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_423_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_426_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_426_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_429_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_429_csc" class="form-control" >
                            </div>
                        </div>




                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee MZD'))}}</label>
                                <input type="number" name="sold_franchisee_mzd" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee BAGH'))}}</label>
                                <input type="number" name="sold_franchisee_bagh" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee RKT'))}}</label>
                                <input type="number" name="sold_franchisee_rkt" class="form-control" >
                            </div>
                        </div>





                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_423_csc'))}}</label>
                                <input type="number" name="bal_in_stores_423_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_426_csc'))}}</label>
                                <input type="number" name="bal_in_stores_426_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_429_csc'))}}</label>
                                <input type="number" name="bal_in_stores_429_csc" class="form-control" >
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" name="total" class="form-control" >
                            </div>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


