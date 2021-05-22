@extends('layouts.page')
@section('page-title', 'Franchise Wise Target')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">

        <div class="col-12">
            <form class=" d-print-none" action="{{route('franchiseWiseRevenue.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>


                    <div class="col-md-3">
                        <label>AOR</label>
                        <input class="form-control" type="text" name="filter[aor_district]">
                    </div>
{{--                    <div class="col-md-3">--}}
{{--                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>--}}
{{--                        <select class="form-control" name="filter[aor_district]">--}}
{{--                            <option value="">None</option>--}}
{{--                            @foreach(\App\Models\User::district() as $dist)--}}
{{--                                <option value="{{$dist}}">{{$dist}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="col-md-3">
                        <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                        <select class="form-control" name="filter[btn_name]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>{{strtoupper(str_replace('_',' ', 'revenue_target'))}}</label>
                            <select class="form-control" name="filter[card_type]">
                                <option value="">None</option>
                                @foreach(\App\Models\User::card_type() as $card_type)
                                    <option value="{{$card_type}}">{{$card_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>Name of Franchise</label>
                        <input class="form-control" type="text" name="filter[name_of_franchise]">
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
                        <th>{{strtoupper(str_replace('_',' ', 'revenue_target'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'name_of_franchise'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'asg'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ach'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
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
                            <td>{{$coll->card_type}}</td>
                            <td>{{$coll->name_of_franchise}}</td>
                            <td>{{$coll->aor_district}}</td>
                            <td>{{number_format(($coll->asg/1000000),3)}} m</td>
                            <td>{{number_format(($coll->ach/1000000),3)}} m</td>
                            <td>{{\Carbon\Carbon::parse($coll->date)->format('d-M-Y')}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <td class="text-center d-print-none"><a href="{{route('franchiseWiseRevenue.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td  class="text-center  d-print-none">
                                <form action="{{route('franchiseWiseRevenue.destroy',$coll->id)}}" method="post">
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


