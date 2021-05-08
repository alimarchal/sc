@extends('layouts.page')
@section('page-title', 'Consumer')

@section('breadcrumb-item','Consumer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('consumerComplaints.update',$consumerComplaints->id)}}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Type'))}}</label>
                        <select class="form-control" name="type" required>
                            <option value="">None</option>
                            <option value="Basic Telephony" @if($consumerComplaints->type == 'Basic Telephony') selected @endif>Basic Telephony</option>
                            <option value="SNET" @if($consumerComplaints->type == 'SNET') selected @endif>SNET</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'BTN Name'))}}</label>
                        <select class="form-control" name="btn_name" required>
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}" @if($btn_name == $consumerComplaints->btn_name) selected @endif>{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Fault/disruption in svcs'))}}</label>
                        <input type="number" name="fault" value="{{$consumerComplaints->fault}}" class="form-control" >
                    </div>

                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Provn of svcs'))}}</label>
                        <input type="number" name="proven_svcs" value="{{$consumerComplaints->proven_svcs}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'QoS issues'))}}</label>
                        <input type="number" name="qos" value="{{$consumerComplaints->qos}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Billing/Misuse of line'))}}</label>
                        <input type="number" name="matter_related" value="{{$consumerComplaints->matter_related}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Misuse of svcs'))}}</label>
                        <input type="number" name="misuse" value="{{$consumerComplaints->misuse}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Value added svcs/packages'))}}</label>
                        <input type="number" name="value_added" value="{{$consumerComplaints->value_added}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Non provn of svcs'))}}</label>
                        <input type="number" name="non_proven" value="{{$consumerComplaints->non_proven}}" class="form-control" >
                    </div>

                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Refund of amount related complaints'))}}</label>
                        <input type="number" name="refund" value="{{$consumerComplaints->refund}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Verification issues'))}}</label>
                        <input type="number" name="verification" value="{{$consumerComplaints->verification}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Misleading statements'))}}</label>
                        <input type="number" name="misleading" value="{{$consumerComplaints->misleading}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Poor customer svcs'))}}</label>
                        <input type="number" name="poor_customer" value="{{$consumerComplaints->poor_customer}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'Miscellaneous issues'))}}</label>
                        <input type="number" name="misc" value="{{$consumerComplaints->misc}}" class="form-control" >
                    </div>


                    <div class="form-group">
                            <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                        <input type="number" name="total" value="{{$consumerComplaints->total}}" class="form-control" >
                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


