@extends('layouts.page')
@section('page-title', 'Customer')

@section('breadcrumb-item','Customer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('customerServiceCenter.store')}}" method="post">
                    @csrf


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                        <input type="date" name="date" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                        <select class="form-control" name="region">
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>
                        <select class="form-control" name="loc_of_csc">
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'svsc'))}}</label>
                        <select class="form-control" name="svsc">
                                <option value="S Phone">S Phone</option>
                                <option value="GSM">GSM</option>
                                <option value="CDMA/NW">CDMA/NW</option>
                                <option value="Snet">Snet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'inquiry'))}}</label>
                        <input type="number" name="inquiry" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'complaint'))}}</label>
                        <input type="number" name="complaint" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                        <input type="number" name="ntc" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'acct_closure'))}}</label>
                        <input type="number" name="acct_closure" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'bill_payment'))}}</label>
                        <input type="number" name="bill_payment" class="form-control" >
                    </div>




                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'payment_detail_receipt'))}}</label>
                        <input type="number" name="payment_detail_receipt" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'duplicate_bill'))}}</label>
                        <input type="number" name="duplicate_bill" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'card_purchases'))}}</label>
                        <input type="number" name="card_purchases" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'misc'))}}</label>
                        <input type="number" name="misc" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                        <input type="number" name="total" class="form-control" >
                    </div>




                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


