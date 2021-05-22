@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('corporateCustomer.index')}}" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn_name]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="filter[district]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-danger" value="Search">
            </form>
            <br>
            <br>
            <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>

            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>

                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'btn_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'customer_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'revenue'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'package_offered'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'remarks'))}}</th>

                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                        <th colspan="3" class=" d-print-none">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->btn_name}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->customer_name}}</td>
                            <td>{{$coll->revenue}}</td>
                            <td>{{$coll->package_offered}}</td>
                            <td>{{$coll->remarks}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <td class="text-center  d-print-none"><a href="{{route('corporateCustomer.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                            <td class="text-center  d-print-none">

                                <form action="{{route('corporateCustomer.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


