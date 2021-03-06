@extends('layouts.page')
@section('page-title', 'Outstanding dues')

@section('breadcrumb-item','Outstanding dues')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('courtCaseAotr.store')}}" method="post">
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
                                <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                                <select class="form-control" name="region" required>
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                        <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'particulars'))}}</label>
                                <input type="text" step="any" name="particulars" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_pending_no'))}}</label>
                                <input type="number" step="any" name="case_pending_no" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_pending_amount'))}}</label>
                                <input type="number" step="any" name="case_pending_amount" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_civs_suit_filed_no'))}}</label>
                                <input type="number" step="any" name="case_civs_suit_filed_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_civs_suit_filed_amount'))}}</label>
                                <input type="number" step="any" name="case_civs_suit_filed_amount" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_pending_with_dues_no'))}}</label>
                                <input type="number" step="any" name="case_pending_with_dues_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_pending_with_dues_amount'))}}</label>
                                <input type="number" step="any" name="case_pending_with_dues_amount" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cases_req_written_off_no'))}}</label>
                                <input type="number" step="any" name="cases_req_written_off_no" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cases_req_written_off_amount'))}}</label>
                                <input type="number" step="any" name="cases_req_written_off_amount" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_pending_no_1'))}}</label>
                                <input type="number" step="any" name="case_pending_no_1" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_pending_amount_1'))}}</label>
                                <input type="number" step="any" name="case_pending_amount_1" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_no'))}}</label>
                                <input type="number" step="any" name="total_no" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_amount'))}}</label>
                                <input type="number" step="any" name="total_amount" class="form-control">
                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


