@extends('layouts.page')
@section('page-title', 'Rev Report')

@section('breadcrumb-item','Rev Report')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('revCollN.update',$revCollN->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$revCollN->date}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name_without_code() as $company_name_without_code)
                                    <option value="{{$company_name_without_code}}" @if($company_name_without_code == $revCollN->aor) selected @endif>{{$company_name_without_code}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'type_of_card'))}}</label>
                                <select class="form-control" name="type_of_card">
                                    @foreach(\App\Models\User::cards() as $dist)
                                        <option value="{{$dist}}" @if($dist == $revCollN->type_of_card) selected @endif >{{$dist}}</option>
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
                                <input type="number" step="any" min="0" name="card_sold_unit_outlets" class="form-control"  value="{{$revCollN->card_sold_unit_outlets}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'card_sold_franchisee'))}}</label>
                                <input type="number" step="any" min="0" name="card_sold_franchisee" class="form-control"  value="{{$revCollN->card_sold_franchisee}}">
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'card_sold_total'))}}</label>
                                <input type="number" step="any" min="0" name="card_sold_total" class="form-control"  value="{{$revCollN->card_sold_total}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'rebate_percentage'))}}</label>
                                <input type="number" step="any" min="0" name="rebate_percentage" class="form-control"  value="{{$revCollN->rebate_percentage}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'rebate_amount_in_rs'))}}</label>
                                <input type="number" step="any" min="0" name="rebate_amount_in_rs" class="form-control"  value="{{$revCollN->rebate_amount_in_rs}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'adv_tax_percentage'))}}</label>
                                <input type="number" step="any" min="0" name="adv_tax_percentage" class="form-control"  value="{{$revCollN->adv_tax_percentage}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'adv_tax_amount_in_rs'))}}</label>
                                <input type="number" step="any" min="0" name="adv_tax_amount_in_rs" class="form-control"  value="{{$revCollN->adv_tax_amount_in_rs}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal_amount_rs_unit_outlets'))}}</label>
                                <input type="number" step="any" min="0" name="bal_amount_rs_unit_outlets" class="form-control"  value="{{$revCollN->bal_amount_rs_unit_outlets}}">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal_amount_franchisee'))}}</label>
                                <input type="number" step="any" min="0" name="bal_amount_franchisee" class="form-control"  value="{{$revCollN->bal_amount_franchisee}}">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal_amount_total'))}}</label>
                                <input type="number" step="any" min="0" name="bal_amount_total" class="form-control"  value="{{$revCollN->bal_amount_total}}">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


