@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('revenue-target.update',$revenueTarget->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$revenueTarget->date}}">
                            </div>
                        </div>



                        <div class="col-2">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($region_court_case == $revenueTarget->aor) selected @endif>{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'scom_asg'))}}</label>
                                <input type="number" step="any" min="0" name="scom_asg" value="{{$revenueTarget->scom_asg}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'scom_ach'))}}</label>
                                <input type="number" step="any" min="0" name="scom_ach" value="{{$revenueTarget->scom_ach}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'snet_asg'))}}</label>
                                <input type="number" step="any" min="0" name="snet_asg" value="{{$revenueTarget->snet_asg}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'snet_ach'))}}</label>
                                <input type="number" step="any" min="0" name="snet_ach" value="{{$revenueTarget->snet_ach}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_asg'))}}</label>
                                <input type="number" step="any" min="0" name="sphone_asg" value="{{$revenueTarget->sphone_asg}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_ach'))}}</label>
                                <input type="number" step="any" min="0" name="sphone_ach" value="{{$revenueTarget->sphone_ach}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_asg'))}}</label>
                                <input type="number" step="any" min="0" name="dxx_asg" value="{{$revenueTarget->dxx_asg}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_ach'))}}</label>
                                <input type="number" step="any" min="0" name="dxx_ach" value="{{$revenueTarget->dxx_ach}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'gpon_asg'))}}</label>
                                <input type="number" step="any" min="0" name="gpon_asg"  value="{{$revenueTarget->gpon_asg}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'gpon_ach'))}}</label>
                                <input type="number" step="any" min="0" name="gpon_ach"  value="{{$revenueTarget->gpon_ach}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_asg'))}}</label>
                                <input type="number" step="any" min="0" name="total_asg" value="{{$revenueTarget->total_asg}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_ach'))}}</label>
                                <input type="number" step="any" min="0" name="total_ach" value="{{$revenueTarget->total_ach}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'remarks'))}}</label>
                                <textarea name="remarks" class="form-control">{{$revenueTarget->remarks}}</textarea>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


