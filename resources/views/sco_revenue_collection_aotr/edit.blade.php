@extends('layouts.page')
@section('page-title', 'Monthly DSL Rev')

@section('breadcrumb-item','Monthly DSL Rev')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('scoRevenueCollectionAotr.update',$scoRevenueCollectionAotr->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'month_date'))}}</label>
                                <input type="date" name="month_date"  value="{{$scoRevenueCollectionAotr->month_date}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" value="{{$scoRevenueCollectionAotr->date}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'aor'))}}</label>
                            <select class="form-control" name="aor">
                                <option value="">None</option>
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($scoRevenueCollectionAotr->aor == $region_court_case) selected @endif>{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'detail'))}}</label>
                                <input type="text" name="detail" value="{{$scoRevenueCollectionAotr->detail}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'amount_trf_sco_main_acc'))}}</label>
                                <input type="number" step="any" min="0"  value="{{$scoRevenueCollectionAotr->amount_trf_sco_main_acc}}"  name="amount_trf_sco_main_acc" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'remarks'))}}</label>
                                <input type="text" name="remarks"   value="{{$scoRevenueCollectionAotr->remarks}}"  class="form-control">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>


            </div>
        </div>
    </div>
@endsection


