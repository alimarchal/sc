@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('weeklyProgressSpcSphone.update',$weeklyProgressSpcSphone->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{strtoupper(str_replace('_',' ', 'date_of_instl'))}}</label>
                                    <input type="date" name="date" class="form-control" value="{{$weeklyProgressSpcSphone->date}}">
                                </div>
                            </div>

                            <div class="col-3">
                                <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                                <select class="form-control" name="aor">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                        <option value="{{$company_name_without_code}}" @if($company_name_without_code == $weeklyProgressSpcSphone->aor) selected @endif>{{$company_name_without_code}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{strtoupper(str_replace('_',' ', 'telephone_no'))}}</label>
                                    <input type="number" step="any" min="0" name="telephone_no" class="form-control" value="{{$weeklyProgressSpcSphone->telephone_no}}">
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{strtoupper(str_replace('_',' ', 'name_and_address'))}}</label>
                                    <input type="number" step="any" min="0" name="name_and_address" class="form-control" value="{{$weeklyProgressSpcSphone->name_and_address}}">
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{strtoupper(str_replace('_',' ', 'security_fee'))}}</label>
                                    <input type="number" step="any" min="0" name="security_fee" class="form-control" value="{{$weeklyProgressSpcSphone->security_fee}}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


