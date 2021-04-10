@extends('layouts.page')
@section('page-title', 'Customer')

@section('breadcrumb-item','Customer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('simSale.update',$simSale->id)}}" method="post">
                    @csrf
                    @method('put')


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                        <input type="date" name="date" value="{{$simSale->date}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'BTN Name'))}}</label>
                        <select class="form-control" name="btn_name" required>
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}" @if($btn_name == $simSale->btn_name) selected @endif>{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                        <select class="form-control" name="type" required>
                            <option value="Franchise" @if($simSale->type == 'Franchise') selected @endif >Franchise</option>
                            <option value="Outlet" @if($simSale->type == 'Outlet') selected @endif >Outlet</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'name'))}}</label>
                        <input type="number" name="name" value="{{$simSale->name}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 're_verified_sims'))}}</label>
                        <input type="number" name="re_verified_sims" value="{{$simSale->re_verified_sims}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'duplicate_sims'))}}</label>
                        <input type="number" name="duplicate_sims" value="{{$simSale->duplicate_sims}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'new_sims'))}}</label>
                        <input type="number" name="new_sims" value="{{$simSale->new_sims}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                        <input type="number" name="total" value="{{$simSale->total}}" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


