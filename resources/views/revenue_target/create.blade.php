@extends('layouts.page')
@section('page-title', 'Revenue Target & Achieved')

@section('breadcrumb-item','Revenue Target & Achieved')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Revenue Target & Achieved</h2>
                <br>
                <form action="{{route('revenue-target.store')}}" method="post">
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
                                    <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'scom_asg'))}}</label>
                                <input type="number" step="any" min="0" name="scom_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'scom_ach'))}}</label>
                                <input type="number" step="any" min="0" name="scom_ach" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'snet_asg'))}}</label>
                                <input type="number" step="any" min="0" name="snet_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'snet_ach'))}}</label>
                                <input type="number" step="any" min="0" name="snet_ach" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_asg'))}}</label>
                                <input type="number" step="any" min="0" name="sphone_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_ach'))}}</label>
                                <input type="number" step="any" min="0" name="sphone_ach" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_asg'))}}</label>
                                <input type="number" step="any" min="0" name="dxx_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_ach'))}}</label>
                                <input type="number" step="any" min="0" name="dxx_ach" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


