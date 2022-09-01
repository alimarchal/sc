@extends('layouts.page')
@section('page-title', 'Allocation of Sale TGT - WLL / SCO CDMA')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('allocationSaleTgt.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
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
                <h2 class="text-center">Allocation of Sale TGT - WLL / SCO CDMA</h2>
                <br>

                <table id="example" class="display nowrap table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'date'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'bn'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'exchange name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'WLL_cards_tgt (m)'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'WLL_cards_achieved (m)'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'WLL_connection_tgt'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'WLL_connection_achieved '))}}</th>
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
                            <td>{{$coll->btn}} </td>
                            <td>{{$coll->name}}</td>
                            <td>{{number_format(($coll->will_cards_tgt/1000000),3)}} </td>
                            <td>{{number_format(($coll->will_cards_achieved/1000000),3)}} </td>
                            <td>{{number_format($coll->will_connection_tgt,2)}} </td>
                            <td>{{number_format($coll->will_connection_achieved,2)}} </td>

                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('allocationSaleTgt.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center  d-print-none">
                                    <form action="{{route('allocationSaleTgt.destroy',$coll->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    @if($collection->isNotEmpty())
                        <tr>

                            @if((auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @else
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @endif
                            <td>{{number_format(($collection->sum('will_cards_tgt')/1000000),3)}}</td>
                            <td>{{number_format(($collection->sum('will_cards_achieved')/1000000),3)}}</td>
                            <td>{{number_format($collection->sum('will_connection_tgt'),2)}}</td>
                            <td>{{number_format($collection->sum('will_connection_achieved'),2)}}</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


