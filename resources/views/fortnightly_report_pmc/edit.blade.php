@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('fortnightlyReportPmc.update',$fortnightlyReportPmc->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$fortnightlyReportPmc->date}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                    <option value="{{$company_name_without_code}}" @if($company_name_without_code == $fortnightlyReportPmc->aor) selected @endif>{{$company_name_without_code}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc_closed'))}}</label>
                                <input type="number" step="any" min="0" name="pmc_closed" value="{{$fortnightlyReportPmc->pmc_closed}}" class="form-control">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


