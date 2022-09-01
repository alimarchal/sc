@extends('layouts.page')
@section('page-title', 'Event Crete')
@section('breadcrumb-item','Create')




@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Create Event</h2>
                <br>
                <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'bn'))}}</label>
                                <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                                <select class="form-control" name="company">
                                    <option value="">None</option>
                                    @foreach(\App\Models\User::company_name() as $company_name)
                                        <option value="{{$company_name}}" >{{$company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>Images File</label>
                                <input class="form-control form-control-lg" name="attachments_1[]" type="file" multiple>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection


