@extends('layouts.page')
@section('page-title', 'Franchise Wise Target')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">

        <div class="col-12">
            <form action="{{route('franchiseWiseRevenue.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="filter[aor_district]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                        <select class="form-control" name="btn_name">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Name of Franchise</label>
                        <input class="form-control" type="text" name="filter[name_of_franchise]">
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
                        <th>{{strtoupper(str_replace('_',' ', 'name_of_franchise'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'aor_district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'month'))}}</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->name_of_franchise}}</td>
                            <td>{{$coll->aor_district}}</td>
                            <td>{{$coll->asg}}</td>
                            <td>{{$coll->ach}}</td>
                            <td>{{\Carbon\Carbon::parse($coll->month)->format('d-M-Y')}}</td>
                            <td class="text-center"><a href="{{route('franchiseWiseRevenue.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td  class="text-center">
                                <form action="{{route('franchiseWiseRevenue.destroy',$coll->id)}}" method="post">
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


