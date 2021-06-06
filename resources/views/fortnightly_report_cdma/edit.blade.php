@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('fortnightlyReportCdma.update', $fortnightlyReportCdma->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$fortnightlyReportCdma->date}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($region_court_case == $fortnightlyReportCdma->aor) selected @endif>{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'previous_hh'))}}</label>
                                <input type="number" step="any" min="0" name="previous_hh" value="{{$fortnightlyReportCdma->previous_hh}}" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'previous_dt'))}}</label>
                                <input type="number" step="any" min="0" name="previous_dt" value="{{$fortnightlyReportCdma->previous_dt}}" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'fortnightly_hh'))}}</label>
                                <input type="number" step="any" min="0" name="fortnightly_hh" value="{{$fortnightlyReportCdma->fortnightly_hh}}" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'fortnightly_dt'))}}</label>
                                <input type="number" step="any" min="0" name="fortnightly_dt" value="{{$fortnightlyReportCdma->fortnightly_dt}}" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_hh'))}}</label>
                                <input type="number" step="any" min="0" name="total_hh" value="{{$fortnightlyReportCdma->total_hh}}" class="form-control">
                            </div>
                        </div>




                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_dt'))}}</label>
                                <input type="number" step="any" min="0" name="total_dt" value="{{$fortnightlyReportCdma->total_dt}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
