@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('courtCaseSecs.index')}}" method="get">
                <div class="form-group">
                    <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                    <select class="form-control" name="filter[district]">
                        @foreach(\App\Models\User::district() as $dist)
                            <option value="{{$dist}}">{{$dist}}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="submit" class="btn btn-danger">
                </div>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'name_of_tri'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'district'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'tehsil'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'main_ecxh'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total_cases_regd_in_aor'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'outstanding_amount_against_regd_cases'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'amount_recovered_through_tri'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'cases_settled'))}}</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->name_of_tri}}</td>
                            <td>{{$coll->district}}</td>
                            <td>{{$coll->tehsil}}</td>
                            <td>{{$coll->main_ecxh}}</td>
                            <td>{{$coll->total_cases_regd_in_aor}}</td>
                            <td>{{$coll->outstanding_amount_against_regd_cases}}</td>
                            <td>{{$coll->amount_recovered_through_tri}}</td>
                            <td>{{$coll->cases_settled}}</td>
                            <td><a href="{{route('courtCaseSecs.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td>
                                <form action="{{route('courtCaseSecs.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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


