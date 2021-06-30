@extends('layouts.page')
@section('page-title', 'Fortnightly CDMA')

@section('breadcrumb-item','Fortnightly CDMA')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Fortnightly Report Cdma</h2>
                <br>
                <form action="{{route('fortnightlyReportCdma.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                    <option value="{{$company_name_without_code}}">{{$company_name_without_code}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'previous_hh'))}}</label>
                                <input type="number" step="any" min="0" name="previous_hh" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'previous_dt'))}}</label>
                                <input type="number" step="any" min="0" name="previous_dt" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'fortnightly_hh'))}}</label>
                                <input type="number" step="any" min="0" name="fortnightly_hh" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'fortnightly_dt'))}}</label>
                                <input type="number" step="any" min="0" name="fortnightly_dt" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_hh'))}}</label>
                                <input type="number" step="any" min="0" name="total_hh" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_dt'))}}</label>
                                <input type="number" step="any" min="0" name="total_dt" class="form-control">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


