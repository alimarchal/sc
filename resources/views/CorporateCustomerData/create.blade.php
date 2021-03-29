@extends('layouts.page')
@section('page-title', 'Corporate Customer Data')

@section('breadcrumb-item','Corporate Customer Data')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('corporateCustomer.store')}}" method="post">
                    @csrf

{{--                    <div class="form-group">--}}
{{--                        <label >{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>--}}
{{--                        <select class="form-control" name="loc_of_csc">--}}
{{--                            @foreach(\App\Models\User::district() as $dist)--}}
{{--                                <option value="{{$dist}}">{{$dist}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                                <input type="number" name="btn_name" class="form-control" >
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                                <select class="form-control" name="district">
                                    @foreach(\App\Models\User::district() as $dist)
                                        <option value="{{$dist}}">{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'customer_name'))}}</label>
                                <input type="number" name="customer_name" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'revenue'))}}</label>
                                <input type="number" name="revenue" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'package_offered'))}}</label>
                                <input type="number" name="package_offered" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'remarks'))}}</label>
                                <input type="number" name="remarks" class="form-control" >
                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


