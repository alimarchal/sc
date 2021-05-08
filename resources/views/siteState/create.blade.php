@extends('layouts.page')
@section('page-title', 'Site State Wise')

@section('breadcrumb-item','Site State Wise')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('siteState.store')}}" method="post">
                    @csrf

                    <div class="row">


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'bn_name'))}}</label>
                                <select class="form-control" name="btn_name">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}">{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                                <select class="form-control" name="type">
                                    @foreach(\App\Models\User::connectionType() as $connectionType)
                                        <option value="{{$connectionType}}">{{$connectionType}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'site_name'))}}</label>
                                <input type="text" name="site_name" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total_monthly_revenue'))}}</label>
                                <input type="text" name="total_monthly_revenue" class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'total_number_of_hour_site_switched_off'))}}</label>
                                <input type="text" name="total_number_of_hour_site_switched_off" class="form-control" >
                            </div>
                        </div>



                    </div>


                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


