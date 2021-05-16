@extends('layouts.page')
@section('page-title', 'BTS Profile')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('bts-tower.index')}}" method="get">
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
                        <label>{{strtoupper(str_replace('_',' ', 'service_type'))}}</label>
                        <select class="form-control" name="filter[service_type]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::service_type() as $service_type)
                                <option value="{{$service_type}}">{{$service_type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mt-2">
                        <label>{{strtoupper(str_replace('_',' ', 'connectivity'))}}</label>
                        <select class="form-control" name="filter[connectivity]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::connectivity() as $connectivity)
                                <option value="{{$connectivity}}">{{$connectivity}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mt-2">
                        <label>{{strtoupper(str_replace('_',' ', 'manned/unmanned'))}}</label>
                        <select class="form-control" name="filter[manned_unmanned]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::manned_unmanned() as $manned_unmanned)
                                <option value="{{$manned_unmanned}}">{{$manned_unmanned}}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="col-md-3 mt-2">
                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="filter[district]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3 mt-2">
                        <label>Location Site</label>
                        <input class="form-control" type="text" name="filter[location_site]">
                    </div>

                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
            </form>

                <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">BTS Profile</h2>
                <br>
                <table id="example" class="display nowrap table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                         @if(auth()->user()->role != "Sector HQ")
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                         @endif
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'location_site'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'service_type'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'connectivity'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'manned/unmanned'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'revenue'))}}</th>
                        <th class="d-print-none"  >{{strtoupper(str_replace('_',' ', 'EDIT'))}}</th>
                        <th class="d-print-none" > {{strtoupper(str_replace('_',' ', 'DELETE'))}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                             @if(auth()->user()->role != "Sector HQ")
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>
                             @endif
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->location_site}}</td>
                            <td>{{$coll->service_type}}</td>
                            <td>{{$coll->connectivity}}</td>
                            <td>{{$coll->manned_unmanned}}</td>
                            <td>{{($coll->revenue / 1000000)}} M</td>
                            <td class="text-center  d-print-none"><a href="{{route('bts-tower.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center  d-print-none">
                                <form action="{{route('bts-tower.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    @if($collection->isNotEmpty())
                        <tr>
                            <td colspan="7" class="text-right font-weight-bold">Total</td>
                            <td>{{number_format(($collection->sum('revenue')/1000000),2)}} Million</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


