@extends('layouts.page')
@section('page-title', 'Monthly Stock Summery MPR')

@section('breadcrumb-item','Monthly Stock Summery MPR')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlyStockSummeryMpr.store')}}" method="post">
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
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_424_csc'))}}</label>
                                <input type="number" name="previous_balance_424_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_428_csc'))}}</label>
                                <input type="number" name="previous_balance_428_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'previous_balance_432_csc'))}}</label>
                                <input type="number" name="previous_balance_432_csc" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="previous_balance_64csb" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Total'))}}</label>
                                <input type="number" name="previous_balance_total" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_424_csc'))}}</label>
                                <input type="number" name="received_during_month_424_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_428_csc'))}}</label>
                                <input type="number" name="received_during_month_428_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'received_during_month_432_csc'))}}</label>
                                <input type="number" name="received_during_month_432_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="received_during_month_64csb" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_424_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_424_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_428_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_428_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sold_unit_outlets_432_csc'))}}</label>
                                <input type="number" name="sold_unit_outlets_432_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="sold_unit_outlets_64csb" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" name="sold_unit_outlets_total" class="form-control" >
                            </div>
                        </div>




                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee jarral_mpr'))}}</label>
                                <input type="number" name="sold_franchisee_jarral_mpr" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee kti'))}}</label>
                                <input type="number" name="sold_franchisee_kti" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee fahad_bhr'))}}</label>
                                <input type="number" name="sold_franchisee_fahad_bhr" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee baig_krt'))}}</label>
                                <input type="number" name="sold_franchisee_baig_krt" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Sold Franchisee dadyal'))}}</label>
                                <input type="number" name="sold_franchisee_dadyal" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_424_csc'))}}</label>
                                <input type="number" name="bal_in_stores_424_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_428_csc'))}}</label>
                                <input type="number" name="bal_in_stores_428_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bal_in_store_432_csc'))}}</label>
                                <input type="number" name="bal_in_stores_432_csc" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '64 csb'))}}</label>
                                <input type="number" name="bal_in_stores_64csb" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" name="bal_in_stores_total" class="form-control" >
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Grand Total'))}}</label>
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


