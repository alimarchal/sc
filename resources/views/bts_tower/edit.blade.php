@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','Snet/Sphone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('bts-tower.update', $btsTower->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$btsTower->date}}">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                                <select class="form-control" name="type">
                                    <option value="">None</option>
                                    <option value="snet" @if($btsTower->type == "snet") selected @endif>SNet</option>
                                    <option value="sphone" @if($btsTower->type == "sphone") selected @endif>SPhone</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($btn_name == $btsTower->btn) selected @endif>{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}"  @if($company_name == $btsTower->company) selected @endif>{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-2">
                            <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                            <select class="form-control" name="district">
                                <option value="">None</option>
                                @foreach(\App\Models\User::district() as $dist)
                                    <option value="{{$dist}}"  @if($dist == $btsTower->district) selected @endif>{{$dist}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'location_site'))}}</label>
                                <input type="text" name="location_site" value="{{$btsTower->location_site}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'capacity'))}}</label>
                                <input type="number" name="capacity" value="{{$btsTower->capacity}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'working_slots'))}}</label>
                                <input type="number" name="working_slots"  value="{{$btsTower->working_slots}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'vacant_slots'))}}</label>
                                <input type="number" name="vacant_slots"  value="{{$btsTower->vacant_slots}}"  class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'revenue'))}}</label>
                                <input type="number" step="any" min="0" value="{{$btsTower->revenue}}"  name="revenue" class="form-control">
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


