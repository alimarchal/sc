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
                        <label >{{strtoupper(str_replace('_',' ', 'Complaints sruption in svcs, repeated fault/disruption in svcs, elec outage of svc.'))}}</label>
                        <input type="number" name="fault" value="{{$consumerComplaints->fault}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Provn of svcs incl complaints relating to new svcs, activation of svcs/ packages. Restoration of svcs/packages. Closure/termination of svcs. Upgradation of svcs/packages, shifting of svcs.'))}}</label>
                        <input type="number" name="proven_svcs" value="{{$consumerComplaints->proven_svcs}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'QOS issues incl complaints relating to fault/disruption in svcs. Reated fault/disruption in svcs, poor NW quality noise, call drops, svc disruption during elec outages, lengthly outages of svcs.'))}}</label>
                        <input type="number" name="qos" value="{{$consumerComplaints->qos}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Matter related to billing incl complaints relating to overcharging/ 60 njustified deductions/tariffs/wrong billing. Late/non delivery of ills, billing without provn of svcs/fake connections. billing during lengthy outages. Misuse of line. '))}}</label>
                        <input type="number" name="matter_related" value="{{$consumerComplaints->matter_related}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Misuse of svc incl complaints relating to obnoxious calls/SMS. Fraudulent calls/SMS without tfr of credit. Fraudulent call/SMS with tfr of credit. Unsolicited calls/SMSs. Complaints against short codes.  '))}}</label>
                        <input type="number" name="misuse" value="{{$consumerComplaints->misuse}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Value added svcs/packages incl complaints relating to svcs -without user consent e.g. pre activation of VAS. Delayed activation of package. Discrepancy in promotional schemes, prepaid cards, values added.'))}}</label>
                        <input type="number" name="value_added" value="{{$consumerComplaints->value_added}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Non provn of svc in an area/coverage issues incl complaints relating to non aval of telecom svcs in an area.'))}}</label>
                        <input type="number" name="non_proven" value="{{$consumerComplaints->non_proven}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Refund of amount related complaints.'))}}</label>
                        <input type="number" name="refund" value="{{$consumerComplaints->refund}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Verification issues incl complaints relating to change/updation in usage data / registration of connection.'))}}</label>
                        <input type="number" name="verification" value="{{$consumerComplaints->verification}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Misleading statements incl complaints relating to misleading I advertisement hiding facts about svc / tariffs.'))}}</label>
                        <input type="number" name="misleading" value="{{$consumerComplaints->misleading}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Poor customer svcs incl complaints relating to poor helpline / customer care svcs poor redressal of grievances.'))}}</label>
                        <input type="number" name="poor_customer" value="{{$consumerComplaints->poor_customer}}" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Miscellaneous issues.'))}}</label>
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


