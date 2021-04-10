@extends('layouts.page')
@section('page-title', 'Site State Wise')

@section('breadcrumb-item','Site State Wise')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('siteState.update',$siteState->id)}}" method="post">
                    @csrf
                    @method('put')

                    <div class="row">




                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" value="{{$siteState->date}}" class="form-control" >
                            </div>

                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                                <select class="form-control" name="btn_name">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}" @if($btn_name == $siteState->btn_name) selected @endif>{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                                <select class="form-control" name="type">
                                    @foreach(\App\Models\User::connectionType() as $connectionType)
                                        <option value="{{$connectionType}}" @if($connectionType == $siteState->type) selected @endif>{{$connectionType}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'site_name'))}}</label>
                                <input type="text" name="site_name" value="{{$siteState->site_name}}" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total_monthly_revenue'))}}</label>
                                <input type="text" name="total_monthly_revenue" value="{{$siteState->total_monthly_revenue}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total_number_of_hour_site_switched_off'))}}</label>
                                <input type="text" name="total_number_of_hour_site_switched_off" value="{{$siteState->total_number_of_hour_site_switched_off}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'month'))}}</label>
                                <input type="date" name="month" value="{{$siteState->month}}" class="form-control" >
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


