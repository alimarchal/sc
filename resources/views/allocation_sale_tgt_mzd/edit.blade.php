@extends('layouts.page')
@section('page-title', 'Allocation of Sale TGT - WLL / SCO CDMA')

@section('breadcrumb-item','Allocation of Sale TGT - WLL / SCO CDMA')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('allocationSaleTgt.update', $allocationSaleTgt->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$allocationSaleTgt->date}}">
                            </div>
                        </div>


                        <div class="col-4">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}" @if($company_name == $allocationSaleTgt->btn) selected @endif>{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'name'))}}</label>
                                <select class="form-control" name="name">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::location() as $location)
                                        <option value="{{$location}}"  @if($location == $allocationSaleTgt->name) selected @endif >{{$location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'will_cards_tgt'))}}</label>
                                <input type="number" step="any" min="0"  value="{{$allocationSaleTgt->will_cards_tgt}}" name="will_cards_tgt" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'will_cards_achieved'))}}</label>
                                <input type="number" step="any" min="0" value="{{$allocationSaleTgt->will_cards_achieved}}" name="will_cards_achieved" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'will_connection_tgt'))}}</label>
                                <input type="number" step="any" min="0" value="{{$allocationSaleTgt->will_connection_tgt}}" name="will_connection_tgt" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'will_connection_achieved'))}}</label>
                                <input type="number" step="any" min="0" value="{{$allocationSaleTgt->will_connection_achieved}}" name="will_connection_achieved" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
