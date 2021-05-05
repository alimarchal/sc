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

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Type'))}}</label>
                        <select class="form-control" name="type" required>
                                <option value="">None</option>
                                <option value="Basic Telephony">Basic Telephony</option>
                                <option value="SNET">SNET</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="btn_name" required>
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Complaints disruption in svcs, repeated fault/disruption in svcs, elec outage of svc.'))}}</label>
                        <input type="number" name="fault" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Provn of svcs incl complaints relating to new svcs, activation of svcs/ packages. Restoration of svcs/packages. Closure/termination of svcs. Upgradation of svcs/packages, shifting of svcs.'))}}</label>
                        <input type="number" name="proven_svcs" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'QOS issues incl complaints relating to fault/disruption in svcs. Reated fault/disruption in svcs, poor NW quality noise, call drops, svc disruption during elec outages, lengthly outages of svcs.'))}}</label>
                        <input type="number" name="qos" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Matter related to billing incl complaints relating to overcharging/ 60 njustified deductions/tariffs/wrong billing. Late/non delivery of ills, billing without provn of svcs/fake connections. billing during lengthy outages. Misuse of line. '))}}</label>
                        <input type="number" name="matter_related" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Misuse of svc incl complaints relating to obnoxious calls/SMS. Fraudulent calls/SMS without tfr of credit. Fraudulent call/SMS with tfr of credit. Unsolicited calls/SMSs. Complaints against short codes.  '))}}</label>
                        <input type="number" name="misuse" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Value added svcs/packages incl complaints relating to svcs -without user consent e.g. pre activation of VAS. Delayed activation of package. Discrepancy in promotional schemes, prepaid cards, values added.'))}}</label>
                        <input type="number" name="value_added" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Non provn of svc in an area/coverage issues incl complaints relating to non aval of telecom svcs in an area.'))}}</label>
                        <input type="number" name="non_proven" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Refund of amount related complaints.'))}}</label>
                        <input type="number" name="refund" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Verification issues incl complaints relating to change/updation in usage data / registration of connection.'))}}</label>
                        <input type="number" name="verification" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Misleading statements incl complaints relating to misleading I advertisement hiding facts about svc / tariffs.'))}}</label>
                        <input type="number" name="misleading" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Poor customer svcs incl complaints relating to poor helpline / customer care svcs poor redressal of grievances.'))}}</label>
                        <input type="number" name="poor_customer" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Miscellaneous issues.'))}}</label>
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


