@extends('layouts.page')
@section('page-title', 'Court Casess')

@section('breadcrumb-item','Create Court Case')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('courtCaseAotr.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                        <select class="form-control" name="district">
                            @foreach(\App\Models\User::district() as $dist)
                            <option value="{{$dist}}">{{$dist}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_pending_no'))}}</label>
                        <input type="number" name="case_pending_no" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_pending_amount'))}}</label>
                        <input type="number"  name="case_pending_amount" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_civs_suit_filed_no'))}}</label>
                        <input type="number" name="case_civs_suit_filed_no" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_civs_suit_filed_amount'))}}</label>
                        <input type="number" name="case_civs_suit_filed_amount" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_pending_with_dues_no'))}}</label>
                        <input type="number" name="case_pending_with_dues_no" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_pending_with_dues_amount'))}}</label>
                        <input type="number" name="case_pending_with_dues_amount" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'cases_req_written_off_no'))}}</label>
                        <input type="number" name="cases_req_written_off_no" class="form-control" >
                    </div>




                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'cases_req_written_off_amount'))}}</label>
                        <input type="number" name="cases_req_written_off_amount" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_pending_no_1'))}}</label>
                        <input type="number" name="case_pending_no_1" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'case_pending_amount_1'))}}</label>
                        <input type="number" name="case_pending_amount_1" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total_no'))}}</label>
                        <input type="number" name="total_no" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label >{{strtoupper(str_replace('_',' ', 'total_amount'))}}</label>
                        <input type="number" name="total_amount" class="form-control" >
                    </div>




                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


