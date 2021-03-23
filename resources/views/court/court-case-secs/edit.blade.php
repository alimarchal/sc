@extends('layouts.page')
@section('page-title', 'Court Cases')

@section('breadcrumb-item','Create Court Case')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('courtCaseAotr.update',$courtCaseSec->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'name_of_tri'))}}</label>
                        <input type="text" name="name_of_tri" value="{{$courtCaseSec->name_of_tri}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="district">
                            @foreach(\App\Models\User::district() as $dist)
                                <option value="{{$dist}}" @if($dist == $courtCaseSec->district) selected @endif>{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'tehsil'))}}</label>
                        <input type="text"  name="tehsil" value="{{$courtCaseSec->tehsil}}"  class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'main_ecxh'))}}</label>
                        <input type="text" name="main_ecxh" value="{{$courtCaseSec->main_ecxh}}"  class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total_cases_regd_in_aor'))}}</label>
                        <input type="text" name="total_cases_regd_in_aor" value="{{$courtCaseSec->total_cases_regd_in_aor}}"  class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'outstanding_amount_against_regd_cases'))}}</label>
                        <input type="text" name="outstanding_amount_against_regd_cases" value="{{$courtCaseSec->outstanding_amount_against_regd_cases}}"  class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'amount_recovered_through_tri'))}}</label>
                        <input type="text" name="amount_recovered_through_tri" value="{{$courtCaseSec->amount_recovered_through_tri}}"  class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'cases_settled'))}}</label>
                        <input type="text" name="cases_settled" value="{{$courtCaseSec->cases_settled}}"  class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
