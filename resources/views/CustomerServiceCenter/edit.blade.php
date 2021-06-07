@extends('layouts.page')
@section('page-title', 'Customer')

@section('breadcrumb-item','Customer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('customerServiceCenter.update', $customerServiceCenter->id)}}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                        <input type="date" name="date" value="{{$customerServiceCenter->date}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                        <select class="form-control" name="region">
                            @foreach(\App\Models\User::btn_name() as $region)
                                <option value="{{$region}}" @if($region == $customerServiceCenter->region) selected @endif>{{$region}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>
                        <select class="form-control" name="loc_of_csc">
                                <option value="">None</option>
                                @foreach (\App\Models\User::line_of_csc() as $key => $value)
                                    @if($key == "Muzaffarabad")
                                        @foreach ($value as $item)
                                            <option value="{{$item}}" @if($customerServiceCenter->loc_of_csc == $item) selected @endif>{{$item}}</option>
                                        @endforeach
                                    @elseif($key == "Mirpur")
                                        @foreach ($value as $item)
                                            <option value="{{$item}}" @if($customerServiceCenter->loc_of_csc == $item) selected @endif>{{$item}}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'svsc'))}}</label>
                        <select class="form-control" name="svsc">
                            <option value="">None</option>
                            @foreach(\App\Models\User::svsc() as $svsc)
                                <option value="{{$svsc}}" @if($customerServiceCenter->svsc == $svsc) selected @endif>{{$svsc}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'inquiry'))}}</label>
                        <input type="number" name="inquiry" value="{{$customerServiceCenter->inquiry}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'complaint'))}}</label>
                        <input type="number" name="complaint" value="{{$customerServiceCenter->complaint}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                        <input type="number" name="ntc" value="{{$customerServiceCenter->ntc}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'acct_closure'))}}</label>
                        <input type="number" name="acct_closure" value="{{$customerServiceCenter->acct_closure}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'bill_payment'))}}</label>
                        <input type="number" name="bill_payment" value="{{$customerServiceCenter->bill_payment}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'payment_detail_receipt'))}}</label>
                        <input type="number" name="payment_detail_receipt" value="{{$customerServiceCenter->payment_detail_receipt}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'duplicate_bill'))}}</label>
                        <input type="number" name="duplicate_bill" value="{{$customerServiceCenter->duplicate_bill}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'card_purchases'))}}</label>
                        <input type="number" name="card_purchases" value="{{$customerServiceCenter->card_purchases}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'misc'))}}</label>
                        <input type="number" name="misc" value="{{$customerServiceCenter->misc}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                        <input type="number" name="total" value="{{$customerServiceCenter->total}}" class="form-control" >
                    </div>




                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


