@extends('layouts.page')
@section('page-title', 'Site State Wise')

@section('breadcrumb-item','Site State Wise')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('siteState.index')}}" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
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
                        <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                        <select class="form-control" name="filter[type]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::connectionType() as $connectionType)
                                <option value="{{$connectionType}}">{{$connectionType}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="col-md-3">
                        <label>Site Name</label>
                        <input class="form-control" type="text" name="filter[site_name]">
                    </div>


                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
                <br>
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
                            <td class="text-center">
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


