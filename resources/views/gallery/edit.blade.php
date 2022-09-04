@extends('layouts.page')
@section('page-title', 'Event Edit')
@section('breadcrumb-item','Edit')




@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Create Event</h2>
                <br>
                <form action="{{route('gallery.update', $gallery->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" value="{{$gallery->date}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                            <select class="form-control" name="region">
                                <option value="">None</option>
                                <option value="Sector HQ" @if($gallery->region == "Sector HQ") selected @endif >Sector HQ AJK</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($gallery->region == $btn_name) selected @endif>{{$btn_name}}</option>
                                @endforeach
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}" @if($gallery->region == $region_court_case) selected @endif>{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title"  value="{{$gallery->title}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description">{{$gallery->description}}</textarea>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>Images File</label>
                                <input class="form-control form-control-lg" name="attachments_1[]" type="file" multiple>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


