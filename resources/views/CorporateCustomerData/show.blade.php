@extends('layouts.page')
@section('page-title', 'Corporate Customer')

@section('breadcrumb-item','Corporate Customer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <a href="{{route('consumerComplaints.index')}}" class="btn btn-success">Back</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nature of Complaint</th>
                        <th>No of Complaints</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Complaints sruption in svcs, repeated fault/disruption in svcs, elec outage of svc.</td>
                        <td>{{$consumerComplaint->fault}}</td>
                    </tr>

                    <tr>
                        <td>Provn of svcs incl complaints relating to new svcs, activation of svcs/ packages. Restoration of svcs/packages. Closure/termination of svcs. Upgradation of svcs/packages, shifting of svcs.</td>
                        <td>{{$consumerComplaint->proven_svcs}}</td>
                    </tr>
                    <tr>
                        <td>QOS issues incl complaints relating to fault/disruption in svcs. Reated fault/disruption in svcs, poor NW quality noise, call drops, svc disruption during elec outages, lengthly outages of svcs.</td>
                        <td>{{$consumerComplaint->qos}}</td>
                    </tr>
                    <tr>
                        <td>Matter related to billing incl complaints relating to overcharging/ 60 njustified deductions/tariffs/wrong billing. Late/non delivery of ills, billing without provn of svcs/fake connections. billing during lengthy outages. Misuse of line. </td>
                        <td>{{$consumerComplaint->matter_related}}</td>
                    </tr>
                    <tr>
                        <td>Misuse of svc incl complaints relating to obnoxious calls/SMS. Fraudulent calls/SMS without tfr of credit. Fraudulent call/SMS with tfr of credit. Unsolicited calls/SMSs. Complaints against short codes.  </td>
                        <td>{{$consumerComplaint->misuse}}</td>
                    </tr>
                    <tr>
                        <td>Value added svcs/packages incl complaints relating to svcs -without user consent e.g. pre activation of VAS. Delayed activation of package. Discrepancy in promotional schemes, prepaid cards, values added.</td>
                        <td>{{$consumerComplaint->value_added}}</td>
                    </tr>
                    <tr>
                        <td>Non provn of svc in an area/coverage issues incl complaints relating to non aval of telecom svcs in an area.  </td>
                        <td>{{$consumerComplaint->non_proven}}</td>
                    </tr>
                    <tr>
                        <td>Refund of amount related complaints. </td>
                        <td>{{$consumerComplaint->refund}}</td>
                    </tr>
                    <tr>
                        <td>Verification issues incl complaints relating to change/updation in usage data / registration of connection.  </td>
                        <td>{{$consumerComplaint->verification}}</td>
                    </tr>
                    <tr>
                        <td>Misleading statements incl complaints relating to misleading I advertisement hiding facts about svc / tariffs. td>
                        <td>{{$consumerComplaint->misleading}}</td>
                    </tr>
                    <tr>
                        <td>Poor customer svcs incl complaints relating to poor helpline / customer care svcs poor redressal of grievances. </td>
                        <td>{{$consumerComplaint->poor_customer}}</td>
                    </tr>
                    <tr>
                        <td>Miscellaneous issues. </td>
                        <td>{{$consumerComplaint->misc}}</td>
                    </tr>

                    <tr>
                        <td>Total</td>
                        <td>{{$consumerComplaint->total}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection


