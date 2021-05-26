@extends('layouts.page')
@section('page-title', 'Monthly DSL Rev')

@section('breadcrumb-item','Monthly DSL Rev')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlyDslRevAotr.update',$monthlyDslRevAotr->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$monthlyDslRevAotr->date}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($monthlyDslRevAotr->aor == $region_court_case) selected @endif >{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                                <select class="form-control" name="company">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::company_name() as $company_name)
                                        <option value="{{$company_name}}" @if($monthlyDslRevAotr->company == $company_name) selected @endif >{{$company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'new_dsl_connections'))}}</label>
                                <input type="number" value="{{$monthlyDslRevAotr->new_dsl_connections}}" step="any" min="0" name="new_dsl_connections" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_working_connection'))}}</label>
                                <input type="number" step="any" value="{{$monthlyDslRevAotr->total_working_connection}}" min="0" name="total_working_connection" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'modem_charges'))}}</label>
                                <input type="number" step="any" min="0" name="modem_charges" value="{{$monthlyDslRevAotr->modem_charges}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'svc_charges'))}}</label>
                                <input type="number" step="any" min="0" name="svc_charges" value="{{$monthlyDslRevAotr->svc_charges}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" step="any" min="0" name="total" value="{{$monthlyDslRevAotr->total}}" class="form-control">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection


