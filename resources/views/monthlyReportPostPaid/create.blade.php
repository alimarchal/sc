@extends('layouts.page')
@section('page-title', 'Monthly Report PostPaid')

@section('breadcrumb-item','Monthly Report PostPaid')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlyReportPostPaid.store')}}" method="post">
                    @csrf

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
                                <label >{{strtoupper(str_replace('_',' ', 'client_name'))}}</label>
                                <input type="number" name="client_name" class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'no_of_connections'))}}</label>
                                <input type="number" name="no_of_connections" class="form-control" >
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


