@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('weeklyProgressSpc.update',$weeklyProgressSpc->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$weeklyProgressSpc->date}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                    <option value="{{$company_name_without_code}}" @if($company_name_without_code == $weeklyProgressSpc->aor) selected @endif>{{$company_name_without_code}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_instl_through_spc'))}}</label>
                                <input type="number" step="any" min="0" name="sphone_instl_through_spo" class="form-control" value="{{$weeklyProgressSpc->sphone_instl_through_spo}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'instl_during_week'))}}</label>
                                <input type="number" step="any" min="0" name="instl_during_week" class="form-control" value="{{$weeklyProgressSpc->instl_during_week}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                                <input type="number" step="any" min="0" name="total" class="form-control" value="{{$weeklyProgressSpc->total}}">
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'remarks'))}}</label>
                                <textarea name="remarks" class="form-control">{{$weeklyProgressSpc->remarks}}</textarea>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


