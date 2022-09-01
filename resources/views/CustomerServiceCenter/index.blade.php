@extends('layouts.page')
@section('page-title', 'Customer Services Center')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('customerServiceCenter.index')}}" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                        <select class="form-control" name="filter[region]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>
                        <select class="form-control" name="filter[loc_of_csc]">
                            <option value="">None</option>
                            @foreach (\App\Models\User::line_of_csc() as $key => $value)
                                    @foreach ($value as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'svsc'))}}</label>
                        <select class="form-control" name="filter[svsc]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::svsc() as $svsc)
                                <option value="{{$svsc}}">{{$svsc}}</option>
                            @endforeach
                        </select>
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
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'svsc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'inquiry'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'complaint'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ntc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'acct_closure'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'bill_payment'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'payment_detail_receipt'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'duplicate_bill'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'card_purchases'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'misc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total'))}}</th>
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
                            <td>{{$coll->loc_of_csc}}</td>
                            <td>{{$coll->svsc}}</td>
                            <td>{{$coll->inquiry}}</td>
                            <td>{{$coll->complaint}}</td>
                            <td>{{$coll->ntc}}</td>
                            <td>{{$coll->acct_closure}}</td>
                            <td>{{$coll->bill_payment}}</td>
                            <td>{{$coll->payment_detail_receipt}}</td>
                            <td>{{$coll->duplicate_bill}}</td>
                            <td>{{$coll->card_purchases}}</td>
                            <td>{{$coll->misc}}</td>
                            <td>{{$coll->total}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <td class=" d-print-none"><a href="{{route('customerServiceCenter.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class=" d-print-none">
                                <form action="{{route('customerServiceCenter.destroy',$coll->id)}}" method="post">
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


