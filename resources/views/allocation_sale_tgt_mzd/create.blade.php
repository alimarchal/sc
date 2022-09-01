@extends('layouts.page')
@section('page-title', 'Allocation of Sale TGT - WLL / SCO CDMA')

@section('breadcrumb-item','Allocation of Sale TGT - WLL / SCO CDMA')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Allocation of Sale TGT - WLL / SCO CDMA</h2>
                <br>
                <form action="{{route('allocationSaleTgt.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
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


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'name'))}}</label>
                                <select class="form-control" name="name">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::location() as $location)
                                        <option value="{{$location}}">{{$location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wll_cards_tgt'))}}</label>
                                <input type="number" step="any" min="0" name="will_cards_tgt" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wll_cards_achieved'))}}</label>
                                <input type="number" step="any" min="0" name="will_cards_achieved" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wll_connection_tgt'))}}</label>
                                <input type="number" step="any" min="0" name="will_connection_tgt" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wll_connection_achieved'))}}</label>
                                <input type="number" step="any" min="0" name="will_connection_achieved" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


