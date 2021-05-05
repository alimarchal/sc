@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('courtCaseAotr.index')}}" method="get">
                <div class="row">
{{--                    <div class="col-md-3">--}}
{{--                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>--}}
{{--                        <select class="form-control" name="filter[district]">--}}
{{--                            <option value="">None</option>--}}
{{--                            @foreach(\App\Models\User::district() as $dist)--}}
{{--                                <option value="{{$dist}}">{{$dist}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                        <select class="form-control" name="filter[region]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>


                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
            </form>
                <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center text-uppercase">Statement showing outstanding tels dues against defaulters</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th rowspan="2"  style="vertical-align: middle; horiz-align: center;">#</th>
                        <th rowspan="2" style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'particulars'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'case_pending'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'case_civs_suit_filed'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'case_pending_with_dues'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'cases_req_written_off'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'case_pending'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'total'))}}</th>
                        <th colspan="2"  style="vertical-align: middle; horiz-align: center;">{{strtoupper(str_replace('_',' ', 'Action'))}}</th>
                    </tr>
                    <tr class="text-center">
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;" >{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th  style="vertical-align: middle; horiz-align: center;"  class=" d-print-none">Edit</th>
                        <th   style="vertical-align: middle; horiz-align: center;" class=" d-print-none">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->particulars}}</td>
                            <td>{{$coll->case_pending_no}}</td>
                            <td>{{number_format(($coll->case_pending_amount/1000000),3)}} m</td>
                            <td>{{$coll->case_civs_suit_filed_no}}</td>
                            <td>{{number_format(($coll->case_civs_suit_filed_amount/1000000),3)}} m</td>
                            <td>{{$coll->case_pending_with_dues_no}}</td>
                            <td>{{number_format(($coll->case_pending_with_dues_amount/1000000),3)}} m</td>
                            <td>{{$coll->cases_req_written_off_no}}</td>
                            <td>{{number_format(($coll->cases_req_written_off_amount/1000000),3)}} m</td>
                            <td>{{$coll->case_pending_no_1}}</td>
                            <td>{{number_format(($coll->case_pending_amount_1/1000000),3)}} m</td>
                            <td>{{$coll->total_no}}</td>
                            <td>{{number_format(($coll->total_amount/1000000),3)}} m</td>
                            <td class=" d-print-none"><a href="{{route('courtCaseAotr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class=" d-print-none">
                                <form action="{{route('courtCaseAotr.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


