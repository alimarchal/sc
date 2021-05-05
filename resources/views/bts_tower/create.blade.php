@extends('layouts.page')
@section('page-title', 'BTS Profile')

@section('breadcrumb-item','BTS Profile')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">BTS Profile</h2>
                <br>
                <form action="{{route('bts-tower.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}">{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                            <select class="form-control" name="district">
                                <option value="">None</option>
                                @foreach(\App\Models\User::district() as $dist)
                                    <option value="{{$dist}}">{{$dist}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'location/site'))}}</label>
                                <input type="text" name="location_site" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'service_type'))}}</label>
                                <select class="form-control" name="service_type">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::service_type() as $service_type)
                                        <option value="{{$service_type}}">{{$service_type}}</option>
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
                                        <option value="{{$connectivity}}">{{$connectivity}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'manned/unmanned'))}}</label>

                                <select class="form-control" name="manned_unmanned">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::manned_unmanned() as $manned_unmanned)
                                        <option value="{{$manned_unmanned}}">{{$manned_unmanned}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'revenue'))}}</label>
                                <input type="number" step="any" min="0" name="revenue" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


