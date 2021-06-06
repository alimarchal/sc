@extends('layouts.page')
@section('page-title', 'Weekly Progress of SPC')

@section('breadcrumb-item','Weekly Progress of SPC')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Weekly Progress of SPC</h2>
                <br>
                <form action="{{route('fortnightlyReportPmc.store')}}" method="post">
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
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc_closed'))}}</label>
                                <input type="number" step="any" min="0" name="pmc_closed" class="form-control">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


