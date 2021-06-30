@extends('layouts.page')
@section('page-title', 'Sale Progress')

@section('breadcrumb-item','Sale Progress')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class="d-print-none" action="{{route('monthlySaleProgressMpr.index')}}" method="get">
                <div class="row">

                    @if(auth()->user()->role == "admin")
                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif


                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>


                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
            </form>

            <button onclick="window.print()" class="btn btn-primary float-right">Print</button>
            <br>
            <br>


            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Stock Summary MPR</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th rowspan="2">#</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'services'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'denom'))}}</th>
                        <th colspan="4">{{strtoupper(str_replace('_',' ', 'Card Sale Through Own Outlets'))}}</th>

                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet_total_cards'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet_total_revenue'))}}</th>
                        <th colspan="5">{{strtoupper(str_replace('_',' ', 'Card Sale Through Own Franchisee'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'franchisee_total_cards'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'franchisee_total_revenue'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet/_franchisee_total_cards'))}}</th>
                        <th rowspan="2">{{strtoupper(str_replace('_',' ', 'own_outlet/_franchisee_total_revenue'))}}</th>
                        @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                            <th rowspan="2" class=" d-print-none" colspan="3">Action</th>
                        @endif
                    </tr>


                    <tr class="text-center">
                        <th>{{strtoupper(str_replace('_',' ', '424'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '428'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', '432'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'sales coord'))}}</th>


                        <th>{{strtoupper(str_replace('_',' ', 'jarral_mpr'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'kti'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'fahad_bhr'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'baig_krt'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'dadyal'))}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->services}}</td>
                            <td>{{$coll->denom}}</td>
                            <td>{{$coll->card_sale_through_own_outlets_424_csc}}</td>
                            <td>{{$coll->card_sale_through_own_outlets_428_csc}}</td>
                            <td>{{$coll->card_sale_through_own_outlets_432_csc}}</td>
                            <td>{{$coll->sales_card}}</td>
                            <td>{{$coll->own_outlet_total_cards}}</td>
                            <td>{{$coll->own_outlet_total_revenue}}</td>
                            <td>{{$coll->card_sale_through_franchise_jarral_mpr}}</td>
                            <td>{{$coll->card_sale_through_franchise_kti}}</td>
                            <td>{{$coll->card_sale_through_franchise_fahad_bhr}}</td>
                            <td>{{$coll->card_sale_through_franchise_baig_krt}}</td>
                            <td>{{$coll->card_sale_through_franchise_dadyal}}</td>
                            <td>{{$coll->franchisee_total_cards}}</td>
                            <td>{{$coll->franchisee_total_revenue}}</td>
                            <td>{{$coll->own_outlet_franchisee_total_cards}}</td>
                            <td>{{$coll->own_outlet_franchisee_total_revenue}}</td>
                            @if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
                            @else
                                <td class="text-center  d-print-none"><a href="{{route('monthlySaleProgressMpr.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>

                                <td class="text-center  d-print-none">

                                    <form action="{{route('monthlySaleProgressMpr.destroy',$coll->id)}}" method="post">
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


