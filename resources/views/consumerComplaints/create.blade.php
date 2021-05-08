@extends('layouts.page')
@section('page-title', 'Consumer')

@section('breadcrumb-item','Consumer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('consumerComplaints.store')}}" method="post">
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
                                <label >{{strtoupper(str_replace('_',' ', 'Type'))}}</label>
                                <select class="form-control" name="type" required>
                                    <option value="">None</option>
                                    <option value="Basic Telephony">Basic Telephony</option>
                                    <option value="SNET">SNET</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                            <select class="form-control" name="btn_name" required>
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Fault/disruption in svcs'))}}</label>
                            <input type="number" name="fault" class="form-control" >
                        </div>
                        </div>


                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Provn of svcs'))}}</label>
                            <input type="number" name="proven_svcs" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'QoS issues'))}}</label>
                            <input type="number" name="qos" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Billing/Misuse of line'))}}</label>
                            <input type="number" name="matter_related" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Misuse of svcs'))}}</label>
                            <input type="number" name="misuse" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Value added svcs/packages'))}}</label>
                            <input type="number" name="value_added" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Non provn of svcs'))}}</label>
                            <br>
                            <br>
                            <input type="number" name="non_proven" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Refund of amount related complaints'))}}</label>
                            <input type="number" name="refund" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Verification issues'))}}</label>
                            <br>
                            <br>
                            <input type="number" name="verification" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Misleading statements'))}}</label>
                            <br>
                            <br>
                            <input type="number" name="misleading" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Poor customer svcs'))}}</label>
                            <input type="number" name="poor_customer" class="form-control" >
                        </div>
                        </div>

                        <div class="col-3">
                        <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Miscellaneous issues'))}}</label>
                            <input type="number" name="misc" class="form-control" >
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


