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
                        <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                        <select class="form-control" name="type" required>
                                <option value="Franchise">Franchise</option>
                                <option value="Outlet">Outlet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'btn_name'))}}</label>
                        <input type="number" name="btn_name" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'name'))}}</label>
                        <input type="number" name="name" class="form-control" >
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


