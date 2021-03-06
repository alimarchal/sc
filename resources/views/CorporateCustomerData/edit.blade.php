@extends('layouts.page')
@section('page-title', 'Corporate Customer Data')

@section('breadcrumb-item','Corporate Customer Data')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('corporateCustomer.update',$corporateCustomer->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" value="{{$corporateCustomer->date}}" class="form-control" >
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                                <select class="form-control" name="btn_name">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}" @if($btn_name == $corporateCustomer->btn_name) selected @endif>{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                                <select class="form-control" name="district" value="{{$corporateCustomer->district}}">
                                    @foreach(\App\Models\User::district() as $dist)
                                        <option value="{{$dist}}">{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'customer_name'))}}</label>
                                <input type="text" name="customer_name" value="{{$corporateCustomer->customer_name}}" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'revenue'))}}</label>
                                <input type="number" name="revenue" value="{{$corporateCustomer->revenue}}" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'package_offered'))}}</label>
                                <input type="text" name="package_offered" value="{{$corporateCustomer->package_offered}}" class="form-control" >
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'remarks'))}}</label>
                                <input type="text" name="remarks" value="{{$corporateCustomer->remarks}}" class="form-control" >
                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


