@extends('layouts.page')
@section('page-title', 'SPhone')

@section('breadcrumb-item','SPhone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">SPhone</h2>
                <br>
                <form action="{{route('sphone.update',$sphone->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$sphone->date}}" >
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($btn_name == $sphone->btn) selected @endif >{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}" @if($company_name == $sphone->company) selected @endif >{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'location'))}}</label>
                                <input type="text" name="location" value="{{$sphone->location}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'type_of_exchange'))}}</label>
                                <select class="form-control" name="type_of_exchange">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::type_of_exchange() as $type_of_exchange)
                                        <option value="{{$type_of_exchange}}"  @if($type_of_exchange == $sphone->type_of_exchange) selected @endif >{{$type_of_exchange}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'capacity'))}}</label>
                                <input type="number" name="capacity"  value="{{$sphone->capacity}}"  class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wc'))}}</label>
                                <input type="number" name="wc" value="{{$sphone->wc}}"   class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'vacant'))}}</label>
                                <input type="number" name="vacant" value="{{$sphone->vacant}}"   class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc'))}}</label>
                                <input type="number" name="pmc"  value="{{$sphone->pmc}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'restored'))}}</label>
                                <input type="number" name="restored" value="{{$sphone->restored}}"   class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                                <input type="number" name="ntc"  value="{{$sphone->ntc}}"   class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'f/pd'))}}s</label>
                                <input type="number" name="f_pds"  value="{{$sphone->f_pds}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ldc/pd'))}}s</label>
                                <input type="number" name="ldc_pds" value="{{$sphone->ldc_pds}}" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


