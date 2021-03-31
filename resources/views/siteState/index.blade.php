@extends('layouts.page')
@section('page-title', 'Site State Wise')

@section('breadcrumb-item','Site State Wise')

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
                        <th>{{strtoupper(str_replace('_',' ', 'type'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'btn_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'site_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_monthly_revenue'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_number_of_hour_site_switched_off'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'month'))}}</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->type}}</td>
                            <td>{{$coll->btn_name}}</td>
                            <td>{{$coll->site_name}}</td>
                            <td>{{$coll->total_monthly_revenue}}</td>
                            <td>{{$coll->total_number_of_hour_site_switched_off}}</td>
                            <td>{{\Carbon\Carbon::parse($coll->month)->format('d-M-Y')}}</td>
                            <td class="text-center"><a href="{{route('siteState.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td  class="text-center">
                                <form action="{{route('siteState.destroy',$coll->id)}}" method="post">
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


