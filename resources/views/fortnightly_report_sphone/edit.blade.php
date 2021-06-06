@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('fortnightlyReportSphone.update',$fortnightlyReportSphone->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$fortnightlyReportSphone->date}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($region_court_case == $fortnightlyReportSphone->aor) selected @endif>{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cap'))}}</label>
                                <input type="number" step="any" min="0" name="cap" value="{{$fortnightlyReportSphone->cap}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'working_connection'))}}</label>
                                <input type="number" step="any" min="0" name="working_connection" value="{{$fortnightlyReportSphone->working_connection}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                                <input type="number" step="any" min="0" name="ntc" value="{{$fortnightlyReportSphone->ntc}}" class="form-control">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc'))}}</label>
                                <input type="number" step="any" min="0" name="pmc" value="{{$fortnightlyReportSphone->pmc}}" class="form-control">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntcs_till_date'))}}</label>
                                <input type="number" step="any" min="0" name="ntcs" value="{{$fortnightlyReportSphone->ntcs}}" class="form-control">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc_restored_till_date'))}}</label>
                                <input type="number" step="any" min="0" name="pmc_restored" value="{{$fortnightlyReportSphone->pmc_restored}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_till_date'))}}</label>
                                <input type="number" step="any" min="0" name="total" value="{{$fortnightlyReportSphone->total}}" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


