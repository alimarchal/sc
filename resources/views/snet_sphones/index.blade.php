@extends('layouts.page')
@section('page-title', 'Snet/Sphone')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('snet-sphone.index')}}" class="d-print-none" method="get">
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
                        <label>{{strtoupper(str_replace('_',' ', 'Type'))}}</label>
                        <select class="form-control" name="filter[type]">
                            <option value="">None</option>
                            <option value="sphone">SPhone</option>
                            <option value="snet">SNet</option>
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
                <h2 class="text-center">SNet/SPhones</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'type'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'location_site'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'capacity'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'working_slots'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'vacant_slots'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'revenue'))}}</th>
                        <th colspan="2">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('d-M-Y')}}</td>
                            <td>{{strtoupper($coll->type)}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->location_site}}</td>
                            <td>{{$coll->capacity}}</td>
                            <td>{{$coll->working_slots}}</td>
                            <td>{{$coll->vacant_slots}}</td>
                            <td>{{$coll->revenue}}</td>
                            <td class="text-center"><a href="{{route('snet-sphone.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center">
                                <form action="{{route('snet-sphone.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($collection->isNotEmpty())
                        <tr>
                            <td colspan="5" class="text-right font-weight-bold">Total</td>
                            <td>{{$collection->sum('capacity')}}</td>
                            <td>{{$collection->sum('working_slots')}}</td>
                            <td>{{$collection->sum('vacant_slots')}}</td>
                            <td>{{$collection->sum('revenue')}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>




            </div>
        </div>
    </div>
@endsection


