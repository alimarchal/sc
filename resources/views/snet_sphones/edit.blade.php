@extends('layouts.page')
@section('page-title', 'BTS Profile')

@section('breadcrumb-item','BTS Profile')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('bts-tower.update', $snetSphone->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" value="{{$snetSphone->date}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($btn_name == $snetSphone->btn) selected @endif>{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}"  @if($company_name == $snetSphone->company) selected @endif>{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                            <select class="form-control" name="district">
                                <option value="">None</option>
                                @foreach(\App\Models\User::district() as $dist)
                                    <option value="{{$dist}}"  @if($dist == $snetSphone->district) selected @endif>{{$dist}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'location/site'))}}</label>
                                <input type="text" name="location_site" value="{{$snetSphone->location_site}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'service_type'))}}</label>
                                <select class="form-control" name="service_type">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::service_type() as $service_type)
                                        <option value="{{$service_type}}" @if($service_type == $snetSphone->service_type) selected @endif>{{$service_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'connectivity'))}}</label>

                                <select class="form-control" name="connectivity">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::connectivity() as $connectivity)
                                        <option value="{{$connectivity}}" @if($connectivity == $snetSphone->connectivity) selected @endif>{{$connectivity}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'manned_unmanned'))}}</label>

                                <select class="form-control" name="manned_unmanned">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::manned_unmanned() as $manned_unmanned)
                                        <option value="{{$manned_unmanned}}" @if($manned_unmanned == $snetSphone->manned_unmanned) selected @endif>{{$manned_unmanned}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'revenue'))}}</label>
                                <input type="number" step="any" min="0" value="{{$snetSphone->revenue}}" name="revenue" class="form-control">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


