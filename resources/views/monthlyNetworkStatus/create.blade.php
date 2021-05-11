@extends('layouts.page')
@section('page-title', 'Monthly Network Status Report')

@section('breadcrumb-item','Monthly Network Status Report')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">SPhone</h2>
                <br>
                <form action="{{route('monthly-network-status.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'bn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}">{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <h2 class="text-center">S-Phone</h2>
                    <hr>
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_exc'))}}</label>
                                <input type="number" name="sphone_total_exc" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wc'))}}</label>
                                <input type="number" name="sphone_wc" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc'))}}</label>
                                <input type="number" name="sphone_pmc" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                                <input type="number" name="sphone_ntc" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'fds'))}}</label>
                                <input type="number" name="sphone_fds" class="form-control">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h2 class="text-center">GSM</h2>
                    <hr>
                    <div class="row">
                        <div class="col-1">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_bts'))}}</label>
                                <input type="number" name="gsm_total_bts" class="form-control">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sys_cap'))}}</label>
                                <input type="number" name="gsm_sys_cap" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sim_sold_till_date'))}}</label>
                                <input type="number" name="gsm_sim_sold_till_date" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_subscriber'))}}</label>
                                <input type="number" name="gsm_total_subscriber" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'active_subscriber'))}}</label>
                                <input type="number" name="gsm_active_subscriber" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'average_vlr_subs'))}}</label>
                                <input type="number" name="gsm_average_vlr_subs" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sim_sold_during_month'))}}</label>
                                <input type="number" name="gsm_sim_sold_during_month" class="form-control">
                            </div>
                        </div>

                    </div>

                    <hr>


                    <h2 class="text-center">DSL</h2>
                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_dsl_sites'))}}</label>
                                <input type="number" name="dsl_total_dsl_sites" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cap'))}}</label>
                                <input type="number" name="dsl_cap" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'active_subs'))}}</label>
                                <input type="number" name="dsl_active_subscriber" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dsl_provided_during_the_month'))}}</label>
                                <input type="number" name="dsl_provided_during_the_month" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <h2 class="text-center">DXX</h2>
                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_dss_sites'))}}</label>
                                <input type="number" name="dxx_total_dss_sites" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cap'))}}</label>
                                <input type="number" name="dxx_cap" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'active_subs'))}}</label>
                                <input type="number" name="dxx_active_subs" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_provided_during_the_month'))}}</label>
                                <input type="number" name="dxx_provided_during_the_month" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


