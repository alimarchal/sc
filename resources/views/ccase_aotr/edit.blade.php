@extends('layouts.page')
@section('page-title', 'SCO Revenue Collection')

@section('breadcrumb-item','SCO Revenue Collection')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">


                <form action="{{route('cCaseAotr.update',$cCaseAotr->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'year'))}}</label>
                                <input type="date" name="date" value="{{$cCaseAotr->date}}" class="form-control" >
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($cCaseAotr->aor == $region_court_case) selected @endif>{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_suited'))}}</label>
                                <input type="text"  name="case_suited"  value="{{$cCaseAotr->case_suited}}"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'settled'))}}</label>
                                <input type="text" step="any"  value="{{$cCaseAotr->settled}}"   name="settled" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal'))}}</label>
                                <input  type="number" step="any"  value="{{$cCaseAotr->bal}}"   min="0"  name="bal"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'defaulted_amount'))}}</label>
                                <input  type="number" step="any"  value="{{$cCaseAotr->defaulted_amount}}"   min="0"  name="defaulted_amount"  class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'recovered_amount'))}}</label>
                                <input  type="number" step="any"  value="{{$cCaseAotr->recovered_amount}}"   min="0"  name="recovered_amount"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'amount_balance'))}}</label>
                                <input  type="number" step="any"  value="{{$cCaseAotr->amount_balance}}"   min="0" name="amount_balance"  class="form-control">
                            </div>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>


            </div>
        </div>
    </div>
@endsection


