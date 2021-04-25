@extends('layouts.page')
@section('page-title', 'SPhone')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('sphone.index')}}" method="get">
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
                        <label>{{strtoupper(str_replace('_',' ', 'type_of_exchange'))}}</label>
                        <select class="form-control" name="filter[type_of_exchange]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::type_of_exchange() as $type_of_exchange)
                                <option value="{{$type_of_exchange}}">{{$type_of_exchange}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Location</label>
                        <input class="form-control" type="text" name="filter[location]">
                    </div>

                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
                <br>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">SPhone</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'month'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'company'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'location'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'type_of_exchange'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'capacity'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'wc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'vacant'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'pmc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'restored'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ntc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'f/pd'))}}s</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ldc/pd'))}}s</th>
                        <th colspan="2">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>
                            <td>{{strtoupper($coll->company)}}</td>
                            <td>{{strtoupper($coll->location)}}</td>
                            <td>{{$coll->type_of_exchange}}</td>
                            <td>{{$coll->capacity}}</td>
                            <td>{{$coll->wc}}</td>
                            <td>{{$coll->vacant}}</td>
                            <td>{{$coll->pmc}}</td>
                            <td>{{$coll->restored}}</td>
                            <td>{{$coll->ntc}}</td>
                            <td>{{$coll->f_pds}}</td>
                            <td>{{$coll->ldc_pds}}</td>
                            <td class="text-center"><a href="{{route('sphone.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center">
                                <form action="{{route('sphone.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($collection->isNotEmpty())
                        <tr>
                            <td colspan="5" class="text-right font-weight-bold">Total</td>
                            <td>{{$collection->sum('capacity')}}</td>
                            <td>{{$collection->sum('wc')}}</td>
                            <td>{{$collection->sum('vacant')}}</td>
                            <td>{{$collection->sum('pmc')}}</td>
                            <td>{{$collection->sum('restored')}}</td>
                            <td>{{$collection->sum('ntc')}}</td>
                            <td>{{$collection->sum('f_pds')}}</td>
                            <td>{{$collection->sum('ldc_pds')}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


