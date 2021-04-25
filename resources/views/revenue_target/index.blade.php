@extends('layouts.page')
@section('page-title', 'Revenue Target & Achieved')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('revenue-target.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'AOR'))}}</label>
                        <select class="form-control" name="filter[aor]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
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
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'scom_asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'scom_ach'))}}</th>
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
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>
                            <td>{{$coll->aor}}</td>
                            <td>{{number_format(($coll->scom_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->scom_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->snet_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->snet_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->sphone_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->sphone_ach/1000000),3)}} m</td>
                            <td>{{number_format(($coll->dxx_asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->dxx_ach/1000000),3)}} m</td>

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
                            <td>{{number_format(($collection->sum('scom_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('scom_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('snet_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('snet_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('sphone_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('sphone_ach')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('dxx_asg')/1000000),3)}} m</td>
                            <td>{{number_format(($collection->sum('dxx_ach')/1000000),3)}} m</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


