@extends('layouts.page')
@section('page-title', 'Weekly Progress of (Annexure A)')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('weeklyProgressSpcSphone.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'AOR'))}}</label>
                        <select class="form-control" name="filter[aor]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                <option value="{{$company_name_without_code}}">{{$company_name_without_code}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>

            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Weekly Progress SPhone (Annexure A)</h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'telephone_no'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'name_and_address'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'security_fee'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date of install'))}}</th>
                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                        @else
                            <th class="d-print-none">{{strtoupper(str_replace('_',' ', 'EDIT'))}}</th>
                            <th class="d-print-none"> {{strtoupper(str_replace('_',' ', 'DELETE'))}}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            {{--                            @if(auth()->user()->role != "Sector HQ" || auth()->user()->designation == 'Clerk' )--}}
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('d-m-Y')}}</td>
                            {{--                            @endif--}}
                            <td>{{$coll->aor}} </td>
                            <td>{{$coll->telephone_no}} </td>
                            <td>{{$coll->name_and_address}}</td>
                            <td>{{$coll->security_fee}} </td>
                            <td>{{\Carbon\Carbon::createFromDate($coll->date_of_instl)->format('d-m-Y')}}</td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('weeklyProgressSpcSphone.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('weeklyProgressSpcSphone.destroy',$coll->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
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


