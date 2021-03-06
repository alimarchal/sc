@extends('layouts.page')
@section('page-title', 'Court Casess')

@section('breadcrumb-item','Create Court Case')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('courtCaseSecs.store')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                                <select class="form-control" name="region">
                                    @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                        <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'name_of_tri'))}}</label>
                                <input type="text" name="name_of_tri" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                                <select class="form-control" name="district">
                                    @foreach(\App\Models\User::district() as $dist)
                                        <option value="{{$dist}}">{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'tehsil'))}}</label>
                                <input type="text" name="tehsil" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'main_ecxh'))}}</label>
                                <input type="text" name="main_ecxh" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_cases_regd_in_aor'))}}</label>
                                <input type="text" name="total_cases_regd_in_aor" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'outstanding_amount_against_regd_cases'))}}</label>
                                <input type="text" name="outstanding_amount_against_regd_cases" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'amount_recovered_through_tri'))}}</label>
                                <input type="text" name="amount_recovered_through_tri" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cases_settled'))}}</label>
                                <input type="text" name="cases_settled" class="form-control">
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


