@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('courtCaseAotr.index')}}" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="filter[district]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                        <select class="form-control" name="filter[region]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Enter a Date</label>
                        <input class="form-control" type="date" name="filter[date]" placeholder="YYYY-MM-DD">
                    </div>

                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
                <br>
            </form>
            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th colspan="3">{{strtoupper(str_replace('_',' ', 'case_pending_no'))}}</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'case_civs_suit_filed_no'))}}</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'case_pending_with_dues_no'))}}</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'cases_req_written_off_no'))}}</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'case_pending_no'))}}</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'total_no'))}}</th>
                        <th colspan="2">{{strtoupper(str_replace('_',' ', 'Action'))}}</th>
                    </tr>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'No'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'Amount'))}}</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->case_pending_no}}</td>
                            <td>{{$coll->case_pending_amount}}</td>
                            <td>{{$coll->case_civs_suit_filed_no}}</td>
                            <td>{{$coll->case_civs_suit_filed_amount}}</td>
                            <td>{{$coll->case_pending_with_dues_no}}</td>
                            <td>{{$coll->case_pending_with_dues_amount}}</td>
                            <td>{{$coll->cases_req_written_off_no}}</td>
                            <td>{{$coll->cases_req_written_off_amount}}</td>
                            <td>{{$coll->case_pending_no_1}}</td>
                            <td>{{$coll->case_pending_amount_1}}</td>
                            <td>{{$coll->total_no}}</td>
                            <td>{{$coll->total_amount}}</td>
                            <td><a href="{{route('courtCaseAotr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td>
                                <form action="{{route('courtCaseAotr.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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


