@extends('layouts.page')
@section('page-title', 'Revenue Target & Achieved')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('revenue-target.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Company'))}}</label>
                        <select class="form-control" name="filter[company]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::company_name() as $company_name)
                                <option value="{{$company_name}}">{{$company_name}}</option>
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
                <br>
                <br>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Revenue Target & Achieved</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '4g_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '4g_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'snet_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'snet_ach'))}}</th>

                        <th>{{strtoupper(str_replace('_',' ', 'sphone_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'sphone_ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'dxx_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'dxx_ach'))}}</th>
                        <th colspan="2">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('d-M-Y')}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->fourg_asg}}</td>
                            <td>{{$coll->fourg_ach}}</td>
                            <td>{{$coll->snet_asg}}</td>
                            <td>{{$coll->snet_ach}}</td>
                            <td>{{$coll->sphone_asg}}</td>
                            <td>{{$coll->sphone_ach}}</td>
                            <td>{{$coll->dxx_asg}}</td>
                            <td>{{$coll->dxx_ach}}</td>

                            <td class="text-center"><a href="{{route('revenue-target.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center">
                                <form action="{{route('revenue-target.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($collection->isNotEmpty())
                        <tr>
                            <td colspan="3" class="text-right font-weight-bold">Total</td>
                            <td>{{number_format(($collection->sum('fourg_asg')),2)}}</td>
                            <td>{{number_format(($collection->sum('fourg_ach')),2)}}</td>
                            <td>{{number_format(($collection->sum('snet_asg')),2)}}</td>
                            <td>{{number_format(($collection->sum('snet_ach')),2)}}</td>
                            <td>{{number_format(($collection->sum('sphone_asg')),2)}}</td>
                            <td>{{number_format(($collection->sum('sphone_ach')),2)}}</td>
                            <td>{{number_format(($collection->sum('dxx_asg')),2)}}</td>
                            <td>{{number_format(($collection->sum('dxx_ach')),2)}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


