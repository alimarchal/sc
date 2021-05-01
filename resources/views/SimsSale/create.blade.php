@extends('layouts.page')
@section('page-title', 'Customer')

@section('breadcrumb-item','Customer')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('simSale.store')}}" method="post">
                    @csrf



                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'date'))}}</label>
                        <input type="date" name="date" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="btn_name" required>
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                        <select class="form-control" name="type" required>
                                <option value="Franchise">Franchise</option>
                                <option value="Outlet">POS</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'name'))}}</label>
                        <input type="text" name="name" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 're_verified_sims'))}}</label>
                        <input type="number" name="re_verified_sims" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'duplicate_sims'))}}</label>
                        <input type="number" name="duplicate_sims" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'new_sims'))}}</label>
                        <input type="number" name="new_sims" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total'))}}</label>
                        <input type="number" name="total" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


