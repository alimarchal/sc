@extends('layouts.page')
@section('page-title', 'Franchise Wise Target')

@section('breadcrumb-item','Franchise Wise Target')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('franchiseWiseRevenue.store')}}" method="post">
                    @csrf

                    <div class="row">


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bn_name'))}}</label>
                                <select class="form-control" name="btn_name">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}">{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'revenue_target'))}}</label>
                                <select class="form-control" name="card_type">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::card_type() as $card_type)
                                        <option value="{{$card_type}}">{{$card_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'name_of_franchise'))}}</label>
                                <input type="text" name="name_of_franchise" class="form-control">
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                                <input type="text" name="aor_district"  class="form-control" >
{{--                                <select class="form-control" name="aor_district">--}}
{{--                                    @foreach(\App\Models\User::district() as $dist)--}}
{{--                                        <option value="{{$dist}}">{{$dist}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'asg'))}}</label>
                                <input type="number" step="any" name="asg" class="form-control">
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ach'))}}</label>
                                <input type="number" step="any" name="ach" class="form-control">
                            </div>
                        </div>

                        {{--                        <div class="col-4">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label >{{strtoupper(str_replace('_',' ', 'month'))}}</label>--}}
                        {{--                                <input type="date" name="month" class="form-control" >--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}


                    </div>


                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


