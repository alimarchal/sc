@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('courtCaseSecs.index')}}" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="filter[district]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                        <select class="form-control" name="filter[region]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Enter a Date YYYY-MM-DD,YYYY-MM-DD:</label>
                        <input class="form-control" type="text" name="filter[starts_between]" placeholder="YYYY-MM-DD,YYYY-MM-DD">
                    </div>

                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
            </form>
                <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>

            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'name_of_tri'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'tehsil'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'main_ecxh'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_cases_regd_in_aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'outstanding_amount_against_regd_cases'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'amount_recovered_through_tri'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'cases_settled'))}}</th>
                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                        <th class=" d-print-none">Edit</th>
                        <th class=" d-print-none">Delete</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->name_of_tri}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->tehsil}}</td>
                            <td>{{$coll->main_ecxh}}</td>
                            <td>{{$coll->total_cases_regd_in_aor}}</td>
                            <td>{{$coll->outstanding_amount_against_regd_cases}}</td>
                            <td>{{$coll->amount_recovered_through_tri}}</td>
                            <td>{{$coll->cases_settled}}</td>
                            @if(auth()->user()->role != "Sector HQ" || auth()->user()->designation == 'Clerk' )
                            <td class=" d-print-none"><a href="{{route('courtCaseSecs.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class=" d-print-none">
                                <form action="{{route('courtCaseSecs.destroy',$coll->id)}}" method="post">
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


