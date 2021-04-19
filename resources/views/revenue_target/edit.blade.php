@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('revenue-target.update', $revenueTarget->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$revenueTarget->date}}">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($btn_name == $revenueTarget->btn) selected @endif>{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}" @if($company_name == $revenueTarget->company) selected @endif>{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                            <select class="form-control" name="district">
                                <option value="">None</option>
                                @foreach(\App\Models\User::district() as $dist)
                                    <option value="{{$dist}}" @if($dist == $revenueTarget->district) selected @endif>{{$dist}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', '4g_asg'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->fourg_asg}}" name="fourg_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', '4g_ach'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->fourg_ach}}" name="fourg_ach" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'snet_asg'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->snet_asg}}" name="snet_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'snet_ach'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->snet_ach}}" name="snet_ach" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_asg'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->sphone_asg}}" name="sphone_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sphone_ach'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->sphone_ach}}" name="sphone_ach" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_asg'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->dxx_asg}}" name="dxx_asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_ach'))}}</label>
                                <input type="number" step="any" min="0" value="{{$revenueTarget->dxx_ach}}" name="dxx_ach" class="form-control">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


