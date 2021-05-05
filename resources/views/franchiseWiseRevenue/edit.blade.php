@extends('layouts.page')
@section('page-title', 'Franchise Wise Target')

@section('breadcrumb-item','Franchise Wise Target')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('franchiseWiseRevenue.update',$franchiseWiseRevenue->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                                <input type="date" name="date" value="{{$franchiseWiseRevenue->date}}" class="form-control" >
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                                <select class="form-control" name="btn_name">
                                    @foreach(\App\Models\User::btn_name() as $btn_name)
                                        <option value="{{$btn_name}}" @if($btn_name == $franchiseWiseRevenue->btn_name) selected @endif>{{$btn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'revenue_target'))}}</label>
                                <select class="form-control" name="card_type">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::card_type() as $card_type)
                                        <option value="{{$card_type}}" @if($card_type == $franchiseWiseRevenue->card_type) selected @endif>{{$card_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'name_of_franchise'))}}</label>
                                <input type="text" name="name_of_franchise" value="{{$franchiseWiseRevenue->name_of_franchise}}"  class="form-control" >
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                                <input type="text" name="aor_district" value="{{$franchiseWiseRevenue->aor_district}}"  class="form-control" >
{{--                                <select class="form-control" name="aor_district">--}}
{{--                                    @foreach(\App\Models\User::district() as $dist)--}}
{{--                                        <option value="{{$dist}}" @if($franchiseWiseRevenue->aor_district == $dist) selected @endif>{{$dist}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'asg'))}}</label>
                                <input type="text" name="asg" value="{{$franchiseWiseRevenue->asg}}"  class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'ach'))}}</label>
                                <input type="text" name="ach" value="{{$franchiseWiseRevenue->ach}}"  class="form-control" >
                            </div>
                        </div>




                    </div>


                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


