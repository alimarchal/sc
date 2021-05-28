@extends('layouts.page')
@section('page-title', 'Monthly DSL Rev')

@section('breadcrumb-item','Monthly DSL Rev')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Monthly DSL Rev / Type of DSL Subs Report</h2>
                <br>
                <form action="{{route('monthlyDslRevAotr.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" >{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                                <select class="form-control" name="company">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::company_name() as $company_name)
                                        <option value="{{$company_name}}" >{{$company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'new_dsl_connections'))}}</label>
                                <input type="number"  step="any" min="0" name="new_dsl_connections" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_working_connection'))}}</label>
                                <input type="number" step="any"  min="0" name="total_working_connection" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'modem_charges'))}}</label>
                                <input type="number" step="any" min="0" name="modem_charges" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'svc_charges'))}}</label>
                                <input type="number" step="any" min="0" name="svc_charges" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" step="any" min="0" name="total" class="form-control">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection


