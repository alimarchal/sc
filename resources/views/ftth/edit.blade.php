@extends('layouts.page')
@section('page-title', 'FTTH')

@section('breadcrumb-item','FTTH')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">FTTH</h2>
                <br>
                <form action="{{route('ftth.update',$ftth->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control" value="{{$ftth->date}}" >
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'btn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($btn_name == $ftth->btn) selected @endif >{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}" @if($company_name == $ftth->company) selected @endif >{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'TOTAL ACCTS'))}}</label>
                                <input type="number" name="total_accts" value="{{$ftth->total_accts}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'new_accs'))}}</label>
                                <input type="number" name="new_accs"  value="{{$ftth->new_accs}}"  class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc'))}}</label>
                                <input type="number" name="pmc" value="{{$ftth->pmc}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'restored_after_pmc'))}}</label>
                                <input type="number" name="restored_after_pmc" value="{{$ftth->restored_after_pmc}}" class="form-control">
                            </div>
                        </div>




                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


