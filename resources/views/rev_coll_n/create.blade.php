@extends('layouts.page')
@section('page-title', 'Rev Collection')

@section('breadcrumb-item','Rev Collection')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Rev Collection</h2>
                <br>
                <form action="{{route('revCollN.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                    <option value="{{$company_name_without_code}}">{{$company_name_without_code}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'type_of_card'))}}</label>
                                <select class="form-control" name="type_of_card">
                                    @foreach(\App\Models\User::cards() as $dist)
                                        <option value="{{$dist}}">{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'Value of card'))}}</label>
                                <select class="form-control" name="value_of_card">
                                    <optgroup label="SCOM">
                                        <option value="Rs. 1000">Rs. 1000</option>
                                        <option value="549 Super">549 Super</option>
                                        <option value="500 Super">500 Super</option>
                                        <option value="Rs. 500">Rs. 500</option>
                                        <option value="Rs. 349 Super">Rs. 349 Super</option>
                                        <option value="Rs. 300">Rs. 300</option>
                                        <option value="Rs. 200">Rs. 200</option>
                                        <option value="Rs. 100">Rs. 100</option>
                                        <option value="Rs. 50">Rs. 50</option>
                                        <option value="S Load">S Load</option>
                                        <option value="New SIM">New SIM</option>
                                        <option value="Blank Sim">Blank Sim</option>
                                        <option value="Postpaid SIM">Postpaid SIM</option>
                                    </optgroup>

                                    <optgroup label="CDMA">
                                        <option value="Rs. 100">Rs. 100</option>
                                        <option value="Rs. 100 Internet">Rs. 100 Internet</option>
                                        <option value="249 Units">249 Units</option>
                                    </optgroup>

                                    <optgroup label="PPCCs">
                                        <option value="Rs. 50">Rs. 50</option>
                                        <option value="Rs. 300">Rs. 300</option>
                                        <option value="Rs. 500">Rs. 500</option>
                                        <option value="Rs. 100">Rs. 100</option>
                                    </optgroup>

                                    <optgroup label="DSL Cards">
                                        <option value="Rs. 100">Rs. 100</option>
                                        <option value="Rs. 500">Rs. 500</option>
                                        <option value="Rs. 1000">Rs. 1000</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'card_sold_unit_outlets'))}}</label>
                                <input type="number" step="any" min="0" name="card_sold_unit_outlets" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'card_sold_franchisee'))}}</label>
                                <input type="number" step="any" min="0" name="card_sold_franchisee" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'card_sold_total'))}}</label>
                                <input type="number" step="any" min="0" name="card_sold_total" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'rebate_percentage'))}}</label>
                                <input type="number" step="any" min="0" name="rebate_percentage" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'rebate_amount_in_rs'))}}</label>
                                <input type="number" step="any" min="0" name="rebate_amount_in_rs" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'adv_tax_percentage'))}}</label>
                                <input type="number" step="any" min="0" name="adv_tax_percentage" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'adv_tax_amount_in_rs'))}}</label>
                                <input type="number" step="any" min="0" name="adv_tax_amount_in_rs" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal_amount_rs_unit_outlets'))}}</label>
                                <input type="number" step="any" min="0" name="bal_amount_rs_unit_outlets" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal_amount_franchisee'))}}</label>
                                <input type="number" step="any" min="0" name="bal_amount_franchisee" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal_amount_total'))}}</label>
                                <input type="number" step="any" min="0" name="bal_amount_total" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


