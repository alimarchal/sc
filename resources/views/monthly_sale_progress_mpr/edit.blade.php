@extends('layouts.page')
@section('page-title', 'Sale Progress')

@section('breadcrumb-item','Sale Progress')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('monthlySaleProgressMpr.update', $monthlySaleProgressMpr->id)}}" method="post">
                    @csrf
                    @method('put')

                    {{--                    <div class="form-group">--}}
                    {{--                        <label >{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>--}}
                    {{--                        <select class="form-control" name="loc_of_csc">--}}
                    {{--                            @foreach(\App\Models\User::district() as $dist)--}}
                    {{--                                <option value="{{$dist}}">{{$dist}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}

                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" value="{{$monthlySaleProgressMpr->date}}" class="form-control" >
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'Btn'))}}</label>
                                <select class="form-control" name="btn">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}" @if($btn_name == $monthlySaleProgressMpr->btn) selected @endif>{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @livewire('denom')

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '424 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_424_csc" value="{{$monthlySaleProgressMpr->card_sale_through_own_outlets_424_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '426 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_428_csc" value="{{$monthlySaleProgressMpr->card_sale_through_own_outlets_428_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', '429 CSC'))}}</label>
                                <input type="number" name="card_sale_through_own_outlets_432_csc" value="{{$monthlySaleProgressMpr->card_sale_through_own_outlets_432_csc}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'sale coord'))}}</label>
                                <input type="number" name="sales_card" class="form-control"  value="{{$monthlySaleProgressMpr->sales_card}}" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_total_cards'))}}</label>
                                <input type="number" name="own_outlet_total_cards" value="{{$monthlySaleProgressMpr->own_outlet_total_cards}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet_total_revenue'))}}</label>
                                <input type="number" name="own_outlet_total_revenue" value="{{$monthlySaleProgressMpr->own_outlet_total_revenue}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'jarral_mpr'))}}</label>
                                <input type="number" name="card_sale_through_franchise_jarral_mpr" value="{{$monthlySaleProgressMpr->card_sale_through_franchise_jarral_mpr}}"  class="form-control" >
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'kti'))}}</label>
                                <input type="number" name="card_sale_through_franchise_kti" value="{{$monthlySaleProgressMpr->card_sale_through_franchise_kti}}"  class="form-control" >
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'fahad_bhr'))}}</label>
                                <input type="number" name="card_sale_through_franchise_fahad_bhr" value="{{$monthlySaleProgressMpr->card_sale_through_franchise_fahad_bhr}}"  class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'baig_krt'))}}</label>
                                <input type="number" name="card_sale_through_franchise_baig_krt" value="{{$monthlySaleProgressMpr->card_sale_through_franchise_baig_krt}}"  class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'dadyal'))}}</label>
                                <input type="number" name="card_sale_through_franchise_dadyal" value="{{$monthlySaleProgressMpr->card_sale_through_franchise_dadyal}}"  class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'franchisee_total_cards'))}}</label>
                                <input type="number" name="franchisee_total_cards" value="{{$monthlySaleProgressMpr->franchisee_total_cards}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'franchisee_total_revenue'))}}</label>   <br>
                                <br>
                                <input type="number" name="franchisee_total_revenue" value="{{$monthlySaleProgressMpr->franchisee_total_revenue}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet/_franchisee_total_cards'))}}</label>
                                <br>
                                <br>
                                <input type="number" name="own_outlet_franchisee_total_cards" value="{{$monthlySaleProgressMpr->own_outlet_franchisee_total_cards}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'own_outlet/_franchisee_total_revenue'))}}</label>
                                <input type="number" name="own_outlet_franchisee_total_revenue" value="{{$monthlySaleProgressMpr->own_outlet_franchisee_total_revenue}}" class="form-control" >
                            </div>
                        </div>



                    </div>




                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


