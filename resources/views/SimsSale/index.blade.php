@extends('layouts.page')
@section('page-title', 'Sales of Sims')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form class=" d-print-none" action="{{route('simSale.index')}}" method="get">
                <div class="row">



                    <div class="col-md-3">
                        <label >{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn_name]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                            <label >{{strtoupper(str_replace('_',' ', 'type'))}}</label>
                            <select class="form-control" name="filter[type]">
                                <option value="">None</option>
                                <option value="Franchise">Franchise</option>
                                <option value="Outlet">POS</option>
                            </select>
                    </div>



                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">

            </form>
                <button onclick="window.print()" class="btn btn-primary float-right" >Print</button>
                <br>
                <br>
            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'type'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'btn_name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'name'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 're_verified_sims'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'duplicate_sims'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'new_sims'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total'))}}</th>
                        <th class=" d-print-none">Edit</th>
                        <th class=" d-print-none">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->type}}</td>
                            <td>{{$coll->btn_name}}</td>
                            <td>{{$coll->name}}</td>
                            <td>{{$coll->re_verified_sims}}</td>
                            <td>{{$coll->duplicate_sims}}</td>
                            <td>{{$coll->new_sims}}</td>
                            <td>{{$coll->total}}</td>
                            <td class=" d-print-none"><a href="{{route('simSale.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class=" d-print-none">
                                <form action="{{route('simSale.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"   onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


