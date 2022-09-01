@extends('layouts.page')
@section('page-title', 'Fortnightly SPhone')

@section('breadcrumb-item','Fortnightly SPhone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">New S-Phone</h2>
                <br>
                <form action="{{route('fortnightlyReportSphone.store')}}" method="post">
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
                                <label>{{strtoupper(str_replace('_',' ', 'cap'))}}</label>
                                <input type="number" step="any" min="0" name="cap" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'working_connection'))}}</label>
                                <input type="number" step="any" min="0" name="working_connection" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                                <input type="number" step="any" min="0" name="ntc" class="form-control">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc_restored'))}}</label>
                                <input type="number" step="any" min="0" name="pmc" class="form-control">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntcs_till_date'))}}</label>
                                <input type="number" step="any" min="0" name="ntcs" class="form-control">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc_restored_till_date'))}}</label>
                                <input type="number" step="any" min="0" name="pmc_restored" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_till_date'))}}</label>
                                <input type="number" step="any" min="0" name="total" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


