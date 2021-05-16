@extends('layouts.page')
@section('page-title', 'SPhone')

@section('breadcrumb-item','')
@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class="d-print-none" action="{{route('sphone.index')}}" method="get">
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

                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>
                <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">SPhone</h2>
                <br>
                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                         @if(auth()->user()->role != "Sector HQ")
                        <th>{{strtoupper(str_replace('_',' ', 'month'))}}</th>
                         @endif
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
                            <td class="text-center d-print-none"><a href="{{route('sphone.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center d-print-none" >
                                <form action="{{route('sphone.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
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
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


