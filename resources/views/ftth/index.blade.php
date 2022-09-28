@extends('layouts.page')
@section('page-title', 'FTTH')

@section('breadcrumb-item','')
@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class="d-print-none" action="{{route('ftth.index')}}" method="get">
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



                </div>

                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>
            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>

            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">FTTH</h2>
                <br>
                <table id="example1" class="display nowrap table-striped table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        @if(auth()->user()->role != "Sector HQ")
                            <th>{{strtoupper(str_replace('_',' ', 'month'))}}</th>
                        @endif
                        <th>{{strtoupper(str_replace('_',' ', 'btn'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'company'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_accts'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'NEW ACCS'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'pmc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'restored_after_pmc'))}}</th>

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
                            @if(auth()->user()->role != "Sector HQ" || auth()->user()->designation == 'Clerk' )
                                <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>
                            @endif
                            <td>{{strtoupper($coll->btn)}}</td>
                            <td>{{strtoupper($coll->company)}}</td>
                            <td>{{$coll->total_accts}}</td>
                            <td>{{$coll->new_accs}}</td>
                            <td>{{$coll->pmc}}</td>
                            <td>{{$coll->restored_after_pmc}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center d-print-none"><a href="{{route('ftth.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                                <td class="text-center d-print-none">
                                    <form action="{{route('ftth.destroy',$coll->id)}}" method="post">
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
                            @if(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @elseif (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @elseif(auth()->user()->role == "Sector HQ")
                                <td colspan="3" class="text-right font-weight-bold">Total</td>
                            @else
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                            @endif
                            <td>{{number_format($collection->sum('total_accts'),2)}}</td>
                            <td>{{number_format($collection->sum('pmc'),2)}}</td>
                            <td>{{number_format($collection->sum('restored_after_pmc'),2)}}</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>

                {{ $collection->links() }}
            </div>
        </div>
    </div>
@endsection


