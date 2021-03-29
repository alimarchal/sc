@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('consumerComplaints.index')}}" method="get">
                <div class="form-group">
                    <label>{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>
                    <select class="form-control" name="filter[loc_of_csc]">
                        @foreach(\App\Models\User::district() as $dist)
                            <option value="{{$dist}}">{{$dist}}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="submit" class="btn btn-danger">
                </div>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>

                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'btn_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'client_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'no_of_connections'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'remarks'))}}</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->btn_name}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->client_name}}</td>
                            <td>{{$coll->no_of_connections}}</td>
                            <td>{{$coll->remarks}}</td>
                            <td class="text-center"><a href="{{route('monthlyReportPostPaid.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                            <td  class="text-center">

                                <form action="{{route('monthlyReportPostPaid.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


