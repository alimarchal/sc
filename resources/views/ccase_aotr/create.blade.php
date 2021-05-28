@extends('layouts.page')
@section('page-title', 'Court Cases')

@section('breadcrumb-item','Court Cases')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Court Cases</h2>
                <br>
                <form action="{{route('cCaseAotr.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'year'))}}</label>
                                <input type="text" name="years" class="form-control" >
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" >{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'case_suited'))}}</label>
                                <input type="text"  name="case_suited" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'settled'))}}</label>
                                <input type="text" step="any"  name="settled" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'bal'))}}</label>
                                <input  type="number" step="any"  min="0"  name="bal"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'defaulted_amount'))}}</label>
                                <input  type="number" step="any"  min="0"  name="defaulted_amount"  class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'recovered_amount'))}}</label>
                                <input  type="number" step="any"  min="0"  name="recovered_amount"  class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'amount_balance'))}}</label>
                                <input  type="number" step="any"  min="0" name="amount_balance"  class="form-control">
                            </div>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


